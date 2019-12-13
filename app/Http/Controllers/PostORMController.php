<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostORMController extends Controller
{
    public function insert_posts(Request $request)
    {
//        DB::table('posts')->insert(
//            ['title' => $request->title, 'content' => $request->content_post, 'url' => $request->url]
//
//        );
        $posts = new Posts();

        $posts->title = $request->title;
        $posts->content = $request->content_post;
        $posts->url = $request->url;

        $posts->save();
        return redirect()->route('get_posts_orm');


    }

    public function update_post(Request $request)
    {
        $id = $request->id;
//        DB::table('posts')->where('id', $id)->update(
//            ['title' => $request->title, 'content' => $request->content_post, 'url' => $request->url]
//        );

        $posts = Posts::find($id);

        $posts->title = $request->title;
        $posts->content = $request->content_post;
        $posts->url = $request->url;

        $posts->save();
        return redirect()->route('get_posts_orm');


    }

    public function get_posts($posts = NULL)
    {
        if ($posts == NULL) {
//            $posts = DB::table('posts')->get();
            $posts = Posts::all();
        }
//        dd($posts);
        return view('orm/list_posts', ['posts' => $posts]);
    }

    public function delete_posts(Request $request)
    {
        $id = $request->id;
//        dd($id);
//        DB::table('posts')->where('id', '=', $id)->delete();

        $posts = Posts::find($id);

        $posts->delete();

//        echo 'delete thanh cong';
        return redirect()->route('get_posts_orm');
    }

    public function get_view_update_post(Request $request)
    {
        $id = $request->id;
//        dd($id);
//        $post = DB::table('posts')->where('id', '=', $id)->first();
        $post = Posts::find($id);
//        echo 'delete thanh cong';
        return view('orm/update', ['post' => $post]);
    }

    public function create_posts()
    {
        return view('orm/create_posts');
    }

    public function get_view_search($posts = [])
    {
        return view('search', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $title = $request->title;
//        $posts = DB::table('posts')
//            ->where('title', 'like', '%'.$title.'%')
//            ->get();
        $posts = Posts::where('title', 'like', '%'.$title.'%')->get();
        return $this->get_posts($posts);
    }
}
