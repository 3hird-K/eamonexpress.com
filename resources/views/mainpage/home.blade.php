@extends('layouts.layout')
@section('title', 'Eamon Express | Home')
@section('css_content', 'css/style.css')

@section('content')

<Section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="contain-head col-lg-6">
                <div class="contain-headings">
                    <h1>Compare and Book</h1>
                    <h2>Low Cost shipping services</h2>
                    <p>Receive your packages swiftly and securely with Eamon Express. Track your shipments and get real-time updates on their location.</p>
                    <a href="#" class="href">Request Service</a>
                </div>
            </div>
            <div class="contain-img col-lg-6 ">
                <img src="img/Banner-image.png" alt="" class="src">
            </div>
        </div>
    </div>
</Section>




<Section class="calculator-area">
    <div class="container">
        <div class="contain-form">
            <h3>Get a quote without signing up</h3>
            <div class="contain-fields">
                <form id="calc-form" action="{{ route('retrieveShipments') }}" method="post">
                    @csrf
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/from.svg" alt="" class="src">
                            <span>from:</span>
                        </div>

                        <select name="fromCountry" class="form-select" id="from_country">
                            @foreach ($countries as $country)
                                <option value="{{ $country->code }}" {{ $country->code === 'US' ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/To.svg" alt="" class="src">
                            <span>To:</span>
                        </div>
                        <select name="toCountry" class="form-select" id="to_country">
                            @foreach ($countries as $country)
                                <option value="{{ $country->code }}" {{ $country->code === 'UK' ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="fields zip">
                        <input type="text" name="zipcodeFrom" class="form-control" placeholder="ZIP Code" required>
                    </div>
                    <div class="fields zip">
                        <input type="text" name="zipcodeTo" class="form-control" placeholder="ZIP Code" required>
                    </div>
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/Parcel-weight.svg" alt="" class="src">
                            <span>Parcel Weight:</span>
                        </div>
                        <input type="number" class="form-control" name="weight" required>
                        <div class="contain-perm contain-icons">
                            <span>LBS</span>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/length.svg" alt="" class="src">
                            <span>Length:</span>
                        </div>
                        <input type="number" class="form-control" name="length" required>
                        <div class="contain-perm contain-icons">
                            <span>IN</span>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/width.svg" alt="" class="src">
                            <span>Width:</span>
                        </div>
                        <input type="number" class="form-control" name="width" required>
                        <div class="contain-perm contain-icons">
                            <span>IN</span>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="contain-icons">
                            <img src="img/height.svg" alt="" class="src">
                            <span>Height:</span>
                        </div>
                        <input type="number" class="form-control" name="height" required>
                        <div class="contain-perm contain-icons">
                            <span>IN</span>
                        </div>
                    </div>
                    <button type="submit">Get quote</button>
                </form>
            </div>
        </div>
    </div>
</Section>

<Section class="About-eamon-area heading-dy">
    <div class="container">
        <div class="row">
            <div class="contain-head col-lg-6">
                <div class="contain-headings">
                    <h2>What is Eamon Express?</h2>
                    <p>Eamon Express is a user-friendly price comparison site for booking shipping services both within the US and internationally.<br></br>

                        Use our smart shipping calculator to get an instant quote, discover discounted rates with leading couriers, and compare prices to find the best deals.</p>
                    <a href="#" class="href">Learn More</a>
                </div>
            </div>
            <div class="contain-img col-lg-6 ">
                <img src="img/about-aemon.png" alt="" class="src">
            </div>
        </div>
    </div>
</Section>
<section class="howitwork heading-dy">
    <div class="container">
        <h2>How does Eamon Express work?</h2>
        <div class="contain-instructions">
            <div class="contain-inst">
                <img src="img/inst1.png" alt="" class="src">
                <p>Let us know where you're sending your package from and its destination.</p>
            </div>
            <div class="contain-inst">
                <img src="img/inst2.png" alt="" class="src">
                <p>Indicate the weight and dimensions of your package so we can find the best deals for you.</p>
            </div>
            <div class="contain-inst">
                <img src="img/inst3.png" alt="" class="src">
                <p>Select the courier that suits your needs and pay for your shipping online.</p>
            </div>
            <div class="contain-inst">
                <img src="img/inst4.png" alt="" class="src">
                <p>Attach your shipping label and either drop off your package or arrange for it to be picked up.</p>
            </div>
        </div>
    </div>
</section>
<Section class="Update-sec heading-dy">
    <div class="container">
        <div class="row">
            <div class="contain-img col-lg-6 ">
                <img src="img/update-banner.png" alt="" class="src">
            </div>
            <div class="contain-head col-lg-6">
                <div class="contain-headings">
                    <h2>Stay Updated With Our Latest News</h2>
                    <p>Receive our latest updates, news, blog posts, and more directly in your inbox. Subscribe to our mailing list today.</p>
                    <div class="contain-update-frm">
                        <form action="" method="post" id="updatefrm">
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</Section>


{{-- suppose new style --}}

{{-- <section id="landing" class="section-landing d-flex justify-content-center align-items-center flex-column animate__animated animate__fadeInDown" style="height: 100vh;  background-color: #b0e1f9;">
    <div class="container" >
        <div class="row align-content-end" style=" min-height: 100vh;">
            <!-- Text Section -->
            <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start d-flex flex-column justify-content-center">
                <h1 class="mb-3 display-4">Compare and Book</h1>
                <h2 class="fw-bold mb-4">Low-Cost Shipping Service</h2>
            </div>

            <!-- Image Section -->
            <div class="col-lg-6 d-flex justify-content-center align-self-end">
                <img src="img/Banner-image.png" alt="Shipping Service" class="img-fluid" style="max-height: 450px;">
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <form id="quoteForm" action="{{ route('retrieveCountries') }}" method="post" class="w-100">
        @csrf
        <div class="quote-container animate__animated animate__fadeInUp bg-light p-4 rounded shadow">
            <h5 class="text-center mb-4">Get a Quote Without Signing Up</h5>

            <div class="row g-3">
                <!-- From Section -->
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <img src="img/site/location.png" width="25px" height="25px" alt="Location Icon">
                            <span class="ms-2">From</span>
                        </span>
                        <select required name="from" id="from_country" class="form-select">
                            @foreach ($countries as $code => $country)
                                <option value="{{ $code }}" {{ $code === 'US' ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <input required type="text" name="fromcitycode" id="from_zip" class="form-control" placeholder="Zip Code">
                </div>

                <!-- To Section -->
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <img src="img/site/location.png" width="25px" height="25px" alt="Location Icon">
                            <span class="ms-2">To</span>
                        </span>
                        <select name="to" class="form-select" id="to_country">
                            @foreach ($countries as $code => $country)
                                <option value="{{ $code }}" {{ $code === 'IQ' ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <input required type="text" value="00000" name="tocitycode" id="to_zip" class="form-control" placeholder="Zip Code">
                </div>

                <!-- Parcel Details -->
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <img src="img/site/weight.png" width="25px" height="25px" alt="Weight Icon">
                        </span>
                        <input type="number" required name="weight" class="form-control" placeholder="Parcel Weight (lbs)" min="0">
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="number" required name="length" class="form-control" placeholder="Length (in)" min="0">
                </div>
                <div class="col-md-6">
                    <input type="number" required name="width" class="form-control" placeholder="Width (in)" min="0">
                </div>
                <div class="col-md-6">
                    <input type="number" required name="height" class="form-control" placeholder="Height (in)" min="0">
                </div>
            </div>

            <!-- Get Quote Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg px-5 py-2">Get Quote</button>
            </div>

            <!-- Customer Feedback -->
            <div class="text-center mt-5">
                <h6>Our customers say <strong>GREAT</strong> <img src="img/site/rate.png" height="20px"> <strong>3.9</strong> out of 5 based on <strong>2154</strong> reviews</h6>
            </div>
        </div>
    </form>
</section> --}}

@endsection
@section('js_content', 'js/register_animate.js')
