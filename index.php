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
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '392997047555324',
            xfbml      : true,
            version    : 'v2.3'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
        function onLogin(response) {
            if (response.status == 'connected') {
                FB.api('/me?fields=first_name', function(data) {
                    var welcomeBlock = document.getElementById('fb-welcome');
                    welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
                });
            }
        }

        FB.getLoginStatus(function(response) {
            // Check login status on load, and if the user is
            // already logged in, go directly to the welcome message.
            if (response.status == 'connected') {
                console.log('conn');
                onLogin(response);
            } else {
                // Otherwise, show Login dialog first.
                console.log("nem conn");
                FB.login(function(response) {
                    onLogin(response);
                }, {scope: 'user_friends, email'});
            }
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<h1>Yo mon Facebook fo' da chills</h1>
<h1 id="fb-welcome"></h1>



</body>
</html>
