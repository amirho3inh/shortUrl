<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/index.css">
    <script src='assets/js/jquery-3.5.1.min.js'></script>
</head>
<body>
<div class="splash">
    <div class="splash_logo">
        TST
    </div>
    <div class="splash_svg">
        <svg width="100%" height="100%">
            <rect width="100%" height="100%">
        </svg>
    </div>
    <div class="splash_minimize">
        <svg width="100%" height="100%">
            <rect width="100%" height="100%">
        </svg>
    </div>
</div>
<div class="text">
    <div>
        <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" style="width: 100%">
    </div>
    <div>
        <input type="text" id="url" placeholder="آدرس لینک را وارد نمایید">
    </div>
    <div>
        <a onclick="small()">کوتاه کن</a>
    </div>
    <div>
        <div class="message" id="message"></div>
    </div>
</div>

<script>
    var url = 'http://localhost/shortUrl/public/';
    function small() {
        var domain = $('#url').val();
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
                    $('#message').html(url+response.data.code);
                }
            }
        });
    }
</script>

</body>
</html>