<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banner = Banner::paginate(10);
        return view('admin.Banner.index', [
            'getBanner' => $banner ?? ''
        ]);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            return view('admin.Banner.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            'img' =>'required|image|mimes:png,jpg,svg',
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('img')) {
                $iconPath = $request->file('img')->store('banner', 'public');
                $validated['img'] = $iconPath;
            }

            $newCategory = Banner::create($validated);

            DB::commit();
            return redirect()->route('admin.banners.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banner = Banner::findOrFail($id);
        return view('admin.Banner.edit', [
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'image|mimes:png,jpg,svg',
            'status' => 'required'
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('img')) {
                $iconPath = $request->file('img')->store('banner', 'public');
                //dd($iconPath);
                $validated['img'] = $iconPath;
            }
            $updateBanner = Banner::where('id', $id)->first();   
            //dd(isset($validated['img']));      
            //cek kalo ada kategori lama dan icon yang diganti maka apus icon lama
            if (isset($updateBanner['img']) == isset($validated['img'])) {
                //Storage::delete($updateBanner['icon']);
                $file_path = file_exists(storage_path('app/public/' . $updateBanner['img']));
                //cek ada filenya ga
                //dd($file_path);
                if ($file_path) {
                    //kalo ada hapus icon lama dilocal storage, replace yang baru
                    unlink(storage_path('app/public/' . $updateBanner['img']));
                }
            }
            $updateBanner->update($validated);

            DB::commit();
            return redirect()->route('admin.banners.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $getBanner = Banner::find($id);
        $getBanner->delete();



        // Redirect ke index kategori dengan pesan sukses
        // dd($banner);
        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil dihapus.');
    }
    public function updatePriority(string $id){
        
       
        // dd($id);
        $getBanner = Banner::where('id',$id)->first();
        if($getBanner->prioritas == 0){
           
            //select prioritas lama yg 1 jadi ke 0
            $getBannerOld = Banner::where('prioritas', 1)->first();
            if(isset($getBannerOld)){
                $getBannerOld->update([
                    'prioritas' => 0 
                 ]);
            }
             //update prioritas baru
            $getBanner->update(['prioritas' => 1]);
            //return view
            return redirect()->route('admin.banners.index')->with('success', 'Prioritas berhasil diubah.');
        }else{
            //prioritas tidak berubah
            return redirect()->route('admin.banners.index');
        }
        dd($getBanner);
    }
}
