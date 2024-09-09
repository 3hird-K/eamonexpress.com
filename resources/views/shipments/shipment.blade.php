@extends('layouts.layout')
@section('title', 'Eamon Express | Home')
@section('css_content', 'css/style.css')

@section('content')

<div class="container">
    <h1>Shipping Rates</h1>

    @if(isset($rates['rateReplyDetails']) && !empty($rates['rateReplyDetails']))
        <ul>
            @foreach($rates['rateReplyDetails'] as $rateDetail)
                <li>
                    {{ $rateDetail['serviceType'] }}:
                    ${{ $rateDetail['rate']['amount'] }}
                    ({{ $rateDetail['transitTime'] }} transit)
                </li>
            @endforeach
        </ul>
    @else
        <p class="alert alert-danger">No rates available.</p>
    @endif

</div>

@endsection

@section('js_content', 'js/register_animate.js')
