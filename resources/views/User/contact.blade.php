@extends('User.Sidebar')

@section('title', 'Contact Us')

@section('website')
<div class="container mt-5">

    <!-- Google Map -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-3" style="color:#007bff;">Our Location</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019809258564!2d-122.4194150846818!3d37.77492927975944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c5d8b16c9%3A0x2d68b7e3b13c3e4c!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2s!4v1696800000000!5m2!1sen!2s"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Contact Info & Form -->
    <div class="row">
        <!-- Contact Info -->
        <div class="col-lg-5 mb-4">
            <h3 style="color:#007bff;">Contact Information</h3>
            <p>We would love to hear from you! Reach out with any questions or feedback.</p>
            <ul class="list-unstyled contact-info">
                <li><i class="fas fa-map-marker-alt"></i> 123 Main Street, Your City</li>
                <li><i class="fas fa-phone"></i> +123 456 7890</li>
                <li><i class="fas fa-envelope"></i> free@infoexample.com</li>
            </ul>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-7">
            <h3 style="color:#007bff;">Send a Message</h3>
            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
            </form>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
/* Map Styling */
.map-container iframe {
    border-radius: 10px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}

/* Contact Info */
.contact-info li {
    margin-bottom: 15px;
    font-size: 16px;
    color: #555;
}
.contact-info i {
    color: #007bff;
    margin-right: 10px;
}

/* Form Inputs */
.contact-form input,
.contact-form textarea {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    width: 100%;
    font-size: 15px;
    transition: border-color 0.3s, box-shadow 0.3s;
}
.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
    outline: none;
}

/* Button Styling */
.contact-form button {
    border-radius: 8px;
    padding: 12px;
    font-size: 16px;
    background-color: #007bff;
    border: none;
    transition: background-color 0.3s;
}
.contact-form button:hover {
    background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .map-container iframe {
        height: 300px;
    }
}
</style>
@endsection
