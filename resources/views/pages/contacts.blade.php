@extends('layouts.app', ['pageClass' => 'contacts-page'])

@section('title', 'Контакты')

@section('main')

<section class="page-base">
  <div class="page-base__inner main-container">
    <h1 class="page-base__title">Контакты</h1>
    <p class="page-base__desc">Для оперативной связи с нашей компанией <br>воспользуйтесь данными контактами</p>
  </div>
  <img class="page-base__image" src="{{ asset('img/contacts/banner.png') }}" alt="contacts">
</section>

<section class="main-office">
  <div class="main-office__inner main-container">
    <h2 class="main-office__title main-title">Головной офис Дусти Фарма </h2>
    <p class="main-office__city">Город Куляб</p>
    <p class="main-office__desc">
      ул. Исмоили Сомони, 25
      <br>Тел.: +992 918 00 00 00, +992 918 11 11 11
      <br>Email: kulob@dustipharma.tj
    </p>

    <div class="main-office-map-container">
      <div class="main-office-map" id="main-office-map"></div>
    </div>
  </div>
</section>

@endsection
