<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home(){

        // Featured Post
        $posts = Post::with('category', 'user')->orderBy('created_at','DESC')->take(5)->get();
        // Slice
        $firstColPost = $posts->splice(0, 2);
        $middleColPost = $posts->splice(0, 1);
        $lastColPost = $posts->splice(0);


        // Random Post
        $randomPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        // Slice
        $randomfirstColPost = $randomPosts->splice(0, 1);
        $randommiddleColPost = $randomPosts->splice(0, 2);
        $randomlastColPost = $randomPosts->splice(0, 1);



        $recentPosts = Post::with('category')->orderBy('created_at','DESC')->paginate(9);
        return view('frontend.homepage', compact(['posts', 'recentPosts', 'firstColPost', 'middleColPost', 'lastColPost', 'randomfirstColPost', 'randommiddleColPost', 'randomlastColPost']));
    }

    
    public function category(){
        return view('frontend.category');
    }

    
    public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();

        if($post){
            return view('frontend.post', compact('post'));
        }
        else{
            return redirect('/');
        }
        
    }

}
