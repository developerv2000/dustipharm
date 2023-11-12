@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Текст</label>

    <textarea class="form-textarea" name="body" rows="8" required>{{ old('body') }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Ссылка. Полная ссылка включая https://</label>

    <input class="form-input" type="text" name="link" value="{{ old('link') }}" placeholder="https://example.com" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Изображение. Необходимый размер 222x84</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image" required>
    <img class="form-image" data-id="local-image" src="{{ asset('img/dashboard/default-image.png') }}">
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection
