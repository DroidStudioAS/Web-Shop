@extends("legend")
@section('title')
    Home
@endsection

@section("content")
    <div class="content-container">
        <p>@if($hours<12)Good Morning! @else Good Afternoon! @endif</p>
        <p class="time">Current Time: {{ $hours . ":" .$minutes . ":" . $seconds }}</p>
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
