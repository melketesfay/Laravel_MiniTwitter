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
}
