<?php

namespace HappyToDev\FlatCms\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use HappyToDev\FlatCms\Models\Post;
use HappyToDev\FlatCms\Models\User;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rd1 = rand(1, 500);

        // $user = new User();
        // $user->name = "John Doe";
        // $user->email = "jdoe$rd1@mail.com";
        // $user->password = "secret";

        try {
            //code...
            $userPassword = Hash::make('password');
            $user = User::firstOrCreate(
                ['name' => 'John Doe', 'email' => "jdoe$rd1@gmail.com", 'password' => $userPassword]
            );

            $post = new Post;
            
            $postRand = rand(1000, 9999);

            $post->title = 'My post number ' . $postRand;
            $post->tldr = 'This is the ' . $postRand . 'th post';
            $post->slug = Str::slug($post->title);
            $post->content = 'Lorem ipsum sit amet em dolor' . $postRand;
            $post->user_id = $user->id;
            $post->save();
            dd($post);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
        echo 'test';
        
        try {
            $result = $user->save();
            var_dump( "Result: $result");
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
