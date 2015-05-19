<?php

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Yo mon Facebook fo' da chills</title>
</head>
<body>
<script>

    function statusChangeCallback(response){
        // Check login status on load, and if the user is
        // already logged in, go directly to the welcome message.
        console.log('StatusChangeCallback: '+response);
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
        FB.getLoginStatus(function(response)){
            statusChangeCallback(response);
        }
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '392997047555324',
            xfbml      : true,
            version    : 'v2.3'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
        /*function onLogin(response) {
            if (response.status == 'connected') {
                FB.api('/me?fields=first_name', function(data) {
                    console.log(data);
                    var welcomeBlock = document.getElementById('fb-welcome');
                    welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
                    testAPI();
                });
            }
        }*/

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
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }
</script>

<h1>Yo mon Facebook fo' da chills</h1>
<h1 id="fb-welcome"></h1>

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<div id="status">
</div>

</body>
</html>
