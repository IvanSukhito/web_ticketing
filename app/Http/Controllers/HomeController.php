<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $acaras = $this->fetchAcaras();
        // $categories = Category::all();
        return view('frontend.index', compact('acaras'));
    }
    public function fetchAcaras()
    {
        $category = request()->query('category');
        $acaras = Acara::upcoming();
        if (!request()->query('all_events')) {
            $acaras->limit(6);
        }
        if ($category) {
            $acaras->withCategory($category);
        }

        return $acaras->get();
    }
    private function fetchCategories()
    {
        $categories = Category::sortByMostEvents();
        if (!request()->query('all_categories')) {
            $categories->limit(4);
        }
        return $categories->get();
    }
}