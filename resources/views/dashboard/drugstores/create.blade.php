@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Телефон</label>

    <input class="form-input" type="text" name="phone" value="{{ old('phone') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Эль. почта</label>

    <input class="form-input" type="email" name="email" value="{{ old('email') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Рабочие дни</label>

    <input class="form-input" type="text" name="working_days" value="{{ old('working_days') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Рабочие часы</label>

    <input class="form-input" type="text" name="working_hours" value="{{ old('working_hours') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Координаты Х (широта) - на карте</label>

    <input class="form-input" type="text" name="x_coordinates" value="{{ old('x_coordinates') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Координаты Y (долгота) - на карте</label>

    <input class="form-input" type="text" name="y_coordinates" value="{{ old('y_coordinates') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Изображения (множественный выбор). Необходимый размер изображений 484x360 пикселей</label>

    <input class="form-input" type="file" name="images[]" accept=".png, .jpg, .jpeg" multiple required>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection
