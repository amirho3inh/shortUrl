<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/index2.css">
    <script src='assets/js/jquery-3.5.1.min.js'></script>
</head>
<body>
<div class="header">
{{--https://codepen.io/goodkatz/pen/LYPGxQz--}}
    <!--Content before waves-->
    <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        {{--<svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"--}}
             {{--xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">--}}
{{--<path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283"/>--}}
            {{--<g>--}}
                {{--<path fill="#fff"--}}
                      {{--d="M250.4,0.8C112.7,0.8,1,112.4,1,250.2c0,137.7,111.7,249.4,249.4,249.4c137.7,0,249.4-111.7,249.4-249.4--}}
{{--C499.8,112.4,388.1,0.8,250.4,0.8z M383.8,326.3c-62,0-101.4-14.1-117.6-46.3c-17.1-34.1-2.3-75.4,13.2-104.1--}}
{{--c-22.4,3-38.4,9.2-47.8,18.3c-11.2,10.9-13.6,26.7-16.3,45c-3.1,20.8-6.6,44.4-25.3,62.4c-19.8,19.1-51.6,26.9-100.2,24.6l1.8-39.7		c35.9,1.6,59.7-2.9,70.8-13.6c8.9-8.6,11.1-22.9,13.5-39.6c6.3-42,14.8-99.4,141.4-99.4h41L333,166c-12.6,16-45.4,68.2-31.2,96.2	c9.2,18.3,41.5,25.6,91.2,24.2l1.1,39.8C390.5,326.2,387.1,326.3,383.8,326.3z"/>--}}
            {{--</g>--}}
{{--</svg>--}}
        {{--<h1>Simple CSS Waves</h1>--}}

        <div>
            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" style="width: 100%">
        </div>
        <div>
            <input type="text" id="url" placeholder="آدرس لینک را وارد نمایید">
        </div>
        <div>
            <a onclick="small()" class="sendBtn">کوتاه کن</a>
        </div>
        <div>
            <div class="message" id="message"></div>
        </div>
    </div>

    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"/>
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"/>
            </g>
        </svg>
    </div>
    <!--Waves end-->

</div>
<!--Header ends-->

<!--Content starts-->
<div class="content flex">
    <p>Daniel Österman | 2019 | Free to use</p>
</div>
<!--Content ends-->


<script>
    var baseUrl = 'http://localhost/shortUrl/public/';
    var url = baseUrl+'api/';
    function small() {
        var domain = $('#url').val();
        console.log(domain);
        if(domain==''){
            console.log('em');
            return false;
        }
        var settings = {
            'url': url+'newUrl',
            'method': 'POST',
            'timeout': 0,
            'data': {domain:domain}
        };

        $.ajax(settings).done(function (response) {
            if(!response.error){
                if(response.message == 'INSERTED'){
                    $('#message').html(baseUrl+response.data.code);
                }
            }
        });
    }

    $(function () {
        $('#particles-js').hide();
        setTimeout(function () {
            particlesJS.load('particles-js', 'assets/js/particlesConfig.json', function() {
                // console.log('callback - particles.js config loaded');
            });
            $('#particles-js').fadeIn(2000);
        }, 3500)
    })
</script>
</body>
</html>