@extends("legend")
@section("title")Admin Panel @endsection
@section("content")
    <div class="content-container">
        @include("admin-menu")
        <h1>All Products</h1>
        <div class="all_products_container">

            @foreach($products as $product)
            <div class="product_card">
                <div class="product_row">
                    <h6>
                        Name:<br> {{$product->product_name}}
                    </h6>
                </div>
                <div class="product_row">
                    <h6>
                        Description:<br> {{strlen($product->product_description>100)? substr($product->product_description,0,100) . "..." : $product->product_description}}
                    </h6>
                </div>
                <div class="product_row">
                    <h6>
                        Amount:<br> {{$product->product_amount}}
                    </h6>
                </div>
                <div class="product_row">
                    <h6>
                        Price:<br> {{$product->product_price}}$
                    </h6>
                </div>
                <div class="button_container">
                    <div onclick="setForm({{json_encode($product)}})" class="edit">Edit</div>
                    <div class="delete">
                        <a href="/admin/delete-product/{{$product->id}}">Delete Product</a>
                        <!--Other way:<a href="{{ route('delete-product', ['product' => $product->id]) }}">Delete Product</a> -->
                    </div>
                </div>

            </div>
        @endforeach
            <div id="edit-form" class="edit-form">
                <h1>Edit Product:</h1>
                <form id="editing-form" style="display: flex; align-items: center; justify-content: center; flex-flow: column nowrap">
                    <p class="error-display"></p>
                    <img id="closeButton" src="{{asset("/close.png")}}">
                    {{csrf_field()}}
                    <label for="dropdown">Category</label>
                    <select id="edit_category" class="product_input_special" name="dropdown">
                        <option name="product_category_input" value="1">Nike</option>
                        <option name="product_category_input" value="3">Adidas</option>
                        <option name="product_category_input" value="2">Rebook</option>
                    </select>
                    <label for="product_name">Name</label>
                    <input id="edit_name"  class="product_input" placeholder="Model Name" name="product_name" type="text">
                    <label for="product_description">Description</label>
                    <textarea id="edit_desc" class="form_text_area" placeholder="Model_Description" name="product_description"></textarea>
                    <label for="product_amount">Amount In Stock</label>
                    <input id="edit_amount"  class="product_input" placeholder="How Many Available" name="product_amount" type="number">
                    <label for="product_price">Price</label>
                    <input id="edit_price"  class="product_input" placeholder="Product Price" name="product_price" type="number">
                    <input  class="submit" type="submit" value="Upload">
                </form>
            </div>
        </div>


        <script>
            let closeButton = $("#closeButton");
            let editButton = $(".edit");
            let editForm = $("#edit-form")

            editButton.off('click').on("click", function (){
                editForm.css("display","flex")

            })
            closeButton.off('click').on('click',function(){
                editForm.css("display", "none");
            });

            function setForm(product){
                $(".error-display").text("");
                $("#edit_category").val(product.cat_id);
                $("#edit_name").val(product.product_name);
                $("#edit_desc").val(product.product_description);
                $("#edit_amount").val(product.product_amount);
                $("#edit_price").val(product.product_price);

                $("#editing-form").off("submit").on("submit",function(event){
                    event.preventDefault();

                    updateProduct(product);
                })
            }
            function updateProduct(product){
                let productId = product.id;

                $.ajax({
                url:"/editProduct/"+productId,
                    type:"GET",
                    data:{
                        "category": $("#edit_category").val(),
                        "name":$("#edit_name").val(),
                        "description":$("#edit_desc").val(),
                        "amount":  $("#edit_amount").val(),
                        "price": $("#edit_price").val()
                    },
                    success:function(response){
                        console.log(response);
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
                            $(".error-display").text(errorMessage);
                        } catch (e) {
                            console.error('An error occurred while parsing the response:', e);
                        }
                    }
                })

            }


        </script>

    </div>
@endsection
<style>
    .all_products_container{
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-items: flex-start;
    }
    .product_card{
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        width: 40vw;
        height: 90vh;
        padding: 15px;
        margin: 15px;
        text-align: center;

        border-radius: 9px 6px 9px 6px;
        background-color: white;
        color: black;

    }
    .product_card h6{
        font-size:large;
    }
    .product_row{
        border: 3px solid #6ccddc;
        width: 40vw;
    }

    .button_container{
        display: flex;
        flex-flow: row wrap;
        justify-content: space-evenly;
        width: 30vw;
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

        width: 60vw;
        height: 90vh;
        background-color: black;

        position: fixed;
        top: 5vh;
        left: 20vw;

        display: none;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;

        text-align: center;

    }
    .edit-form img{
        position: absolute;
        top: 10px;
        right: 10px;

        background-color: white;
        border-radius: 50px;
    }
    .product_input,
    .product_input_special,
    .form_text_area{
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
    .form_text_area{
        resize: none;
        height: 10vh;
    }

</style>

