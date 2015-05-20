<?php

?>
<!DOCTYPE html>
<html xmlns:fb="">
<head lang="en">
    <meta charset="UTF-8">
    <title>Yo mon Facebook fo' da chills</title>
</head>
<body id="fb-root">
<script>

    function statusChangeCallback(response){
        // Check login status on load, and if the user is
        // already logged in, go directly to the welcome message.
        if (response.status === 'connected') {
            console.log('logged in');
            testAPI();
        } else if (response.status === 'not_authorized') {
            // Otherwise, show Login dialog first.
            console.log("facebook login true, app login false");
            /*FB.login(function(response) {
             onLogin(response);
             }, {scope: 'user_friends, email'});*/
            document.getElementById('status').innerHTML = 'Please log into the app.';
        } else {
            console.log('not logged into facebook, unsure about the app');
            document.getElementById('status').innerHTML = 'Please log into facebook';
        }
    }

    function checkLoginState(){
        console.log("check");
        FB.getLoginStatus(function(response){
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '392997047555324',
            xfbml      : true,
            version    : 'v2.3'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log(response);
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';

            var msg1 = 'First name: '+response.first_name + ' Last Name: '+response.last_name;
            var msg2 = 'gender: '+response.gender + ' has this many friends: '+response.user_friends+' and was born on:'+
                response.birthday;
            console.log(msg1+'\r\n'+msg2);

        });
    }
</script>

<h1>Yo mon Facebook fo' da chills</h1>

<button id="fbloginbtn" scope="public_profile,email,user_friends,user_birthday">Login</button>
<div id="status"></div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(function(){
        $('#fbloginbtn').click(function(e){
            e.preventDefault();
            console.log("click");
            checkLoginState();
        });
    });
</script>
</body>
</html>
