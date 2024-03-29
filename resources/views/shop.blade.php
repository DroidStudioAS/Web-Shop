<!DOCTYPE html>
<html lang="en">
@extends('legend')
@section('title')
    Shop
@endsection
@section('content')

    <div class="content-container">
        <h1>
            This Is A Shop Page
        </h1>
        <div class="category-container">
           @foreach($products as $product)
                <div class="full_container">
                    <div class="column_container">
                        <img src="{{asset("/tn.png")}}">
                        <div class="product_information">
                            <div class="desc_container">
                                <p class="product_">{{$product->product_name}}</p>
                                <p>{{strlen($product->product_description)>100? substr($product->product_description,0,100)."..." : $product->product_description}}</p>
                            </div>
                            <div class="price_container">
                                {{$product->product_price}}$
                            </div>
                        </div>

                    </div>
                    <div class="action_buttons">
                        <div class="action_button">
                            <img src="{{asset("/icon_cart.png")}}">
                        </div>
                        <div class="action_button">
                            <img src="{{asset("/icon_info.png")}}">
                        </div>
                    </div>
                </div>
           @endforeach


        </div>
    </div>
@endsection
</html>


