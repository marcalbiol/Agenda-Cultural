<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Lato (Font) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css"/>

    <!--css-->
    @vite(['resources/css/template/show.css']);

</head>
<body>

<nav
    class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex-nowrap items-center mx-auto">
        <a href="http://quefer.cat/" class="flex items-center" style="float: left">
            <img src="{{ asset('assets/img/logo.jpeg') }}" class="h-6 mr-3 sm:h-9" alt="QueFer Logo"
                 style="width: 170px; height: 70px">
            <span class="self-center text-xl font-bold whitespace-nowrap dark:text-white"
                  style="color: black !important;">QueFer</span>
        </a>
        <div style="float: right; margin-top: 10px; margin-right: 50px">
            <a href="http://instagram.com">
                <img src="{{ asset('assets/img/instagram.png') }}" alt="Instagram" style="height: 50px; float: right">
            </a>

            <a href="http://facebook.com">
                <img src="{{ asset('assets/img/facebook.png') }}" alt="Facebook" style="height: 50px; float: right">
            </a>
            <a href="http://twitter.com">
                <img src="{{ asset('assets/img/twitter.png') }}" alt="Twitter" style="height: 50px; float: right">
            </a>
        </div>
    </div>
</nav>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="postcard__img"
                                       src="{{'https://agenda.cultura.gencat.cat/'.explode(",", $event->imatges)[0]}}"
                                       alt="Image Title"/>
            </div>
            <div class="col-md-6">
                <div class="small mb-1">{{$event->codi}}</div>
                <h1 class="display-5 fw-bolder">{{$event->denominaci}}</h1>
                <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2">Data: </i>
                    {{date('d-m-Y', strtotime($event->data_inici))}} | {{date('d-m-Y', strtotime($event->data_fi))}}
                </time>
                <span>Horari: {{$event->horari}}</span>
                <div class="fs-5 mb-5">
                    <span>{{$event->entrades}}</span>
                </div>
                <p class="lead">{{ Str::limit($event->descripcio, 350) }}</p>
            </div>
            <div class="carrousel d-flex justify-content-around" style="margin-top: 7rem">
                @foreach ($eventsList as $event)
                    <div class="card" style="width: 19rem;">
                        <img class="card-img-top"
                             src="{{'https://agenda.cultura.gencat.cat/'.explode(",", $event->imatges)[0]}}"
                             alt="Card image cap">
                        <div class="card-body" style="display: flex; flex-direction: column !important;">
                            <h5 class="card-title">{{$event->denominaci}}</h5>
                            <p class="card-text mb-2">{{ Str::limit($event->descripcio, 75) }}</p>
                            <a class="btn btn-primary" style="margin-top: auto; width: 7rem; !important;"
                               href="{{$event->id}}">Ver más</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<x-template.footer/>
</body>
</html>
