<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bidding;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\User;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::where("status", "active")->get();
        return view("auctionsoverview")->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createauction");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required',
            'style'     => 'required' ,
            'year'       => 'required',
            'description'=> 'required',
            'width' => 'required',
            'height' => 'required',
            'depth' => 'required',
            'condition' => 'required',
            'color' => 'required',
            'image'      => 'required|image',
            'min_price' => 'required',
            'max_price' => 'required',
            'buyout_price' => 'required',
            'enddate' => 'required',
        ]);

        $image = $request->file('image');
        $photoName = $request->input('title') . '.' . $image->getClientOriginalExtension();
        $path=public_path('img/articles/'.$photoName);
        Image::make($image->getRealPath())->resize(500, 500)->save($path);

        $article = new Article();
        $article->title = $request->input('title');
        $article->style = $request->input('style');
        $article->year = $request->input('year');
        $article->description = $request->input('description');
        $article->width = $request->input('width');
        $article->height = $request->input('height');
        $article->depth = $request->input('depth');
        $article->condition = $request->input('condition');
        $article->photo = $photoName;
        $article->min_price = $request->input('min_price');
        $article->max_price = $request->input('max_price');
        $article->buyout_price = $request->input('buyout_price');
        $article->startdate = Carbon::now();
        $article->color = $request->input('color');
        $article->enddate = date("Y-m-d", strtotime($request->input('enddate')));
        $article->user_id = Auth::id();
        $article->status="active";
        $article->save();

        return redirect('/auctions');
    }

    public function show($id)
    {
        $article = Article::where([
            'id' => $id,
            'status' => 'active',
        ])->first();

        return view("auctiondetail")->with('article', $article);
    }

    public function edit($id)
    {
        $article = Article::where([
            'id' => $id,
            'status' => 'active',
            'user_id' => Auth::id()
        ])->first();

        return view("edit_article")->with('auction',$article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'      => 'required',
            'style'     => 'required' ,
            'year'       => 'required',
            'description'=> 'required',
            'width' => 'required',
            'height' => 'required',
            'depth' => 'required',
            'condition' => 'required',
            'color' => 'required',
            'image'      => 'required|image',
            'min_price' => 'required',
            'max_price' => 'required',
            'buyout_price' => 'required',
            'enddate' => 'required',
        ]);

        $image = $request->file('image');
        $photoName = $request->input('title') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/articles/'), $photoName);

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->style = $request->input('style');
        $article->year = $request->input('year');
        $article->description = $request->input('description');
        $article->width = $request->input('width');
        $article->height = $request->input('height');
        $article->depth = $request->input('depth');
        $article->condition = $request->input('condition');
        $article->color= $request->input('color');
        $article->photo = $photoName;
        $article->min_price = $request->input('min_price');
        $article->max_price = $request->input('max_price');
        $article->buyout_price = $request->input('buyout_price');
        $article->enddate = date("Y-m-d", strtotime($request->input('enddate')));
        $article->user_id = Auth::id();
        $article->save();

        return redirect('/auctions/'.$id);
    }

    public function myArticles()
    {
        $articles = Article::where([
            'user_id' => Auth::id()
        ])->get();

        return view("myauctions")->with('articles',$articles);
    }

    public function buyNow($id)
    {
        $article = Article::where([
            'id' => $id,
            'status' => 'active',
        ])->first();

        $article->status="sold";
        $article->save();

        return view("thankyou");
    }

    public function showbiddingForm($id)
    {
        $article = Article::where("id",$id)->first();
        return view("biddingform")->with('article_id',$article->id);
    }
    public function doBidding(Request $request)
    {
        $this->validate($request, [
            'price'       => 'required'
        ]);

        $bidding = new Bidding();
        $bidding->price = $request->input('price');
        $bidding->user_id= Auth::id();
        $bidding->article_id= $request->input('article_id');
        $bidding->save();

        return redirect('auctions/'.$bidding->article_id);
    }
}
