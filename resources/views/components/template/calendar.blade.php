@vite(['resources/css/template/calendar.css','resources/js/template/calendar.js']);

<style>
    body {
        background-color: rgba(228, 246, 252, 0.38);
    }

    section {
        background-color: transparent !important;
    }
</style>


<section class="container light p-5">
    @forelse($events as $event)
        <article class="postcard light blue mx-auto">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="{{'https://agenda.cultura.gencat.cat/'.explode(",", $event->imatges)[0]}}" alt="Image Title"/>
            </a>

            <div class="postcard__text t-dark">
                <h1 class="postcard__title blue"><a href="#">{{$event->denominaci}}</a></h1>

                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        {{date('d-m-Y', strtotime($event->data_inici))}} | {{date('d-m-Y', strtotime($event->data_fi))}}
                    </time>
                </div>

                <div class="postcard__bar"></div>

                <div class="postcard__preview-txt">{{ Str::limit($event->descripcio, 350) }}</div>

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
    @empty
        <h2 class="text-dark">No se han encontrado resultados</h2>
    @endforelse
</section>
