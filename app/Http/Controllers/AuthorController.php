<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
       
            $article = Author::create($request->all());

            return response()->json($article, 201);
        
    }
}
