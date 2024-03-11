@extends("legend")
@section('title')
    Home
@endsection

@section("content")
    <div class="content-container">

        <p>@if($data['hours']<12)Good Morning! @else Good Afternoon! @endif</p>
        <p class="time">Current Time: {{$data['hours'] . ":" . $data['minutes'] . ":" . $data['seconds']}} </p>

        <div class="category-container">
            @foreach($last6products as $product)
                <div class="product-category">
                    <h3>{{$product->product_name}}</h3>
                    <img src="{{ asset('tn.png') }}" alt="placeholder">
                    <input type="submit" class="submit" value="Browse"/>
                </div>
            @endforeach
        </div>




    </div>
<script>
    function refreshTime(){
        let timeElement = document.querySelector(".time");
        let currentTime = new Date();
        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();

        timeElement.textContent="Current Time: " + hours + ":" + minutes + ":" + seconds;
    }
    setInterval(refreshTime,1000);
</script>
@endsection

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
        padding: 20px;
        width: 20vw;

        text-align: center;
        height: 50vh;
        min-width: 200px;

    }
    .product-category img{
        width: 200px;
    }
</style>
