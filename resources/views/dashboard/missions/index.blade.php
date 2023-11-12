@extends('dashboard.layouts.app')
@section('main')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          {{-- Empty space for checkbox --}}
          <th width="20"></th>

          <th>
            Текст
          </th>

          <th width="140">
            Действие
          </th>
        </tr>
      </thead> {{-- Table Head end --}}

      {{-- Table Body start --}}
      <tbody>
        @foreach ($items as $item)
        <tr>
          {{-- Checkbox for multidestroy --}}
          @include('dashboard.components.table.checkbox')

          <td>{{ $item->body }}</td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              @include('dashboard.components.table.edit-link')
              @include('dashboard.components.table.destroy-button')
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

  </div>
</div>

@include('dashboard.modals.destroy-single-item')
@include('dashboard.modals.destroy-multiple-items')

@endsection
