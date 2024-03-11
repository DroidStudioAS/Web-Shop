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
            <div class="add-product-container">
                <form method="POST" action="/admin/post" class="product-input-container">
                    @if($errors->any())
                        <p>{{$errors->first()}}</p>
                    @endif
                    {{csrf_field()}}
                    <select class="product_input_special" name="dropdown">
                        <option name="product_category_input" value="1">Nike</option>
                        <option name="product_category_input" value="3">Adidas</option>
                        <option name="product_category_input" value="2">Rebook</option>
                    </select>
                    <input class="product_input" placeholder="Model Name" name="product_name" type="text">
                    <input class="product_input" placeholder="Model_Description" name="product_description" type="text">
                    <input class="product_input" placeholder="How Many Available" name="product_amount" type="number">
                    <input class="product_input" placeholder="Product Price" name="product_price" type="number">
                    <input class="submit" type="submit" value="Upload">
                </form>
            </div>
        </div>
    @endsection
</body>
</html>
<style>
    .product-input-container{
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .product_input,
    .product_input_special{
        width: 40vw;
        padding: 12px 10px 12px 10px;
        background-color: black;
        border-bottom: 3px solid #6ccddc;
        color: white;
        border-radius: 4px 6px 4px 6px;
        font-size: large;
        font-family: "Bodoni MT Poster Compressed", sans-serif;

        text-align: center;
    }
</style>
