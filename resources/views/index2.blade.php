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
        <div class="boxInput">
            <div>
                {{--<img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" style="width: 50%">--}}
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;width: 30%" xml:space="preserve">
<path style="fill:#FDBD40;" d="M251.72,144c-5.718-9.903-16.285-16.003-27.72-16H64c-17.673,0-32,14.327-32,32v64
	c0,17.673,14.327,32,32,32h160c11.435,0.003,22.002-6.097,27.72-16h34.256c-7.332,28.237-32.803,47.964-61.976,48H64
	c-35.33-0.04-63.96-28.67-64-64v-64c0.04-35.33,28.67-63.96,64-64h160c29.173,0.036,54.644,19.763,61.976,48H251.72z"/>
                    <path style="fill:#5F79BA;" d="M212.28,320c5.718,9.903,16.285,16.003,27.72,16h160c17.673,0,32-14.327,32-32v-64
	c0-17.673-14.327-32-32-32H240c-11.435-0.003-22.002,6.097-27.72,16h-34.256c7.332-28.237,32.803-47.964,61.976-48h160
	c35.346,0,64,28.654,64,64v64c0,35.346-28.654,64-64,64H240c-29.173-0.036-54.644-19.763-61.976-48H212.28z"/>
                    <g>
                        <path style="fill:#FCF05A;" d="M64,232c-4.418,0-8-3.582-8-8v-64c0-4.418,3.582-8,8-8h64c4.418,0,8,3.582,8,8s-3.582,8-8,8H72v56
		C72,228.418,68.418,232,64,232z"/>
                        <path style="fill:#FCF05A;" d="M400,312h-64c-4.418,0-8-3.582-8-8s3.582-8,8-8h56v-56c0-4.418,3.582-8,8-8s8,3.582,8,8v64
		C408,308.418,404.418,312,400,312z"/>
                        <path style="fill:#FCF05A;" d="M328,88h16v16h-16V88z"/>
                        <path style="fill:#FCF05A;" d="M328,120h16v16h-16V120z"/>
                        <path style="fill:#FCF05A;" d="M312,104h16v16h-16V104z"/>
                        <path style="fill:#FCF05A;" d="M344,104h16v16h-16V104z"/>
                        <path style="fill:#FCF05A;" d="M104,328h16v16h-16V328z"/>
                        <path style="fill:#FCF05A;" d="M104,360h16v16h-16V360z"/>
                        <path style="fill:#FCF05A;" d="M88,344h16v16H88V344z"/>
                        <path style="fill:#FCF05A;" d="M120,344h16v16h-16V344z"/>
                    </g>
                </svg>

            </div>
            <div class="boxBtn">
                <select id="protocol">
                    <option value="http://">http</option>
                    <option value="https://">https</option>
                </select>
                <input type="text" id="url" placeholder="آدرس لینک را وارد نمایید">
            </div>
            <div>
                <a onclick="small()" class="sendBtn">کوتاه کن</a>
            </div>
            <div>
                <div class="message" id="message"></div>
            </div>
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
    <p>Daniel Österman | 2020 | URL Shortener</p>
</div>
<!--Content ends-->


<script>
    var baseUrl = 'http://localhost/shortUrl/public/';
    var url = baseUrl+'api/';
    function small() {
        $('#message').html('');
        $('#message').hide();
        var domain = $('#url').val();
        var protocol = $('#protocol').val();
        domain = domain.replace("http://", "");
        domain = domain.replace("https://", "");
        domain = protocol+domain;
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
                    $('#message').fadeIn();
                    $('#message').html(baseUrl+response.data.code);
                }
            }
        });
    }

    $(function () {

    })
</script>
</body>
</html>