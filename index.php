<?php

?>
<!DOCTYPE html>
<html xmlns:fb="">
<head lang="en">
    <meta charset="UTF-8">
    <title>Yo mon Facebook fo' da chills</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-social.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body id="fb-root">
<script>

    function statusChangeCallback(response) {
        // Check login status on load, and if the user is
        // already logged in, go directly to the welcome message.
        if (response.status === 'connected') {
            console.log('logged in');
            //testAPI();
        } else if (response.status === 'not_authorized') {
            // Otherwise, show Login dialog first.
            console.log("facebook-login: true, app-login: false");
            /*FB.login(function(response) {
             onLogin(response);
             }, {scope: 'user_friends, email'});*/
            document.getElementById('status').innerHTML = 'Please log into the app.';
        } else {
            console.log('not logged into facebook, unsure about the app');
            document.getElementById('status').innerHTML = 'Please log into facebook';
        }
    }

    function checkLoginState() {
        console.log('checking');
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function () {
        FB.init({
            appId: '392997047555324',
            xfbml: true,
            version: 'v2.3'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    /*function testAPI() {
     console.log('Welcome!  Fetching your information.... ');
     FB.api('/me', function(response) {
     console.log(response);
     console.log('Successful login for: ' + response.name);
     document.getElementById('status').innerHTML =
     'Thanks for logging in, ' + response.name + '!\r\n';

     var msg1 = 'First name: '+response.first_name + 'Last Name: '+response.last_name;
     var msg2 = 'gender: '+response.gender +', and was born on:'+
     response.user_birthday;
     $('#status').html(msg1+'\r\n'+msg2);
     });
     }*/
</script>


<!--<fb:login-button scope="public_profile,email,user_friends,user_birthday" 
                 onlogin="checkLoginState();">
</fb:login-button>-->
<main>

    <section class="well well-lg loginsection">
        <a class="btn btn-lg btn-block btn-social btn-facebook" style="width: 270px;">
            <i class="fa fa-facebook"></i> Sign in with Facebook
        </a>
        <a class="btn btn-lg btn-block btn-social btn-google" style="width: 270px;">
            <i class="fa fa-google"></i> Sign in with Google
        </a>
        <a class="btn btn-lg btn-block btn-social btn-twitter" style="width: 270px;">
            <i class="fa fa-twitter"></i> Sign in with Twitter
        </a>
    </section>
    <div class="status"></div>

    <section class="logged" style="height: 600px; width: 800px">
    </section>
</main>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    function sucessfulLogin(response) {
        $('.loginsection').fadeOut();
        $('body').css({
            'background-image': 'none'
        });
        $('.logged').css({
            'background': 'url(css/img/bb.png) no-repeat',
            'background-size': 'cover'
        });
        var msg1 = 'We know EVERYTHING about You! <br />First name: ' + response.first_name + ' Last Name: ' + response.last_name;
        var msg2 = 'Gender: ' + response.gender + ', and was born on:' + response.birthday;
        var newTitle = '<h2 class="loggedin" style="color: black; font-size: 30px; font-weight: bold;width: 800px">' + msg1 + '<br />' + msg2 + '</h2>';
        $('.status').html(newTitle);
    }

    $(document).ready(function () {
        $('a.btn-facebook').on('click', function () {
            FB.login(function (response) {
                if (response.authResponse) {
                    FB.api('/me', function (response) {
                        sucessfulLogin(response);
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: 'public_profile,email,user_friends,user_birthday'});
        });
    })
</script>
</body>
</html>
