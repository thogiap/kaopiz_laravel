<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('search_orm')}}" method="POST">
    @csrf
    search title: <input type="text" name="title"> <br>
    <input type="submit">
</form>

<table>
    <tr>
        <td>id</td>
        <td>title</td>
        <td>content</td>
        <td>url</td>
        <td>Action</td>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->url}}</td>

            <td>
                <a href="{{route('delete_posts_orm', [ 'id' => $post->id])}}">Xoa</a>
                <a href="{{route('update_post_orm', [ 'id' => $post->id])}}">Update</a>
            </td>
        </tr>

        @endforeach
</table>
</body>
</html>
