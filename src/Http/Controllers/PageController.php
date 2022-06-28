<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    /**
     * The purpose here is to get the page if it exists and returns datas
     * to the view.
     * 
     * The final structure of the page is determined by the content part.
     *
     * @param string $slug, if no slug load home page
     * @return void
     */
    public function index(string $slug = 'home')
    {

        $page = Page::where('slug', $slug)->first();

        return view('typhoon::' . config('typhoon.template') . '.page.index', compact('page'));
    }

}
