<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/main.js') }}">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body id="loginContent">

    <x-navbar />

    <div class="d-flex flex-column-reverse flex-lg-row align-items-center justify-content-lg-around w-100 mt-5">

        <div id="first-container">
            <img src="images/landing.png" id="landing-logo" alt="Freelancer.ma" class="mt-4">
        </div>

        <div id="LoginformContainer" class=" mt-5 mt-lg-0">
            <img src="images/logo.png" alt="service.ma" class="mt-4 logoContainer">
            <form id="auth-form" action="{{route('login')}}" class="form d-flex flex-column " method="POST">
                @csrf
                <div id="emailFormContainer">
                    <label for="email" class="MyLabels">EMAIL</label><br>
                    <input type="email" name="email"  class="MyInputs" oninput="validateEmail()" autocomplete="off">
                    <div id="emailError" class="text-danger"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="MyLabels">PASSWORD</label><br>
                    <input type="password" name="password" class="MyInputs">
                    <div id="comfirEmailError" class="text-danger mb-0 "></div>
                </div>
                <div id="fullName"></div>
                <div class="d-flex justify-content-between align-items-center mt-3" style="">
                    <span><a href="#" onclick="createAccount()">Create an account</a></span>
                    <button type="submit"  name="signMeIn" disabled>Sign In</button>
                </div>
            </form>
        </div>

    </div>

    <h2 id="whoAreWe" class="text-center mt-5">About us</h2>    
            <p id="whoAreWeText" class="pb-5 pb-lg-0 m-auto ">Welcome to Service.ma, your go-to platform for finding and offering services in Morocco. Our platform was built with the aim of simplifying the process of connecting service providers with service seekers. Whether you're looking for a plumber, an electrician, or a tutor, we've got you covered. Our user-friendly interface allows you to browse through a range of services, read reviews from previous customers, and select the service provider that best suits your needs. At Service.ma, we are dedicated to providing our customers with reliable, high-quality services, and we pride ourselves on our commitment to exceptional customer service. Thank you for choosing Service.ma - we're excited to help you find the services you need!</p>
</body>
</html>