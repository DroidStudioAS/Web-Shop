<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    @extends('legend')
    @section('content')
        <div class="content-container">
           <div>
                @foreach($contacts as $contact)
                    <div>
                        {{$contact->email}}
                    </div>
                   <div>
                       {{$contact->subject}}
                   </div>
                   <div>
                       {{$contact->message}}
                   </div>
                @endforeach
           </div>
        </div>
    @endsection
</body>
</html>
