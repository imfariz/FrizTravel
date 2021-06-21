@extends('layouts.app')

@section('title')
    Details Travel
@endsection

@section('content')
<main>
    <section class="section-breadcrumb-heading">
    </section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-0">
                    <div class="card card-details">
                        <h1>{{ $items->title }}</h1>
                        <p>{{ $items->location }}</p>
                        @if ($items->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img 
                                    class="xzoom" 
                                    id="xzoom-default" 
                                    src="{{ Storage::url($items->galleries->first()->image) }}" 
                                    xoriginial="{{ Storage::url($items->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($items->galleries as $img)
                                        <a href="{{ Storage::url($img->image) }}">
                                            <img src="{{ Storage::url($img->image) }}" 
                                            alt="Tanjung Puting" class="xzoom-gallery" 
                                            width="128" 
                                            xpreview="{{ Storage::url($img->image) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <h2>About Destination</h2>
                        <p>
                            {!! $items->about !!}
                        </p>
                        <div class="features row">
                            <div class="col-xs-6 col-md-4">
                                <img src="{{url('./frontend/images/logo/logo assets/logo icon/ic_event.png')}}" alt="Event" class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $items->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 border-left">
                                <img src="{{url('./frontend/images/logo/logo assets/logo icon/ic_language.png')}}" alt="Language" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $items->language }}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 border-left">
                                <img src="{{url('./frontend/images/logo/logo assets/logo icon/ic_foods.png')}}" alt="Foods" class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $items->food }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members">
                            <img src="{{url('./frontend/images/profil/david.jpg')}}" class="members-image rounded-circle mr-1">
                            <img src="{{url('./frontend/images/profil/david.jpg')}}" class="members-image rounded-circle mr-1">
                            <img src="{{url('./frontend/images/profil/david.jpg')}}" class="members-image rounded-circle mr-1">
                            <img src="{{url('./frontend/images/profil/david.jpg')}}" class="members-image rounded-circle mr-1">
                            <img src="{{url('./frontend/images/profil/david.jpg')}}" class="members-image rounded-circle mr-1">
                        </div>
                        <hr>
                        <h2>Trip Informations</h2>
                        <table class="trips-information">
                            <tr>
                                <th width=50%>Date of departure</th>
                                <td width=50% class="text-right">
                                    {{ \Carbon\Carbon::create($items->departure_date)->format('F n, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th width=50%>Duration</th>
                                <td width=50% class="text-right">{{ $items->duration }}</td>
                            </tr>
                            <tr>
                                <th width=50%>Type of trip</th>
                                <td width=50% class="text-right">{{ $items->type }}</td>
                            </tr>
                            <tr>
                                <th width=50%>Price</th>
                                <td width=50% class="text-right">${{ $items->price }}/Person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @guest
                            <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2"> 
                                Login or Register
                            </a>
                        @endguest
                        @auth
                            <form action="{{ route('checkout_process', $items->id) }}" method="post">
                                @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                    Join Now
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addOn-script')
<script src="frontend/libraries/xzoom/xzoom.min.js"></script>
<script>
    $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 250,
            zoomHeight: 250,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });
</script>
@endpush