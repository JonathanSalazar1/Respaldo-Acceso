<html>

<head>
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <link href="{{ asset('libraries/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">

    <script src="{{ asset('libraries/sweetalert/sweetalert2.js') }}"></script>
    <link href="{{ asset('libraries/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function() {
            var blink_interval = setInterval(switch_title_properties, 1000);

            function switch_title_properties() {

                if (blink) {
                    $("#blink").removeClass().addClass("luz_on");
                } else {
                    $("#blink").removeClass().addClass("luz");
                }

                blink = !blink;

            }

        });

        
        
    </script>
</head>

<body>

    <div class="header">
        <div id="silverfox" class="div_marquee">
            <h2 class="h4_marquee">
                <marquee>
                    <img src="{{asset('images/rino.png')}}" class="img-fluid" width="50px" height="50px">
                    CONTROL DE ACCESO FUERZA CIVIL
                    <img src="{{asset('images/fc_logo.png')}}" class="img-fluid" width="50px" height="50px" >
                </marquee>
            </h2>
        </div>


        <div class="panel-heading div_title">
            <div class="row">
                <div class="col-2 col-sm-2 col-md-1 d-flex align-items-center">
                    <img src="{{asset('images/2.jpeg')}}" class="img_fc_logo" alt="fc_logo">
                        
                </div>
                <div class="col-8 col-sm-8 col-md-10 d-flex align-items-center">
                    <h4 class="luz" id="blink">INSTITUCION POLICIAL ESTATAL FUERZA CIVIL</h4>
                </div>
                <div class="col-2 col-sm-2 col-md-1 d-flex align-items-center">
                    <img src="{{asset('images/3.jpg')}}" class="img_fc_logo" alt="rino">
                </div>
            </div>
        </div>
    </div>