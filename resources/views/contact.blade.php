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
    </div>
@endsection

</html>
