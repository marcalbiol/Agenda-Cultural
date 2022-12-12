@vite(['resources/css/template/calendar.css','resources/js/template/calendar.js']);

<style>
    body {
        background-color: rgba(228, 246, 252, 0.38);
    }

    section {
        margin: 5rem 5% 0 5%;
        background-color: transparent !important;
    }
</style>


<section class="light">
    <div class="container py-2">
        @foreach($events as $event)
            <article class="postcard light blue">
                <a class="postcard__img_link" href="#">
                    @if(!@getimagesize($event->imatges))
                        <img class="postcard__img" src="{{'https://agenda.cultura.gencat.cat/'.$event->imatges}}"
                             alt="Image Title"/>
                        @else
                        <img class="postcard__img" src="{{ asset('assets/img/hasbu.png') }}" alt="Image Title"/>
                    @endif
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">{{$event->denominaci}}</a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            {{date('d-m-Y', strtotime($event->data_inici))}}
                            | {{date('d-m-Y', strtotime($event->data_fi))}}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"> {{ Str::limit($event->descripcio, 350) }}</div>
                    <ul class="postcard__tagbox">
                        @if($event->entrades != "")
                            <li class="tag__item">{{$event->entrades}}</li>
                        @endif

                        @if($event->horari != "")
                            <li class="tag__item">{{$event->horari}}</li>
                        @endif

                        @if($event->adre_a != "")
                            <li class="tag__item play blue">
                                <a href="#">{{$event->adre_a}}</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</section>
