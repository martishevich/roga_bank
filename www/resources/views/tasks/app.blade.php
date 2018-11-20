<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
</head>
<body>
<ul>
    @foreach($tasks as $task)
        <li>
            <a href="tasks/{{$task->id}}">
            {{$task->body}}
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>
