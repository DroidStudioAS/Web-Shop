<!DOCTYPE html>
<html lang="en">
@section('title')
    Contact
@endsection
@extends("legend")
@section("content")
    <div class="content-container">
        <h1>
            This Is A Contact Page
        </h1>
        <form class="contact-form">
            <input class="subject-input" type="text" placeholder="subject">
            <input class="email-input" type="email" placeholder="email">
            <textarea placeholder="Your Message"></textarea>
            <input class="submit" type="submit">
        </form>
        <h1>Reach Us Directly</h1>
        <div class="contact__sub__container">
            <div class="map-container">
                <iframe width="401" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=401&amp;height=400&amp;hl=en&amp;q=kneza%20milosa%2044%20Belgrade+()&amp;t=h&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://www.acadoo.de/'>Masterarbeit schreiben lassen</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=a87289aa1cb64d9910958604bcfd44dfb838efe6'></script>
            </div>
            <div class="location-data">
                <p>Our Address: Kneza Milosa 44</p>
                <p>Working Hours: 00-24</p>
                <p>Email: mockmail@gmail.com</p>
            </div>
        </div>
    </div>
@endsection

</html>

