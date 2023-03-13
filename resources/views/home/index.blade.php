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
        <title>Poll Game</title>
    </head>
    <body>
        <section id="one-body">
            <div class="container">
                <div id="one-panel">
                    <div class="row mb-2">
                        <div class="col-12  star-empty">
                        </div>
                    </div>
                </div>
                <!-- one-panel -->
            </div>
        </section>
        <footer id="landing-page-footer">
            <section id="point-button">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="index.html">
                                        <div class="cercel-btn active"></div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="landing1.html">
                                        <div class="cercel-btn"></div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="landing2.html">
                                        <div class="cercel-btn"></div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="final.html">
                                        <div class="cercel-btn"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
            <!-- point-button -->
            <section id="one-button">
                <div class="container">
                    <div class="row row-cols-3 row-cols-sm-3 justify-content-center my-2">
                        <div class="col-6">
                            <div class="fixed-btn">
                                <a href="landing1.html" class="get-strart-btn">
                                    Get Strated <img src="{{asset('web/images/right-arrow-btn.png')}}" class="arrow-img img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="skip-fixed-btn">
                                <a href="home.html" class="skip-btn">
                                    Skip
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js">
        </script>
    </body>
</html>
