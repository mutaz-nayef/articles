<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
        // Render a list of resource
    {
        if (request('tag')) {
            $articles = \App\Models\Tag::where('name', request('tag'))->firstOrFail()->articles;

        } else {

            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        // Show a single resource
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        // Show a view to create a new resource

        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        // hard coded when we store the article with userid..
        $this->validateArticle(); // فصلناها لانه التاج مش عمود في الجدول الارتيكل بسبب الفاليديشن
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;// auth->id()
//        auth()->user()->articles()->create($article);
        $article->save();
        if (request()->has('tags')) {

            $article->tags()->attach(request('tags')); // attach work to associate the article with tags
        }
//        $article->tags()->attach([1,2]);
        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        // Show a view to edit an existing resource
//        return view('articles.edit',['article'=>$article]);
        /* or */
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        // Persist the edited resource
//        return redirect(route('articles.show',$article));
        return redirect($article->path());
    }

    public function destroy()
    {
        // Delete the new resource
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required', // ['required,min:3,max:255']
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
