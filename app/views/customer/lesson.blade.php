<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    Danh sách bài học css
    <ul class="lesson_list">
        @foreach($dataLesson as $key)
        <li><a href="cau-hoi?lesson_id={{$key['lesson_slug']}}">{{$key['lesson_name']}}</a></li>
        @endforeach
    </ul>
</body>

</html>