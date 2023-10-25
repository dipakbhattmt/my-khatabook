<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
   public function index(){
       $lastFeed = Feed::latest()->first();
       return view('feed.index', compact('lastFeed'));
   }

   public function store(Request $request){
       return  Feed::create(['info' => $request->info]);

   }
}
