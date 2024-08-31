<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="site-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap4.0.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('title')</title>
    <style>
        .page-link{
            color: #28A745;
        }
        .page-item.active .page-link{
            background-color: #28A745;
            border-color: #28A745;
        }
    </style>
</head>
<body style="background-color: rgb(247,247,247);">
    <div id="wrapper">
        <header class="bg-info p-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-white">Laravel CRUD Operation with AJAX</h1>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer class="bg-info text-white p-2 py-3 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span>Copyright © @php echo date('Y'); @endphp | <a href="https://github.com/GouravKumarPandit" class="text-white" target="_blank">GouravKumarPandit</a></span>
                        &nbsp;&nbsp; <a target="_blank" href=""><img src="{{asset('images/instagram.png')}}" style="width: 25px; height: 25px;" alt="Instagram"></a> &nbsp;&nbsp; 
                        <a target="_blank" href="https://www.linkedin.com/in/gourav-kumar-pandit-533334218/"><img src="{{asset('images/linkedin.png')}}" style="width: 25px; height: 25px;" alt="Linkedin"></a> &nbsp;&nbsp;                
                        <a target="_blank" href="https://github.com/GouravKumarPandit"><img src="{{asset('images/github.png')}}" style="width: 25px; height: 25px;" alt="Github"></a> &nbsp;&nbsp;
                        <a target="_blank" href="https://www.youtube.com/@laptopAurCode27"><img src="{{asset('images/youtube.png')}}" style="width: 25px; height: 25px;" alt="You Tube"></a> &nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/main_ajax.js')}}"></script>
</body>
</html>