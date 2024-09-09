@extends('layouts.layout')
@section('title', 'Eamon Express | Home')
@section('css_content', 'css/style.css')

@section('content')

<div class="container">
    <h1>Shipment Tracking Result</h1>

    @if (isset($trackingResult['error']))
        <div class="alert alert-danger">{{ $trackingResult['error'] }}</div>
    @else
        <!-- Show tracking details -->
        <p>Tracking Number: {{ $trackingResult['tracking_number'] }}</p>
        <p>Status: {{ $trackingResult['status'] }}</p>
        <p>Estimated Delivery: {{ $trackingResult['estimated_delivery'] }}</p>
    @endif
</div>

@endsection
@section('js_content', 'js/register_animate.js')
