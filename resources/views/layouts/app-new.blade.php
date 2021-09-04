<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Job Finder &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('jobfinder/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('jobfinder/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('jobfinder/css/animate.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="{{asset('jobfinder/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('jobfinder/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('jobfinder/css/style.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    @yield('css')
</head>
<body>

<div class="site-wrap" id="app">
    @include('partials.header')
    <div class="container my-3">
        @yield('content')
    </div>
    @include('partials.footer')
    @guest
        <login-form></login-form>

    @endguest
</div>

<script src="{{asset('jobfinder/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('jobfinder/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('jobfinder/js/jquery-ui.js')}}"></script>
<script src="{{asset('jobfinder/js/popper.min.js')}}"></script>
{{--<script src="{{asset('jobfinder/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('jobfinder/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('jobfinder/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('jobfinder/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('jobfinder/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('jobfinder/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('jobfinder/js/aos.js')}}"></script>


<script src="{{asset('jobfinder/js/mediaelement-and-player.min.js')}}"></script>

<script src="{{asset('jobfinder/js/main.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

        for (var i = 0; i < total; i++) {
            new MediaElementPlayer(mediaElements[i], {
                pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                shimScriptAccess: 'always',
                success: function () {
                    var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                    for (var j = 0; j < targetTotal; j++) {
                        target[j].style.visibility = 'visible';
                    }
                }
            });
        }
    });
</script>


<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    @if(session('isShowLoginForm'))
    $('#login').modal('show')
    @endif
</script>

{{--<script--}}
{{--    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"--}}
{{--    async defer></script>--}}
<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1-8dKOXbekVnsiPHzpMvCHVUqwiHNpkI&libraries=places&callback=initAutocomplete">
</script>
</html>

@yield('js')

</body>
</html>
