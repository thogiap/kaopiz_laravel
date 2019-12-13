<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function insert_posts(Request $request)
    {
        DB::table('posts')->insert(
            ['title' => $request->title, 'content' => $request->content_post, 'url' => $request->url]

        );
        return redirect()->route('get_posts');


    }

    public function update_post(Request $request)
    {
        $id = $request->id;
        DB::table('posts')->where('id', $id)->update(
            ['title' => $request->title, 'content' => $request->content_post, 'url' => $request->url]
        );
        return redirect()->route('get_posts');


    }

    public function get_posts($posts = NULL)
    {
        if ($posts == NULL) {
            $posts = DB::table('posts')->get();
        }
//        dd($posts);
        return view('list_posts', ['posts' => $posts]);
    }

    public function delete_posts(Request $request)
    {
        $id = $request->id;
//        dd($id);
        DB::table('posts')->where('id', '=', $id)->delete();
//        echo 'delete thanh cong';
        return redirect()->route('get_posts');
    }

    public function get_view_update_post(Request $request)
    {
        $id = $request->id;
//        dd($id);
        $post = DB::table('posts')->where('id', '=', $id)->first();
//        echo 'delete thanh cong';
        return view('update', ['post' => $post]);
    }

    public function create_posts()
    {
        return view('create_posts');
    }

    public function get_view_search($posts = [])
    {
        return view('search', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $title = $request->title;
        $posts = DB::table('posts')
            ->where('title', 'like', '%'.$title.'%')
            ->get();
        return $this->get_posts($posts);
    }
}
