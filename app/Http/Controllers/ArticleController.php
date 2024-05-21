<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list()
    {        
        $articles = Article::all();      
        return view('crud.list', ['articles' => $articles]);
    } 
    public function add()
    {       
            
        return view('crud.addform');
    }
    public function delete($id)
    {
        // dd($id); die;
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.list')->with('success', 'Article deleted successfully.');
    }

    public function insertData(Request $request)
    {
        // dd($request); die;
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new article instance and fill it with the validated data
        $article = new Article($validatedData);

        // Save the article to the database
        $article->save();

        // Redirect back to the articles list with a success message
        return redirect()->route('articles.list')->with('success', 'Article created successfully.');
    }
}


