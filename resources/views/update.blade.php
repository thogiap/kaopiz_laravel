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
<form action="{{route('update_post', ['id' => $post->id])}}" method="POST">
    @csrf
    Title: <input type="text" name="title" value="{{$post->title}}"> <br>
    Content: <input type="text" name="content_post" value="{{$post->content}}"> <br>
    Url: <input type="text" name="url"  value="{{$post->url}}" > <br>
    <input type="submit">
</form>
</body>
</html>
