@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title', $item->title) }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Текст</label>

    <textarea class="form-textarea" name="body" rows="8" required>{{ old('body', $item->body) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Ссылка. Полная ссылка включая https://</label>

    <input class="form-input" type="text" name="link" value="{{ old('link', $item->link) }}" placeholder="https://example.com" required />
  </div>

  <div class="form-group">
    <label class="form-label">Изображение. Необходимый размер 222x84</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
    <img class="form-image" data-id="local-image" src="{{ asset('img/partners/' . $item->image) }}">
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
