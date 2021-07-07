<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    
    public function validateTweet(Request $request){
        $validated = $request->validate([
            'tweet'=>'required|max:250',
        ]);

        return $validated;
    }
    
    public function getAllTweets(){
        $tweets = Auth()->user()->tweets()
                                ->orderBy('updated_at','desc')
                                ->paginate(3);
        return response()->json($tweets);
    }

    public function createTweet(Request $request){
        try {
            $this->validateTweet($request);
    
            $tweet = Tweet::create([
                'tweet'=>$request->tweet,
                'user_id'=>Auth()->user()->id,
            ]);
    
            return response()->json($tweet);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Too long, max 250 chars']);
        }

    }


    public function updateTweetById(Request $request,$id){

        try{

            $this->validateTweet($request);
    
            $tweet = Tweet::findOrFail($id);
            $tweet->tweet = $request->tweet;
            $tweet->save();
    
            return response()->json($tweet);
        }catch (\Throwable $th) {
            return response()->json(['message'=>'Too long, max 250 chars']);
        }
    }

    public function deleteTweetById($id){
        try{

            $tweet = Tweet::findOrFail($id);
            $tweet->delete();
            $data = [
                'status' => 200,
                'data'   => 'Tweet deleted successfully'
            ];
            
        } catch (\Throwable $th) {
            $data = [
                'status' => 500,
                'data'   => 'Server is not working'
            ];
        }
        return response()->json($data);
    }

}
