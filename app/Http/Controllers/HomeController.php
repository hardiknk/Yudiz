<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // dd($social_media_link);
        $latest_news_data = News::orderBy('created_at', 'DESC')
            ->limit(10)->get();
        // dd($latest_news);
        $first_category_data = Category::where('is_home_cat', '=', 'y')->with('news')->first();
        // dd($first_category_data->news[0]->banner_img);
        $last_category_data = Category::where('is_home_cat', '=', 'y')->with('news')->first();
        $all_category_news = Category::where('is_home_cat', '=', 'y')->whereNotIn('id', [$first_category_data->id, $last_category_data->id])->get();
        // dd($all_category_news);
        return view('front.index', ['latest_news_data' => $latest_news_data, 'first_category_data' => $first_category_data, 'last_category_data' => $last_category_data, 'all_category_news' => $all_category_news]);
    }
}
