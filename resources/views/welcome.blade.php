@extends("legend")
@section('title')
    Home
@endsection

@section("content")
<p>Current Time: {{ date('H:i:s') }}</p>
<script>
    function refreshTime(){
        let timeElement = document.querySelector("p");
        let currentTime = new Date();
        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();

        timeElement.textContent="Current Time: " + hours + ":" + minutes + ":" + seconds;
    }
    setInterval(refreshTime,1000);
</script>
@endsection
