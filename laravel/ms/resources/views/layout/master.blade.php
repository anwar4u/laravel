<!DOCTYPE html>
<html>
    <meta charset="UTF-8"/>
<title>MS Enterprise</title>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script-->

<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@stack('css')
<body>
    @include("layout/ActionMessageModal");

    <div class="container">
        <div>
            @include("layout/header")
        </div>     
        <div>
            @include("layout/menu")
            
        </div>           
        @yield('content')

        <div>
            @include("layout/footer")
        </div>
    </div>

</body>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@stack('js')
</html>