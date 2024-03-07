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
                <div class="product_category">
                    {{$category->category_name}}
                </div>
            @endforeach
        </div>

    </div>
@endsection

