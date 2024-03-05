<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
