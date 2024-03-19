<?php

namespace App\Http\Controllers;

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
}
