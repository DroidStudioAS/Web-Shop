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
            @foreach($categories as $category)
                <div class="product-category">
                    <h3>{{$category->category_name}}</h3>
                    <img src="{{ asset('tn.png') }}" alt="placeholder">
                    <input type="submit" class="submit" value="Browse"/>
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
        font-size: xx-large;
        border:2px white solid;
        border-radius: 8px 6px 8px 6px;
        padding: 20px;
        width: 20vw;

    }
    .product-category img{
        margin: 30px;
        width: 15vw;
    }
</style>

