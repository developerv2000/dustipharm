@extends('layouts.app', ['pageClass' => 'home-page'])

@section('main')
{{-- Banner --}}
<section class="banner">
  <div class="banner__inner main-container">
    <div class="banner__txt">
      <h1 class="banner__title">Ваше здоровье <br>– наша обязанность</h1>
      <p class="banner__body">Ваше здоровье для нас самое важное, поэтому мы ежедневно работаем над улучшением всех звеньев нашей работы, начиная с поиска новых, более
        инновационных лекарственных средств, заканчивая вопросами логистики.</p>
      <a class="banner__button button button--main" href="{{ route('services.index') }}">
        Наши услуги <span class="material-icons">chevron_right</span>
      </a>
    </div>
  </div>
</section>
{{-- Banner end --}}

{{-- About --}}
<section class="home-about">
  <div class="home-about__inner main-container">
    <h2 class="home-about__title main-title">О компании</h2>
    <p class="home-about__desc">
      С 1996 года компания «Дусти Фарма» начала свою фармацевтическую деятельность на территории Республики Таджикистан. Мы занимаемся дистрибьюцией импортных лекарственных
      средств, последовательно расширяя свою сеть оптовых и розничных аптек, а также распространяя лекарственные препараты через другие аптеки страны.
    </p>

    <img class="home-about__foot-image" src="{{ asset('img/home/about.png') }}" alt="pharmacy">

    <div class="home-about__foot">
      <p class="home-about__foot-desc">
        Основной задачей нашей компании является решение <br>актуальных проблем медицины и здравоохранения <br>Таджикистана путем предоставление безопасных, эффективных<br> и
        инновационных лекарственных средств и других<br> товаров медицинского назначения.
      </p>

      <a class="button button--main home-about__button" href="{{ route('about.index') }}">
        Подробнее <span class="material-icons">chevron_right</span>
      </a>
    </div>
  </div>
</section>
{{-- About end --}}

{{-- Services --}}
<section class="home-services">
  <div class="home-services__inner main-container">
    <h2 class="home-services__title main-title">Наши услуги</h2>

    <div class="read-more">
      <p class="read-more__desc">Перечень наших услуг отражает заинтересованность компании в том, чтобы клиенты и партнеры получали максимально широкий ассортимент товаров в
        требуемые сроки и по приемлемой цене.</p>

      <a class="read-more__link button button--transparent" href="{{ route('services.index') }}">
        Все услуги <span class="material-icons">chevron_right</span>
      </a>
    </div>

    <div class="home-services-list services-list">
      @foreach ($services as $service)
      <div class="main-card services-card">
        <div class="main-card__image-container">
          <img src="{{ asset('img/services/' . $service->image) }}" alt="{{ $service->title }}">
          <span class="main-card__counter">{{ $loop->index + 1 }}</span>
        </div>

        <h3 class="main-card__title">{!! $service->title !!}</h3>
        <p class="main-card__body">{{ $service->body }}</p>
      </div>
      @endforeach
    </div>

    <div class="home-services__secondary-cards">
      <div class="secondary-card">
        <img class="secondary-card__image" src="{{ asset('img/home/feedback.png') }}" alt="feedback">
        <h3 class="secondary-card__title">Обратная связь</h3>
        <p class="secondary-card__desc">
          Если Вы заинтересованы в сотрудничестве с нами, свяжитесь с отделом продаж. Наш специалист по работе с клиентами ответит на все Ваши вопросы, и договорится о личной
          встрече для заключения договора в удобное для Вас время.
        </p>

        <a class="button button--main secondary-card__button" href="{{ route('contacts.index') }}">
          Подробнее <span class="material-icons">chevron_right</span>
        </a>
      </div>

      <div class="secondary-card">
        <img class="secondary-card__image" src="{{ asset('img/home/express.png') }}" alt="express">
        <h3 class="secondary-card__title">Express Pharm</h3>
        <p class="secondary-card__desc">
          Логистическая структура нашей компании называется «Express Pharm» – этото современный складской комплекс, соответствующий всем нормам хранения и транспортировки
          лекарственных средств с автоматизированной системой доставки препаратов.
        </p>

        <a class="button button--main secondary-card__button" href="{{ route('express-pharm.index') }}">
          Подробнее <span class="material-icons">chevron_right</span>
        </a>
      </div>
    </div>
  </div>
</section>
{{-- Services end --}}

{{-- Partners --}}
<section class="home-partners">
  <div class="home-partners__inner main-container">
    <h2 class="home-partners__title main-title">Наши партнеры</h2>

    <div class="read-more">
      <p class="read-more__desc">Взаимовыгодное сотрудничество, выполнение обязательств и поставленных целей, ориентация на результат, эффективное взаимодействие на всех
        этапах, высококвалифицированный персонал – это принципы выбора партнеров.</p>

      <a class="read-more__link button button--transparent" href="{{ route('partners.index') }}">
        Все партнеры <span class="material-icons">chevron_right</span>
      </a>
    </div>

    <div class="home-partners__list">
      @foreach ($partners as $partner)
      <a class="home-partners__list-item" href="{{ $partner->link }}" target="_blank">
        <img class="home-partners__list-image" src="{{ asset('img/partners/' .  $partner->image ) }}" alt="{{ $partner->title }}">
      </a>
      @endforeach
    </div>
  </div>
</section>
{{-- Partners end --}}


{{-- Drugstores --}}
<section class="home-drugstores">
  <div class="home-drugstores__inner main-container">
    <h2 class="home-drugstores__title main-title">Сеть аптек</h2>

    <div class="read-more">
      <p class="read-more__desc">Наша компания стремительно растет и развивается. Одним из примеров такого неуклонного развития является постоянно увеличивающаяся сеть фирменных аптек, отвечающих всем высоким стандартам качества.</p>

      <a class="read-more__link button button--transparent" href="{{ route('drugstores.index') }}">
        Все аптеки <span class="material-icons">chevron_right</span>
      </a>
    </div>
  </div>

  <script> let drugstores = {{ Js::from($drugstores) }}; </script>
  <div class="drugstores-map" id="drugstores-map"></div>
</section>
{{-- Drugstores end --}}

@endsection
