
<body>
    @extends('legend')
    @section("title")Admin Panel @endsection
    @section('content')
        <div class="content-container">

            @include("admin-menu")
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
                    <input value="{{old("product_name")}}" class="product_input" placeholder="Model Name" name="product_name" type="text">
                    <input value="{{old("product_description")}}" class="product_input" placeholder="Model_Description" name="product_description" type="text">
                    <input value="{{old("product_amount")}}" class="product_input" placeholder="How Many Available" name="product_amount" type="number">
                    <input value="{{old("product_price")}}" class="product_input" placeholder="Product Price" name="product_price" type="number">
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
                            <div onclick="makeFormVisible({{json_encode($contact)}})" id="editButton" class="edit">
                                Edit
                            </div>
                            <div class="delete">
                                <a href="{{route("delete-contact", ["contact"=>$contact->id])}}">Delete </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="edit-form" class="edit-form">
                <form id="editing-form"  style="display: flex; align-items: center; justify-content: center; flex-flow: column nowrap">
                    <p id="errorDisplay"></p>
                    <img id="closeButton" src="{{asset("/close.png")}}">
                    {{csrf_field()}}
                    <input id="edit-email" value="" class="product_input" placeholder="Email" name="edit-email" type="text">
                    <input id="edit-subject" value="" class="product_input" placeholder="Subject" name="edit-subject" type="text">
                    <textarea id="edit-message" class="product_input" placeholder="Message" name="edit-message"></textarea>
                    <input class="submit" type="submit" value="Upload">
                </form>

            </div>
        </div>
        <script>
            let closeButton = $("#closeButton");
            let editButton = $(".edit");
            let editForm = $("#edit-form")

            function makeFormVisible(contact){
                editForm.css("display","flex")
                $("#edit-email").val(contact.email);
                $("#edit-subject").val(contact.subject);
                $("#edit-message").val(contact.message);

                $("#editing-form").off('submit');
                $("#editing-form").submit(function (event){
                    event.preventDefault();

                    updateContact(contact);
                })

            }
            closeButton.off('click').on('click',function(){
                editForm.css("display", "none");
            });

            function updateContact(contact){
                contactId = contact.id;
                console.log(contactId);

                $.ajax({
                    url:"/editContact/"+ encodeURIComponent(contactId),
                    type:"GET",
                    data:{
                        "email":$("#edit-email").val(),
                        "subject":$("#edit-subject").val(),
                        "message":$("#edit-message").val()
                    },
                    success:function(response){
                        if(response==="ok!"){
                            location.reload();
                        }
                    },
                    error:function(xhr){
                        try {
                            // Parse the JSON response
                            let response = JSON.parse(xhr.responseText);

                            // Iterate over the errors object and concatenate all error messages
                            let errorMessages = [];
                            for (let key in response.errors) {
                                if (response.errors.hasOwnProperty(key)) {
                                    errorMessages.push(response.errors[key][0]);
                                }
                            }

                            // Concatenate all error messages into a single string
                            let errorMessage = errorMessages.join('\n');

                            // Use the error message as needed
                            $("#errorDisplay").text(errorMessage);
                        } catch (e) {
                            console.error('An error occurred while parsing the response:', e);
                        }
                    }
                })
            }


        </script>
    @endsection
</body>
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

    /*******Edit Form Styles*******/
    .edit-form{

        width: 70vw;
        height: 80vh;
        background-color: black;

        position: fixed;
        top: 10vh;
        left: 15vw;

        display: none;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;

    }
    .edit-form img{
        position: absolute;
        top: 10px;
        right: 10px;

        background-color: white;
        border-radius: 50px;
    }
</style>
