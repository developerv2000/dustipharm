@extends('layouts.app', ['pageClass' => 'partners-page'])

@section('title', 'Партнеры')

@section('main')

<section class="page-base">
  <div class="page-base__inner main-container">
    <h1 class="page-base__title">Наши партнеры</h1>
    <p class="page-base__desc">Среди наших партнеров компании, <br>зарекомендовавшие себя на мировом фармрынке</p>
  </div>
  <img class="page-base__image" src="{{ asset('img/partners/banner.png') }}" alt="about">
</section>

<section class="partners-page__desc">
  <div class="partners-page__desc-inner main-container">
    <p class="partners-page__desc-txt">
      Взаимовыгодное сотрудничество, выполнение обязательств и поставленных целей, ориентация на результат, эффективное взаимодействие на всех этапах, высококвалифицированный
      персонал – это принципы выбора партнеров.
    </p>
  </div>
</section>

<section class="partners">
  <div class="partners__inner main-container">
    <h2 class="partners__title main-title">С кем мы сотрудничаем</h2>
    <p class="partners__desc">
      Компания ООО «Дусти Фарма» имеет контакты с производителями лекарственных средств из Европы, России, Украины, Беларуси, Индии.
    </p>

    <div class="partners-list">
      @foreach ($partners as $partner)
      <div class="partners-card">
        <div class="partners-card__image-container">
          <img class="partners-card__image" src="{{ asset('img/partners/' . $partner->image) }}" alt="{{ $partner->title }}">
        </div>

        <h3 class="partners-card__title">{!! $partner->title !!}</h3>
        <p class="partners-card__body">{{ $partner->body }}</p>
        <a class="partners-card__link button button--main" href="{{ $partner->link }}" target="_blank">
          Подробнее <span class="material-icons">chevron_right</span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
