<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
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
