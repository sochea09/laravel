<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Request;

class ArticlesController extends Controller {

//    public function __construct(){
//        // need login before do all action
//        //$this->middleware('auth');
//        //auth on create action
//        //$this->middleware('auth', ['only'   => 'create']);
//        // Except on indext action
//        $this->middleware('auth', ['except' => 'index']);
//    }

	public function index(){

        //return \Auth::user();
        //return \Auth::user()->name;

		//$articles = Article::all();
        //$articles = Article::order_by('published_at' , 'desc')->get();
        //$articles = Article::latest('published_at')->get();
        //$articles = Article::latest('published_at')->where('published_at','<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}

	public function show(Article $article){

		//$article = Article::find($id);
		//show null when record not found
		//dd($article);
		// if(is_null($article)){
		// 	abort(404);
		// }
		//$article = Article::findOrFail($id); //not need when use route model binding

        //dd($article->created_at);
        //dd($article->created_at->year);
        //dd($article->created_at->month);
        //dd($article->created_at->day);
        //dd($article->created_at->addDays(6));
        //dd($article->created_at->addDays(6)->format('Y-m'));
        //dd($article->created_at->addDays(6)->diffForHumans());

        //dd($article->published_at);

		return view('articles.show', compact('article'));

		//link to load show method
		//<a href="/articles/{{$article->id}}"> {{ $article->title }}</a>
		//<a href="{{ action('ArticlesController@show', [$article->id]) }}"> {{ $article->title }}</a>
		//<a href="{{ url('/articles', $article->id) }}"> {{ $article->title }}</a>
		//{{ route(route_path)}}
	}

    public function create(){

// can create when user login
//        if(Auth::guest()){
//            return redirect('articles');
//        }

        return view('articles.create');
    }

    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request){

        //$input = Request::get('body');
        //$input = Request::all();
        //$input['published_at'] = Carbon::now();

        //Article::create($input);

        //Article::create($request::all());

        //Article::create($request->all());

        //<!-- temporary -->
       //{!! Form::hidden('user_id', 1) !!}

        //$article = new Article($request->all());

        //Auth::user()->articles()->save($article);

        //after apply flash message
        Auth::user()->articles()->create($request->all());

        //\Session::flash('flash_message', 'Your article has been created!');
        //or
        //session()->flash('flash_message', 'Your article has been created!');
        //session()->flash('flash_message_important', true);

        //return redirect('articles');

//        //short form
//        return redirect('articles')->with([
//            'flash_message' => 'Your article has been created',
//            'flash_message_important'   => true
//        ]);

        //Other way
        flash('Your article has been created')->important();

        return redirect('articles');


    }

    public function edit(Article $article){

        //$article = Article::findOrFail($id); //not use after bind
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request){

        //$article = Article::findOrFail($id); //note use after bind

        $article->update($request->all());

        return redirect('articles');
    }

}
