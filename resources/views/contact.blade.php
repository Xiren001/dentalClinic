@extends('layouts.main')
@section('content')
<div class="main-container">
    <h1 class="contact-title">CONTACT US</h1>
    <div class="contact-container">
        <div class="contact-form-container">
            <div class="contact-heading-container">
                <h1 class="contact-form-title">Get in Touch With Us</h1>
                <p class="contact-form-subtitle">Fill up the form and let us know how we can help.</p>
            </div>
            <div class="contact-information-container">
                <div class="contact-item-container">
                    <img class="contact-icon" src="{{ asset('img/Phone_fill.svg')}}" alt="">
                    <p class="contact-content">09123456789</p>
                </div>
                <div class="contact-item-container">
                    <img class="contact-icon" src="{{ asset('img/Pin_fill.svg')}}" alt="">
                    <p class="contact-content">University of Mindano</p>
                </div>
                <div class="contact-item-container">
                    <img class="contact-icon" src="{{ asset('img/Message_alt_fill.svg')}}" alt="">
                    <p class="contact-content">onlinedentalclinic@gmail.com</p>
                </div>
            </div>            
            <form class="contact-form" action="" method="POST">
                @csrf
                <div class="contact-input-container1">
                    <input placeholder="Your Name" class="contact-input" type="text" name="name" id="name">
                    <input placeholder="Email" class="contact-input" type="email" name="email" id="email">
                </div>
                <input placeholder="Subject" class="contact-input2" type="subject" name="subject" id="subject">
                <textarea placeholder="Message" class="contact-textarea" name="message" id="message" cols="30" rows="10"></textarea>
                <button class="send-button">Send</button>
            </form>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5184566278162!2d125.59390037544762!3d7.065723492936844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f96d65ac7d3493%3A0xa54471a513d5fc70!2sUniversity%20of%20Mindanao%20-%20Matina!5e0!3m2!1sen!2sph!4v1718739824820!5m2!1sen!2sph" width="800" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@endsection
@section('css')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection