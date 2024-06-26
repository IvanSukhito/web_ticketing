<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Acara;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\userNotification;

class VendorController extends Controller
{
    public function index()
    {
        $acaras = Acara::paginate(30);
        return view('vendor.acara.index', [
            'acaras' => $acaras
        ]);
    }

    public function create()
    {
        $categories = Category::all() ?? null;

        //dd($categories);
        $acaras = Acara::all();

        return view('vendor.acara.create', [
            'acaras' => $acaras,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());

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



        $acara = Acara::create($request->except('files'));
        // $users = User::all();
        // Notification::send($users, new userNotification($acara));

        //return to index
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $categories = Category::all();
        $acaras = Acara::all();
        return view('vendor.acara.edit', [
            'acara' => $acara,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

            // Sesuaikan aturan validasi sesuai kebutuhan Anda
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


        //update Acara
        Acara::find($id)->update($request->except('files'));
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di Edit');
    }
    public function destroy(Acara $acara)
    {
        $acara->delete();
        // dd($acara);
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
