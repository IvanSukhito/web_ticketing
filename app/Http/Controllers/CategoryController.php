<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.Kategori.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $categories)
    {
        return view('admin.Kategori.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:png,jpg,svg',
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $newCategory = Category::create($validated);

            DB::commit();
            return redirect()->route('kategori.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
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
    public function edit($category)
    {
        
         $category = Category::findOrFail($category);
         return view('admin.kategori.edit', [
             'category' => $category,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'image|mimes:png,jpg,svg',
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('category_icons', 'public');
                //dd($iconPath);
                $validated['icon'] = $iconPath;
             
            }
            $updateCategory = Category::where('id', $category)->first();
            
            //dd(isset($validated['icon']));
            //dd(isset($updateCategory['icon']));
            //cek kalo ada kategori lama dan icon yang diganti maka apus icon lama
            if(isset($updateCategory['icon']) == isset($validated['icon'])){
                //Storage::delete($updateCategory['icon']);
                $file_path = file_exists(storage_path('app/public/'.$updateCategory['icon']));
                //cek ada filenya ga
                
                    if($file_path) {
                        //kalo ada hapus icon lama dilocal storage, replace yang baru
                     unlink(storage_path('app/public/' .$updateCategory['icon']));
                    }
            }
            $updateCategory->update($validated);

            DB::commit();
            return redirect()->route('admin.kategori.index');
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
    public function destroy($id)
    {
        // Menghapus kategori
        $category = Category::find($id);
        $category->delete();



        // Redirect ke index kategori dengan pesan sukses
        // dd($category);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
