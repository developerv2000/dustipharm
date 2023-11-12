@extends('layouts.app', ['pageClass' => 'services-page'])

@section('title', 'Услуги')

@section('main')

<section class="page-base">
  <div class="page-base__inner main-container">
    <h1 class="page-base__title">Наши услуги</h1>
    <p class="page-base__desc">Перечень наших услуг показывает <br>ответственный подход к заботе о здоровье </p>
  </div>
  <img class="page-base__image" src="{{ asset('img/services/banner.png') }}" alt="about">
</section>

<section class="services-page__desc">
  <div class="services-page__desc-inner main-container">
    <p class="services-page__desc-txt">
      С помощью предоставления услуг высокого уровня мы стремимся удовлетворить потребности населения в качественных медицинских товарах. Основополагающей целью деятельности ООО
      «Дусти Фарма» является постоянный мониторинг и удовлетворение текущих потребностей наших клиентов и партнеров.
    </p>
  </div>
</section>

<section class="services">
  <div class="services__inner main-container">
    <h2 class="services__title main-title">Мы предоставляем нашим клиентам <br>и партнерам следующие услуги:</h2>

    <div class="services-list">
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
  </div>
</section>

<section class="registration">
  <div class="registration__inner main-container">
    <div class="registration__card">
      <img class="registration__card-image" src="{{ asset('img/services/registration.png') }}" alt="registration">

      <div class="registration__card-body">
        <h2 class="registration__card-title main-title">Услуги по <br>регистрации</h2>
        <p class="registration__card-desc">
          ООО «Дусти Фарма» активно помогает своим партнерам в вопросах регистрации лекарств в Республике Таджикистан. <br><br>Специалисты ООО «Дусти Фарма» оказывают
          квалифицированное содействие в подготовке необходимой документации для регистрации лекарственных средств, изделий медицинского назначения, парафармацевтической продукции,
          в том числе средств гигиены. Благодаря этому оформление полного пакета документов и получение регистрационного сертификата на продукт осуществляется в кратчайшие сроки. У
          нашей компании большой опыт в данной деятельности и широкий охват компаний.
        </p>
      </div>
    </div>

    <p class="registration__txt">
      Если Вы заинтересованы в сотрудничестве с нами, свяжитесь с отделом продаж. Наш специалист по работе с клиентами ответит на все Ваши вопросы, и договорится о личной встрече
      для заключения договора в удобное для Вас время.
    </p>

    <a class="registration__button button button--main" href="{{ route('contacts.index') }}">
      Связаться с нами <span class="material-icons">chevron_right</span>
    </a>
  </div>
</section>

@endsection
