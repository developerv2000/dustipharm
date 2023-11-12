<header class="header">
  {{-- Toggler start --}}
  <div class="header__toggler-container">
    <h2 class="header__site-name">{{ env('APP_NAME') }}</h2>
    <button class="aside-toggler"><span class="material-icons"">menu</span></button>
  </div>  {{-- Toggler end --}}

  {{-- Body start --}}
  <div class=" header__body">
    {{-- Title start --}}
    <ul class="header__breadcrumbs">
      {{-- first level --}}
      <li>
        @switch($modelTag)
          @case('advantages') Преимущества @break
          @case('drugstores') Сеть аптек @break
          @case('missions') Миссия @break
          @case('partners') Партнёры @break
          @case('services') Услуги @break
          @case('values') Ценности @break
        @endswitch

        {{-- First levels items count --}}
        @if( strpos($route, 'index')) ({{ count($totalItems) }}) @endif
      </li>

      {{-- second level on CREATE page --}}
      @if(strpos($route, 'create')) <li>Добавить</li> @endif

      {{-- second level on item EDIT page --}}
      @switch($route)
        @case('advantages.edit')
        @case('drugstores.edit')
        @case('missions.edit')
        @case('partners.edit')
        @case('services.edit')
        @case('values.edit')
        <li>{{ $item->title }}</li>
          @break
      @endswitch
    </ul> {{-- Title end --}}

    {{-- Actions start --}}
    <ul class="header__actions">
      {{-- Actions for index pages --}}
      @switch($route)
        @case('advantages.dashboard.index')
        @case('drugstores.dashboard.index')
        @case('missions.dashboard.index')
        @case('partners.dashboard.index')
        @case('services.dashboard.index')
        @case('values.dashboard.index')
        <li>
          <a href="{{ route($modelTag . '.create') }}">
            <span class="material-icons">add</span> Добавить
          </a>
        </li>

        <li>
          <button data-action="select-all"><span class="material-icons">done_all</span> Отметить все</button>
        </li>

        <li>
          <button data-bs-toggle="modal" data-bs-target="#destroy-multiple-items-modal"><span class="material-icons">clear</span> Удалить отмеченные</button>
        </li>
        @break
      @endswitch
    </ul> {{-- Actions end --}}
  </div> {{-- Body start --}}
</header>
