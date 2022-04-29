@extends('front.common.app')
@section('content')
    <!-- Bread-Crumb -->
    <section class="bread_crumb">
        <div class="container">
            <ul>
                <li><a href="index.html">Home <i class="fas fa-angle-double-right"></i></a></li>
                <li>
                    <p>Contact Us</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- All-News-Section -->
    <section class="row_am contact_page">
        <div class="container">
            <h2>Contact Us today</h2>
            <div class="contact_section">
                <div class="contact-detail">
                    <ul class="address">
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <a href="#">brand@gmail.com</a>
                        </li>
                        <li>
                            <span><i class="fas fa-phone"></i></span>
                            <a href="#">000 000 0000</a>
                        </li>
                    </ul>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" placeholder="Enter Your E-mail" required>
                        </div>
                        <div class="form-group">
                            <label>Number</label>
                            <input type="number" placeholder="Enter Your Number">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="message">
                            <label>Enter Your Message</label>
                            <textarea placeholder="Message"></textarea>
                        </div>
                        <button class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
