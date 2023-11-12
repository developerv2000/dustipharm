@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <textarea class="form-textarea" name="title" rows="8" required>{{ customBr2nl($item->title) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Текст</label>

    <textarea class="form-textarea" name="body" rows="8" required>{{ old('body', $item->body) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label">Изображение</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
    <img class="form-image form-image--dark-bg" data-id="local-image" src="{{ asset('img/services/' . $item->image) }}">
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
