<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- iconify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('head')
    <title>Poll Game</title>
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('js')
    <script>
       $(function(){
            var is_msg = "{{ Session::has('message') }}" == 1 ? true : false;
            if(is_msg){
                var message = "{{ Session::get('message') }}";
                var session_class = "{{ Session::get('class') }}" == 'success' ? 'success' : 'error';
                Toast.fire({
                    icon: session_class,
                    title: message
                });
            }
       });
    </script>
</body>

</html>
