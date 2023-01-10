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
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css"/>
</head>
<body>

<x-template.navuser/>

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
                    <img class="card-img-top" src="{{'https://agenda.cultura.gencat.cat/'.explode(",", $event->imatges)[0]}}" alt="Card image cap">
                    <div class="card-body" style="display: flex; flex-direction: column !important;">
                      <h5 class="card-title">{{$event->denominaci}}</h5>
                      <p class="card-text mb-2">{{ Str::limit($event->descripcio, 75) }}</p>
                      <a class="btn btn-primary" style="margin-top: auto; width: 7rem; !important;" href="{{$event->id}}">Ver más</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
</body>
</html>
