<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // if(Auth::check()){
            // $articles = Article::all();
            // $articles = Article::orderBy('title')->paginate(20);
            $articles = Article::orderBy('created_at')->with('articleHasUser.userHasEtudiant')->paginate(10);
            
            // return($articles);
            return view('article.index', compact('articles'));
        // }
        // return redirect(route('login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        // return view('article.create', compact('articles'));

        $users = User::all();
        return view('article.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'art_body' => 'required|string',
        ]);

        $newArticle = Article::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'art_body' => $request->art_body,       
        ]);

        //return $newArticle;
        // return redirect(route('article.show', $newArticle->id))->withSuccess(trans('lang.text_success_article'));
        return redirect(route('article.show', $newArticle->id));



        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) {
        
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article) {
        
        // Verifier que l'etudiant signed in est le meme qui veut editer son article
        if (auth()->check() && auth()->user()->id === $article->user_id) {
  
            return view('article.edit', compact('article'));
       
        } else {
            return redirect('dashboard')->with('error', 'Unauthorized access.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article) {
        
        $article->update([
            'title' => $request->title,
            'art_body' => $request->art_body,
        ]);

        return redirect(route('article.show', $article->id))->withSuccess('Article mis a jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article) {
        
        $article->delete();

        return redirect(route('article.index'))->withSuccess('Article effacé!');
    }

    public function pagination() {
        // $articles = Article::all();
         $articles = Article::select()->paginate(5);
 
         return view('article.pagination', compact('articles'));
    }


    public function query(){
        //select * from articles;
        //$article = Article::all();

        //$article = Article::Select('title', 'art_body')->get();
        
         //select * from articles orderby id desc limit 1;
        //$article = Article::Select()->orderby('id', 'desc')->first();

        //$article = Article::where('id', 1)->get();

        //select * from table where id = ?; // fetch
       // $article = Article::find(1);

        //select title, art_body from articles where title like 'a%'orderby title;
       //$article = Article::select('title', 'art_body')->where('title','like', 'Article%')->orderby('title')->get();

       //AND - SELECT * FROM TABLE WHERE user_id = 1 AND title like  '%te%';
        //$article = Article::select()->where('user_id',1)->where('title', 'like', '%te%')->get();

        //OR
        //$article = Article::select()->where('user_id',1)->orWhere('id', 4)->get();

        //INNER
        //Select * from articles INNER JOIN users on  user_id = users.id;
        $article = Article::select()
                        ->join('users', 'user_id','=','users.id')
                        ->get();

        //OUTER
        //Select * from articles RIGHT OUTER JOIN users on  user_id = users.id;
        $article = Article::select()
                        ->rightJoin('users', 'user_id','=','users.id')
                        ->get();
        

        //$article = Article::select('title', 'art_body')->where('title', 'Article')->orderby('title')->count();
        
        // $article = Article::max('id');

        //Raw Query
        // SELECT count(*) as articles, user_id
        // FROM maisonneuve.articles
        // group by user_id;

        // $article = Article::select(DB::raw('count(*) as articles, user_id'))
        //     ->groupBy('user_id')
        //     ->get();

        $article = Article::find(1);

        return $article->articleHasUser->name;

    }

    public function showPdf(Article $article)
    {

        $pdf = PDF::loadView('article.show-pdf', ['article' => $article]);
        return $pdf->download('article_'.$article->id.'.pdf');
        //return $pdf->stream('article.pdf');
    }
}