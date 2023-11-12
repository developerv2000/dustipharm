@extends('dashboard.layouts.app')
@section('main')

@include('dashboard.components.search')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          @php $reversedOrderType = reverseOrderType($orderType); @endphp

          {{-- Empty space for checkbox --}}
          <th width="20"></th>

          <th>
            <a class="{{ $orderType }} {{ $orderBy == 'title' ? 'active' : '' }}"
              href="{{ route($modelTag . '.dashboard.index') }}?page={{ $activePage }}&orderBy=title&orderType={{ $reversedOrderType }}">Заголовок</a>
          </th>

          <th>
            Ссылка
          </th>

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

          <td>{{  $item->title  }}</td>
          <td>{{ $item->link }}</td>
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

    {{ $items->links('dashboard.layouts.pagination') }}
  </div>
</div>

@include('dashboard.modals.destroy-single-item')
@include('dashboard.modals.destroy-multiple-items')

@endsection
