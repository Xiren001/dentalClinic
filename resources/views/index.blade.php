@extends('layouts.main')
@section('content')
<div class="main-container">
    <div class="intro-container">
        <h1 class="intro-title">Where <span class="intro-title-highlight">Beautiful Smiles</span> Begin.</h1>
        <p class="intro-subtitle">Gentle, compassionate care | Advanced technology | Convenient scheduling.</p>
        <div class="intro-button-container">
            <a class="book-appointment-container" href="">BOOK AN APPOINTMENT</a>
            <div class="learn-more-container">
                <a class="learn-more-link" href="#about-section">Learn More</a>
                <img src="{{ asset('img/Arrow-Down.svg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="about-container" id="about-section">
        <div class="about-1-container">
            <p class="about-title">Welcome to Online Dental Clinic, where your smile is our top priority.</p>
            <img src="{{ asset('img/Line-Decoration.png')}}" alt="">
        </div>
        <div class="about-2-container">
            <img class="about-img" src="{{ asset('img/About-Image-Decoration.png')}}" alt="">
            <p class="about-2-subtitle">At our Online Dental Clinic, we are dedicated to providing personalized and gentle care. Our team of experienced professionals uses the latest technology to ensure the best dental health for you and your family. Experience a welcoming environment where every visit leaves you with a brighter smile.</p>
            <div class="about-link-container">
                <a class="about-link" href="{{ route('about') }}">LEARN MORE ABOUT US</a>
                <img src="{{ asset('img/Arrow-Right.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="services-container">
        <h1 class="services-title">How to get our service?</h1>
        <div class="card-container">
            <div class="service-cards">
                <div class="service-cards-title-container">
                    <div class="card-number">1</div>
                    <h1 class="card-title">Book for an Appointment</h1>
                </div>
                <p class="service-card-subtitle">Schedule your appointment easily with our system. Simply select the date and time that suits you best. Then, choose the service you require.</p>
            </div>
            <div class="service-cards">
                <div class="service-cards-title-container">
                    <div class="card-number">2</div>
                    <h1 class="card-title">Get a<br class="linebreak"> Confirmation</h1>
                </div>
                <p class="service-card-subtitle">Once you've scheduled, wait for an appointment confirmation. After confirmation, you'll receive an email notification. This email will include your appointment ID.</p>
            </div>
            <div class="service-cards">
                <div class="service-cards-title-container">
                    <div class="card-number">3</div>
                    <h1 class="card-title">Consult your Dentist</h1>
                </div>
                <p class="service-card-subtitle">Please arrive at our clinic according to your scheduled time. Failure to attend as planned may result in the cancellation of your appointment.</p>
            </div>
        </div>
        <div class="services-link-container">
            <a class="services-link" href="{{ route('service') }}">KNOW OUR SERVICES</a>
            <img src="{{ asset('img/Arrow-Right.svg')}}" alt="">
        </div>
    </div>
    <div class="contact-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5184566278162!2d125.59390037544762!3d7.065723492936844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f96d65ac7d3493%3A0xa54471a513d5fc70!2sUniversity%20of%20Mindanao%20-%20Matina!5e0!3m2!1sen!2sph!4v1718739824820!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="contact-section-container">
            <div class="contact-title-container">
                <h1 class="contact-title">Reach Out to Us</h1>
                <img src="{{ asset('img/Line-Decoration-2.png')}}" alt="">
            </div>
            <p class="contact-subtitle">Located in the University Of Mindanao, our clinic offers personalized healthcare services to the local community. For inquiries, please call us at 09123456789. Need further assistance? Our dedicated customer service team is just a click away.</p>
            <div class="contact-link-container">
                <a class="contact-link" href="{{ route('contact') }}">VIEW CUSTOMER SERVICE</a>
                <img src="{{ asset('img/Arrow-Right.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection