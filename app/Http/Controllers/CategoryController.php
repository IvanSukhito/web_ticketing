<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function store(Request $request, Category $categories)
    {
        if ($request->hasFile('files')) {
            $photos = [];
            foreach ($request->file('files') as $file) {
                $photos[] = $file->store('acaras', 'public');
            }
            $request->merge([
                'photos' => $photos
            ]);
        }
        Category::create($request->except('files'));

        return redirect()->route('kategori.index', $categories->id)->with('success', 'Kategori Berhasil Di tambahkan');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
