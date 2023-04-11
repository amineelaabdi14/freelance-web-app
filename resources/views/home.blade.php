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
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-around w-100">
        <div id="first-container">
            <h2 id="whoAreWe">Who are we ?</h2>    
            <p id="whoAreWeText" class="pb-5 pb-lg-0">Freelancer.ma is a pioneering freelancing platform in Morocco that connects businesses and individuals with talented freelancers for a wide range of projects and services. With a focus on quality, affordability, and convenience, Freelancer.ma is dedicated to providing a seamless and secure platform for both freelancers and clients to collaborate and achieve their goals. Whether you're looking for web design, content creation, translation, or any other freelance service, Freelancer.ma has a diverse pool of skilled professionals ready to meet your needs. Join the Freelancer.ma community today and discover the limitless potential of freelancing!</p>
        </div>
        <div id="LoginformContainer" class="">
            <img src="images/logo.png" alt="Freelancer.ma" class="mt-4 logoContainer">
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
</body>
</html>