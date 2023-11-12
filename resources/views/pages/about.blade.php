@extends('layouts.app', ['pageClass' => 'about-page'])

@section('title', 'О компании')

@section('main')

<section class="page-base">
  <div class="page-base__inner main-container">
    <h1 class="page-base__title">О компании</h1>
    <p class="page-base__desc">В данном разделе Вы найдете <br>всю информации о нашей деятельности</p>
  </div>
  <img class="page-base__image" src="{{ asset('img/about/banner.png') }}" alt="about">
</section>

<section class="about-page__desc">
  <div class="about-page__desc-inner main-container">
    <p>
      С <strong>1996</strong> года компания «Дусти Фарма» начала свою фармацевтическую деятельность на территории Таджикистана. Мы занимаемся дистрибьюцией импортных лекарственных
      средств,
      последовательно расширяя свою сеть оптовых и розничных аптек, а также распространяя лекарственные препараты через другие аптеки страны.
    </p>

    <p>
      Имея в ассортименте более <strong>5000</strong> наименований лекарственных средств и товаров медицинского назначения, компания распространяет их при помощи разветвленной сети
      филиалов по
      всем регионам и областям Таджикистана. Современный складской комплекс позволяет обеспечить оптимальные условия хранения препаратов и своевременную отгрузку продукции.
    </p>

    <p>
      Основной задачей нашей компании является решение актуальных проблем медицины и здравоохранения Таджикистана путем предоставление безопасных, эффективных и инновационных
      лекарственных средств, а также других товаров медицинского назначения.
    </p>
  </div>
</section>

<section class="about-page__cards">
  <div class="about-page__cards-inner main-container">
    <div class="about-page__cards-left">
      <div class="secondary-card secondary-card--image-bottomed">
        <h3 class="secondary-card__title">Наша философия</h3>
        <p class="secondary-card__desc">
          Дружба и ответственность. <br><br>Для нас дружба – это личные бескорыстные взаимоотношения, основанные на взаимоуважении, взаимопонимании, взаимопомощи, открытости,
          честности, искренности, готовности к взаимодействию, доброжелательности и тактичности между людьми. <br><br>Мы выбрали ответственность как философию компании, так как мы
          –
          команда целеустремленных профессионалов, чувствующих ответственность за благополучие людей. Мы также несем ответственность перед своими близкими, что заключается в заботе
          об их здоровье. Мы принимаем решения с учетом всех факторов своей деятельности и всегда отвечаем за каждый из них.
        </p>
        <img class="secondary-card__image" src="{{ asset('img/about/friendship.png') }}" alt="friendship">
      </div>

      <div class="secondary-card secondary-card--image-bottomed">
        <h3 class="secondary-card__title">Наше видение</h3>
        <p class="secondary-card__desc">
          Мы видим «Дусти Фарма» как одного из лидеров фармацевтического рынка Таджикистана — динамично развивающуюся компанию на основе новейших технологий и высокого
          профессионализма сотрудников.
        </p>
        <img class="secondary-card__image" src="{{ asset('img/about/vision.png') }}" alt="vision">
      </div>
    </div>

    <div class="about-page__cards-right">
      <div class="secondary-card secondary-card--image-bottomed">
        <h3 class="secondary-card__title">Наш долг</h3>
        <p class="secondary-card__desc">
          Обеспечить здоровье населения. <br><br>Здоровье нации складывается из здоровья каждого жителя нашей страны. Это главное богатство любого общества и мы стремимся своей
          деятельностью исполнить свой долг путем предоставления качественных и доступных препаратов.
        </p>
        <img class="secondary-card__image" src="{{ asset('img/about/debt.png') }}" alt="debt">
      </div>

      <div class="secondary-card secondary-card--image-bottomed">
        <h3 class="secondary-card__title">Наш лозунг</h3>
        <p class="secondary-card__desc">
          Ваше здоровье – наша обязанность. <br><br>Ваше здоровье для нас самое важное, поэтому мы ежедневно работаем над улучшением всех звеньев нашей работы, начиная с поиска
          новых, более инновационных лекарственных средств, заканчивая вопросами логистики.
        </p>
        <img class="secondary-card__image" src="{{ asset('img/about/slogan.png') }}" alt="slogan">
      </div>
    </div>
  </div>
</section>

<section class="mission">
  <div class="mission__inner main-container">
    <h2 class="mission__title main-title">Наша миссия</h2>
    <p class="mission__desc">Миссия компании состоит из нескольких<br> основополагающих пунктов:</p>

    <ul class="mission__list">
      @foreach ($missions as $mission)
      <li class="mission__list-item">{{ $mission->body }}</li>
      @endforeach
    </ul>
  </div>
</section>

<section class="values">
  <div class="values__inner main-container">
    <h2 class="values__title main-title">Наши ценности</h2>
    <p class="values__desc">Ценности нашей компании <br>состоят из 6 главных направлений:</p>

    <div class="values__list">
      @foreach ($values as $value)
      <div class="secondary-card">
        <h3 class="secondary-card__title">{{ $value->title }}</h3>
        <p class="secondary-card__desc">{{ $value->body }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
