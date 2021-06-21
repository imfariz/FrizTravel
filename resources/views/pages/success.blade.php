@extends('layouts.checkout')
@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{url('frontend/images/logo/logo assets/logo icon/ic_mail_box.png')}}" alt="">
            <h1>Yeay! Payment Success</h1>
            <p>Your payment has success. we have sent you an email <br> about trip details. Please read it as well.</p>
            <a href="{{route('home')}}" class="btn btn-homepage mt-3 px-5">Home Page</a>
        </div>
    </div>
</main>
@endsection