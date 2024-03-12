@extends("legend")
@section("title")Admin Panel @endsection
@section("content")
    <div class="content-container">
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
                    <div class="edit">Edit</div>
                    <div class="delete">
                        <a href="/admin/delete-product/{{$product->id}}">Delete Product</a>
                        <!--Other way:<a href="{{ route('delete-product', ['product' => $product->id]) }}">Delete Product</a> -->
                    </div>
                </div>

            </div>
        @endforeach
        </div>



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

</style>

