<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;

class ArticleController extends Controller
{
    //get all articles
   public function index()
    {
        return Article::all();
    }

    //get one article
    public function show(Article $article)
    {
        return $article;
    }

    //create new article
    public function store(Request $request)
    {
        //check whether author id is exist
        if(Author::where('id', '=', $request->author_id)->exists()){
            $article = Article::create($request->all());

            return response()->json($article, 201);
        }else{
            return response()->json([
            'error' => 'Not exists this user id'
        ], 404);
        }

        
    }

    //update article
    public function update(Request $request, Article $article)
    {

        $article->update($request->all());

        return response()->json($article, 200);
    }

    //delete article
    public function delete(Article $article)
    {
        $article->delete();

        return response()->json([
            'status' => 'successfully deleted'
        ], 204);
    }
}
