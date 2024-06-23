<footer class="footer">
    <div class="footer-menu-container">
        <a href="{{ route('index')}}">Home</a>
        <a href="{{ route('about')}}">About</a>
        <a href="{{ route('service')}}">Services</a>
        <a href="{{ route('contact')}}">Contacts</a>
    </div>
    <div class="footer-logo-container">
        <img class="footer-website-logo" src="{{ asset('img/Logo.png')}}" alt="">
        <p class="copyright">© 2024 Online Dental Clinic. All rights reserved.</p>
    </div>
    <div class="footer-contacts-container">
        <div class="contact-footer-container">
            <p class="footer-title">Contact</p>
            <div class="footer-subtitle-container">
                <img class="contact-icon" src="{{ asset('img/Phone-Icon.svg')}}" alt="">
                <p class="footer-subtitle">09123456789</p>
            </div>
        </div>
        <div class="contact-footer-container">
            <p class="footer-title">Location</p>
            <div class="footer-subtitle-container">
                <img class="contact-icon" src="{{ asset('img/Map-Indicator.svg')}}" alt="">
                <p class="footer-subtitle">Univiersity Of Mindanao</p>
            </div>
        </div>
    </div>
</footer>