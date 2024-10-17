<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Acara;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\userNotification;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {

        // $acaras = Acara::paginate(30);
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $acaras = $user->acara()->paginate(30); // Mengambil acara yang dibuat oleh user/vendor  tersebut
        return view('vendor-client.acara.index', [
            'acaras' => $acaras
        ]);
    }

    public function create()
    {

        $categories = Category::all() ?? null;

        //dd($categories);
        $acaras = Acara::all();

        return view('vendor-client.acara.create', [
            'acaras' => $acaras,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'files' => 'required',
            'description' => 'required',
            'name' => 'required',
            'namaPelaksana' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'category_id' => 'required',
            'image_content' => 'required',
        ]);
        $slug = $request->slug ?? Str::slug($request->name);

        $request->merge([
            'slug' => Str::slug($request->name),

        ]);


        if ($request->hasFile('files')) {
            $photos = [];
            foreach ($request->file('files') as $file) {
                $photos[] = $file->store('acaras', 'public');
            }

            $request->merge([
                'photos' => $photos
            ]);
        }

        if ($request->hasFile('image_content')) {
            $imgPath = str_replace('/', '\\', $request->file('image_content')->store('acaras/image_content', 'public'));
            $imgPath = preg_replace('/\\\\+/', '\\', $imgPath); // Hapus backslash ganda
        }
        $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photos' => $request->photos,
            'slug' => $request->slug,
            'image_content' => $imgPath,
            'namaPelaksana' => $request->namaPelaksana,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'category_id' => $request->category_id
        ];

        $acara = Acara::create($saveData);
        $user = Auth::user();
        $user->acara()->attach($acara->id);

        //return to index
        return redirect()->route('vendor.acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $categories = Category::all();
        $acaras = Acara::all();
        return view('vendor-client.acara.edit', [
            'acara' => $acara,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Acara $acara)
    {
        //dd($acara);
        if (!Auth::user()->acara->contains($acara->id)) {
            return redirect()->route('vendor-client.acara.index')->with('error', 'Anda tidak memiliki izin untuk mengedit acara ini.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'files' => '',
            'image_content' => '',
            'namaPelaksana' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'latitude' => '',
            'longitude' => '',
            'waktu' => 'required|date',
            'category_id' => 'required|integer',
            // 'files.*' => 'image|mimes:png,jpg,jpeg|max:2048' // Validasi untuk file gambar
        ]);
        $slug = $request->slug ?? Str::slug($request->name);

        $request->merge([
            'slug' => Str::slug($request->name),

        ]);

        $dataAcara = Acara::findOrFail($acara->id);

        if ($request->hasFile('files')) {
            $getNewPhoto = [];
            foreach ($request->file('files') as $photo) {
                $getNewPhoto[] = str_replace('/', '\\', $photo->store('acaras', 'public'));
            }
            $photos = $getNewPhoto;
        } else {
            $photos = $dataAcara->photos ?? []; 
        }
        
        //dd($request->file('image_content'));
        //image content
        if ($request->hasFile('image_content')) {
            //dd($request->hasFile('image_content'));
            $imgPath = str_replace('/', '\\', $request->file('image_content')->store('acaras/image_content', 'public'));
            $imgPath = preg_replace('/\\\\+/', '\\', $imgPath); // Hapus backslash ganda

            $imageContent = $imgPath;
        } 
         else{
            $imageContent = $dataAcara->image_content;
         }
        //dd($validated['files']);   
        
        $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photos' => $photos,
            'slug' => $request->slug,
            'image_content' => $imageContent,
            'namaPelaksana' => $request->namaPelaksana,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'category_id' => $request->category_id
        ];
        
        //dd($saveData);
  

        // update Acara
        $acara->update($saveData);
        return redirect()->route('vendor.acara.index')->with('success', 'Acara berhasil di update ');
    }
    public function destroy(Acara $acara)
    {
        if (!Auth::user()->acara->contains($acara->id)) {
            return redirect()->route('vendor-client.acara.index')->with('error', 'Anda tidak memiliki izin untuk menghapus acara ini.');
        }

        $acara->delete();
        // dd($acara);
        return redirect()->route('vendor-client.acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
