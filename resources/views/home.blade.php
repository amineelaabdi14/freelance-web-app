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
    <div id="LoginformContainer" class="">
        <img src="images/logo.png" alt="Freelancer.ma" class="mt-4 logoContainer">
        <form action="includes/script.php" class="form d-flex flex-column " method="POST">
            
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
    
</body>
</html>