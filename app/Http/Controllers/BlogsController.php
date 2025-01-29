<?php

namespace App\Http\Controllers;

use App\Models\Dropdown\Dropdown;
use App\Models\News\News;
use App\Models\User;
use App\Settings\Site;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = News::active()
            ->when(request('author'), function ($query, $author){
                $admin = User::where('name', $author)->first();
                if ($admin)
                    return $query->where('user_id', $admin->id);
                return $query;
            })
            ->when(request('category'), function ($query, $category){
                $category = Dropdown::whereCategory(Dropdown::BLOG_CATEGORY)
                    ->whereTranslationLike('title', '%'. $category .'%')
                    ->first();
                if ($category)
                    return $query->where('dropdown_id', $category->id);
                return $query;
            })
            ->when(request('date'), function ($query, $date){
                return $query->whereDate('published_at', '>=', $date);
            })->get();
        return $this->view('News.index', compact('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, News $blog)
    {
        $next_post = News::active()->where('id', '>', $blog->id)->first();
        $prev_post = News::active()->where('id', '<', $blog->id)->first();

        return $this->view('News.show', compact('blog', 'next_post', 'prev_post'));
    }
}
