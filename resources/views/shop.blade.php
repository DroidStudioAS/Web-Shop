@extends('legend')
@section('title')
    Shop
@endsection
@section('content')

    <div class="content-container">
        <h1>
            This Is A Shop Page
        </h1>
        @foreach($products as $product)
            <div>
                {{$product}} @if($product==="T-Shirts") - Mega Discounts @endif
            </div>
        @endforeach
    </div>
@endsection

