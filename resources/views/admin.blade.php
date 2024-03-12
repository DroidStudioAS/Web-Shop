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
            <div class="add-product-container">
                <h3>Add A Product</h3>
                <form method="POST" action="/admin/post" class="product-input-container">
                    @if($errors->any())
                        <p class="error-message">{{$errors->first()}}</p>
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
            <div class="contacts_container">
                <h3>Contacts</h3>
                    @foreach($contacts as $contact)
                    <div class="message">
                        <div class="message_row">
                            From: {{$contact->email}}
                        </div>
                        <div class="message_row">
                           Subject:  {{$contact->subject}}
                        </div>
                        <div class="message_row">
                           Message: {{$contact->message}}
                        </div>
                        <div class="button_container">
                            <div class="edit">
                                Edit
                            </div>
                            <div class="delete">
                                <a href="/admin/delete-contact/{{$contact->id}}">Delete </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</body>
</html>
<style>
    .add-product-container h3{
        text-align: center;
    }
    .product-input-container{
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        text-align: center;
        background: black;
        padding: 30px;
        border-radius: 8px 6px 8px 6px;

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
        margin: 10px;
    }
    .product_input_special{
        width: 20vw;
    }
    .error-message{
        color: red;
    }
    .contacts_container{
        text-align: center;
    }

    .message{
        margin: 30px;
        padding: 30px;
        background: black;
        border-radius: 4px 6px 4px 6px;
        width: 40vw;
    }
    .message_row{
        margin: 10px;
        font-size: large;
    }
    .button_container{
        display: flex;
        flex-flow: row wrap;
        justify-content: space-evenly;
        width: 40vw;
    }
    .edit {
        margin-top: 15px;
        padding: 20px;
        border-radius: 8px 6px 8px 6px;
        font-size: large;
        background-color: #6ccddc;
        color: white;
    }
    .delete {
        margin-top: 15px;
        padding: 20px;
        border-radius: 8px 6px 8px 6px;
        font-size: large;
        background-color: red;
        color: white;
    }
</style>
