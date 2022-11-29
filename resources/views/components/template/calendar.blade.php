@vite(['resources/css/template/calendar.css','resources/js/template/calendar.js']);

<style>
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
                    <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">{{$event->denominaci}}</a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>{{$event->data_inici}} | {{$event->data_fi}}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">{{$event->descripcio}}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{$event->adre_a}}</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>{{$event->comarca_i_municipi}}</li>
                        <li class="tag__item play blue">
                            <a href="#"><i class="fas fa-play mr-2"></i>{{$event->espai}}</a>
                        </li>
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</section>
