<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>@yield("title" , "default")</title>
</head>
    <header>
        @include('navigation')
    </header>
    <body>
    <!--Content space-->
    <!--Command to display section-->
    @yield("content")
    <!--Content space-->
    </body>
<footer>
    @include('footer')
</footer>


</html>
