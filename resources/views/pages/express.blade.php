@extends('layouts.app', ['pageClass' => 'express-page'])

@section('title', 'Express Pharm')

@section('main')

<section class="page-base">
  <div class="page-base__inner main-container">
    <h1 class="page-base__title">Express Pharm</h1>
    <p class="page-base__desc">Вся необходимая информация о нашем <br>подразделении по логистике препаратов</p>
  </div>
  <img class="page-base__image" src="{{ asset('img/express/banner.png') }}" alt="express">
</section>

<section class="express-page__desc">
  <div class="express-page__desc-inner main-container">
    <p class="express-page__desc-txt">
      «Express Pharm» – это современный складской комплекс, соответствующий всем нормам хранения и транспортировки лекарств с автоматизированной системой доставки препаратов. Этот
      комплекс всецело позволяет обеспечить оптимальные условия хранения препаратов и своевременную отгрузку продукции.
    </p>

    <p class="express-page__desc-txt">
      Наша компания, имея многолетний опыт работы в оптовой продаже медикаментов, сможет качественно и в срок удовлетворить потребность наших клиентов в доставке необходимых
      препаратов.
    </p>
  </div>
</section>

<section class="about-express">
  <div class="about-express__inner main-container">
    <div class="about-express__divider">
      <img class="about-express__image" src="{{ asset('img/express/transport.png') }}" alt="transport">

      <div class="about-express__txt">
        <h2 class="about-express__title main-title">О нашей <br>компании</h2>
        <p class="about-express__desc">
          «Express Pharm» – ведущая в Таджикистане логистико-транспортная компания в сфере фармацевтики. Основной род деятельности компании – хранение и обслуживание, логистика и
          транспортировка лекарственных препаратов по территории страны.
          <br><br>За период активной деятельности и работы на рынке Таджикистана, компания значительно расширила свою ресурсную базу, что позволяет удовлетворить все потребности
          клиентов в любом регионе страны, обеспечивая все условия для сохранности товаров во время хранения и транспортировки.
          <br><br>Благодаря грамотной кадровой политике и серьезному подходу к набору сотрудников, на компанию «Express Pharm» работают исключительно компетентные и
          высококвалифицированные кадры, ведь мы понимаем, что наши сотрудники – лицо компании и на них лежит огромная ответственность за качество предоставляемых компанией услуг.
          <br><br>География обслуживания компании «Express Pharm» распространяется на всю территорию Таджикистана. Мы добились значительных успехов в автоматизации всего процесса
          доставки и гордимся своей системой 3-х разовой доставки по городу Душанбе и
          2-х разовой доставкой по регионам Таджикистана.
          <br><br>Автопарк компании «Express Pharm» состоит из собственных и наемных транспортных средств, отличающихся высокой надежностью. Каждое транспортное средство проходит
          осмотр и техническое обслуживание в положенный срок, чтобы ни одна малейшая поломка не помешала точности и безопасности процесса доставки.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="advantages">
  <div class="advantages__inner main-container">
    <h2 class="advantages__title main-title">Конкурентные преимущества</h2>
    <p class="advantages__desc">
      Выбирая компанию «Express Pharm», Вы можете быть уверены, что мы не потратим зря ни минуты вашего времени. Мы отличаемся от конкурентов благодаря нашим очевидным
      преимуществам.
    </p>

    <div class="advantages-list">
      @foreach ($advantages as $advantage)
      <div class="main-card advantages-card">
        <div class="main-card__image-container">
          <img src="{{ asset('img/advantages/' . $advantage->image) }}" alt="{{ $advantage->title }}">
          <span class="main-card__counter">{{ $loop->index + 1 }}</span>
        </div>

        <h3 class="main-card__title">{!! $advantage->title !!}</h3>
        <p class="main-card__body">{{ $advantage->body }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="advantages-contacts">
  <div class="advantages-contacts__inner main-container">
    <h2 class="advantages__title main-title">Контактные данные</h2>
    <p class="advantages-contacts__desc">
      Доставка «Express Pharm» – это автоматизированная система доставки препаратов, учитывая пожелания клиентов и с упором на качество предоставляемых услуг.
    </p>

    <div class="order-card">
      <div class="order-card__txt">
        <div class="order-card__about">
          <h3 class="order-card__about-title">Информация по заказам</h3>
          <p class="order-card__about-desc">Подробную информацию о графике заявок и доставке Вы можете получить у наших менеджеров по продажам в Вашем сегменте.</p>
        </div>

        <div class="order-card__contacts">
          <h3 class="order-card__contacts-title">Свяжитесь с нами</h3>
          <p class="order-card__contacts-desc">Пн-Сб 8.30-17.30 <br>info@expresspharm.tj</p>
          <p class="order-card__contacts-desc order-card__contacts-desc--marginless">734002, Республика Таджикистан, <br>Г. Душанбе, ул. Шамси, 4Б</p>
        </div>
      </div>

      <img class="order-card__image" src="{{ asset('img/express/order.png') }}" alt="order">
    </div>
  </div>
</section>

@endsection
