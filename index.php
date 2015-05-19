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

</body>
</html>
