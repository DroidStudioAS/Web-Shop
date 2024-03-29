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
                <div class="full_container">
                    <div class="column_container">
                        <img src="{{asset("/tn.png")}}">
                        <div class="product_information">
                            <div class="desc_container">
                                <p class="product_name">{{$product->product_name}}</p>
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

</style>
