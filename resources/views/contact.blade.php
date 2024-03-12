<!DOCTYPE html>
<html lang="en">
@section('title')
    Contact
@endsection
@extends("legend")
@section("content")
    <div class="content-container">
    <h1> Contact Us </h1>
    <img class="back-image" src="{{ asset('back.jpg') }}" alt="Image">
    <div class="form-container">

        <form class="form" action="/send-message" method="POST">
            {{csrf_field()}}
            <p>
            @if($errors->any())
                {{$errors->first()}}
                @endif
            </p>
            <input value="{{old("subject")}}" name="subject" class="subject-input" type="text" placeholder="subject">
            <input value="{{old("email")}}" name="email" class="email-input" type="email" placeholder="email">
            <textarea name="message" placeholder="Your Message">{{old('message')}}</textarea>
            <input class="submit" type="submit">
        </form>
        <div class="data">
            <h2>Reach Us</h2>
            <p>Kneza Milosa 44</p>
            <p>00-24</p>
            <p>mockmail@gmail.com</p>
            <div class="map-container">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=401&amp;height=400&amp;hl=en&amp;q=kneza%20milosa%2044%20Belgrade+()&amp;t=h&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://www.acadoo.de/'>Masterarbeit schreiben lassen</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=a87289aa1cb64d9910958604bcfd44dfb838efe6'></script>
            </div>
        </div>
    </div>
    </div>
@endsection

</html>

