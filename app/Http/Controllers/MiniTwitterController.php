<?php

namespace App\Http\Controllers;

use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Models\MiniTwitter;

class MiniTwitterController extends Controller
{
    //

    public function index()
    {
        // return "Hallo from controller";
        return (MiniTwitter::all());
    }

    public function receiveData(Request $request)
    {
        return response()->json($request->all());
    }

    public function store(Request $request)
    {


        $inputData = $request->validate([
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => ['required', 'email'],
            'tweet_title' => 'required',
            'tweet_text' => 'required'
        ]);


        MiniTwitter::create($inputData);



        // return response()->json($request->all());
        return response()->json($request);
    }

    public function delete($id, MiniTwitter $tweet, Request $request)
    {


        // $tweetID = $tweet::find($request->id);

        $tweet::find($id)->delete();
        return response()->json($request->id);
    }

    public function update($id, MiniTwitter $tweet, Request $request)
    {

        $inputData = $request->validate([
            'tweet_title' => 'required',
            'tweet_text' => 'required'

        ]);


        $tweet::find($id)->update($inputData);
        return response()->json($request->id);
    }

    // Try to return sorted data

    public function sort(Request $request)
    {
        $tweets = QueryBuilder::for(MiniTwitter::class)
            ->allowedFilters(['title', 'views'])
            ->allowedSorts(['title', 'created_at', 'tweet_title', 'views', 'vorname'])
            ->get();
        // ->paginate($request->get('perPage', 5));
        // return response()->json($tweets::all());
        // return response()->json($tweets);

        return $tweets;
        // return MiniTwitter::latest()->get();
    }

    public function pagination(Request $request)
    {

        return (MiniTwitter::latest()->paginate(5));
    }
}
