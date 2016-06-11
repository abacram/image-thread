<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post as Post;
use App\Tracker as Tracker;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'loaded' => 'Loading finished!',
        ]);

        //Track a view by each IP
        Tracker::hit();

        return view('frontend.index', [
            'posts' => Post::orderBy('created_at', 'desc')->get(),
            'nPosts' => Post::all()->count(),
            'nViews' => Tracker::all()->count(),
        ]);
    }
}
