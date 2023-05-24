@extends('layouts.client')

@section('title')
    <title>Home | Reddit</title>
@endsection


@section('content')
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h2>Get in touch</h2>
                        <form class="your-answer-form" method="POST" action="/contact">

                            @csrf
                            <div class="form-group">
                                <h3>Create a questions</h3>
                            </div>

                            <x-form.input name="name" margin="mb-3"/>
                            <x-form.input name="email" margin="mb-3"/>
                            <x-form.input name="subject" margin="mb-3"/>
                            <x-form.textarea name="body"/>


                            <div class="form-group">
                                <button type="submit" class="default-btn">Send Email</button>
                            </div>
                            @if(session()->has('message'))
                                <div>
                                    <p class="alert-success alert">{{ session('message') }}</p>
                                </div>
                            @endif
                        </form>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contacts-info">
                        <h2>Contact informaton</h2>

                        <ul class="address">
                            <li>
                                <span>Call:</span>
                                <a href="tel:+1-719-504-1984">+1 719-504-1984</a>
                            </li>
                            <li>
                                <span>Email:</span>
                                <a href="mailto:pify@gmail.com">pify@gmail.com</a>
                            </li>
                            <li class="location">
                                <span>Address:</span>
                                2958 Horizon Circle University Place, WA 98466
                            </li>
                        </ul>

                        <div class="map-area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2713.893524676537!2d-122.58847098419128!3d47.140352028062196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54910702082dcf29%3A0x93d011f7cb28f1ba!2zSG9yaXpvbiBTdCwgSm9pbnQgQmFzZSBMZXdpcy1NY0Nob3JkLCBXQSwg4Kau4Ka-4Kaw4KeN4KaV4Ka_4KaoIOCmr-CngeCmleCnjeCmpOCmsOCmvuCmt-CnjeCmn-CnjeCmsA!5e0!3m2!1sbn!2sbd!4v1641898735703!5m2!1sbn!2sbd"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



