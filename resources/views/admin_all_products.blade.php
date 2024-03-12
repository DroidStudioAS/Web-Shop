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
                    <div onclick="logger({{json_encode($product)}})" class="edit">Edit</div>
                    <div class="delete">
                        <a href="/admin/delete-product/{{$product->id}}">Delete Product</a>
                        <!--Other way:<a href="{{ route('delete-product', ['product' => $product->id]) }}">Delete Product</a> -->
                    </div>
                </div>

            </div>
        @endforeach
            <div id="edit-form" class="edit-form">
                <form style="display: flex; align-items: center; justify-content: center; flex-flow: column nowrap">
                    <img id="closeButton" src="{{asset("/close.png")}}">
                    {{csrf_field()}}
                    <select id="edit_category" class="product_input_special" name="dropdown">
                        <option name="product_category_input" value="1">Nike</option>
                        <option name="product_category_input" value="3">Adidas</option>
                        <option name="product_category_input" value="2">Rebook</option>
                    </select>
                    <input id="edit_name" value="{{old("product_name")}}" class="product_input" placeholder="Model Name" name="product_name" type="text">
                    <input id="edit_desc" value="{{old("product_description")}}" class="product_input_special" placeholder="Model_Description" name="product_description" type="text">
                    <input id="edit_amount" value="{{old("product_amount")}}" class="product_input" placeholder="How Many Available" name="product_amount" type="number">
                    <input id="edit_price" value="{{old("product_price")}}" class="product_input" placeholder="Product Price" name="product_price" type="number">
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

            function logger (product){
                console.log(product.product_name);
                $("#edit_name").val(product.product_name);
                $("#edit_desc").val(product.product_description);
                $("#edit_amount").val(product.product_amount);
                $("#edit_price").val(product.product_price);


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

</style>

