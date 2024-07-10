<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Category;
use App\Models\Banner;
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
        $categories = Category::all();
        $banner = Banner::get();
        //dd($banner);
        // $categories = Category::all();
        return view('frontend.index', [
            'acaras' => $acaras,
            'categories' => $categories,
            'banner' => $banner
        ]);
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

        return $acaras->paginate(6);
    }
    private function fetchCategories()
    {
        $categories = Category::sortByMostEvents();
        if (!request()->query('all_categories')) {
            $categories->limit(4);
        }
        return $categories->get();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $acaras = Acara::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('frontend.search', [
            'acaras' => $acaras,
            'keyowrd' => $keyword,
        ]);
    }
    public function category(Category $category)
    {
        $acaras = Acara::where('category_id', $category->id)->with('category')->get();
      
        return view('frontend.category', [
            'category' => $category,
            'acaras' => $acaras,

        ]);
    }
}
