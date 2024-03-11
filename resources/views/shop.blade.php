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
                <div class="product-category">

                    <img src="{{ asset('tn.png') }}" alt="placeholder">
                    <div class="product_content">
                        <div class="product_sub_content">
                            <p class="product_name">{{$product->product_name}}</p>
                            <p class="product_description"> {{strlen($product->product_description)>100 ? substr($product->product_description, 0, 100) . "..." : $product->product_description}} </p>
                        </div>

                        <p>{{$product->product_price}}$</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
</html>
<style>
    .category-container{
        display: flex;
        flex-flow: row wrap;
        justify-content: space-evenly;
        align-items: center;
        width: 80vw;
        padding: 20px;
    }
    .product-category{
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-flow: column nowrap;
        font-size: large;
        border:2px white solid;
        border-radius: 8px 6px 8px 6px;
        width: 20vw;

        text-align: center;
        height: 60vh;
        min-width: 20vw;

    }
    .product-category img{
        width: 20vw;
        height: 40vh;
    }
    .product_content{
        display: flex;
        flex-flow:row nowrap;
        justify-content: flex-start;
        align-items: center;
        text-align: left;
        height: 20vh;
    }
    .product_name{
        font-size: medium;
        text-align: center;
    }
</style>

