@extends('frontend.layout')

@section('content')
    <!-- Service Start -->
    @include('frontend.parties.services')
    <!-- Service End -->

    <!-- About Start -->
    @include('frontend.parties.about')
    <!-- About End -->

    <!-- Menu Start -->
    @include('frontend.parties.menu')
    <!-- Menu End -->

    <!-- Reservation Start -->
    @include('frontend.parties.reservation')
    <!-- Reservation Start -->

    <!-- Team Start -->
    @include('frontend.parties.team')
    <!-- Team End -->

    <!-- Testimonial Start -->
    @include('frontend.parties.temoignage')
    <!-- Testimonial End -->
@endsection
