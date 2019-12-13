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
<form action="{{route('create_posts')}}" method="POST">
    @csrf
    Title: <input type="text" name="title"> <br>
    Content: <input type="text" name="content_post"> <br>
    Url: <input type="text" name="url"> <br>
    <input type="submit">
</form>
</body>
</html>
