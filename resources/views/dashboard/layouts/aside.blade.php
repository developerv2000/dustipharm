<aside class="aside">
  <nav class="aside__nav">
    <ul class="aside__menu">
      <li class="aside__menu-item">
        <p class="aside__menu-title">Основные</p>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'advantages')active @endif" href="{{ route('advantages.dashboard.index') }}">
          <span class="material-icons-outlined">trending_up</span> Преимущества
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'drugstores')active @endif" href="{{ route('drugstores.dashboard.index') }}">
          <span class="material-icons-outlined">medication</span> Сеть аптек
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'missions')active @endif" href="{{ route('missions.dashboard.index') }}">
          <span class="material-icons-outlined">group_work</span> Миссия
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'partners')active @endif" href="{{ route('partners.dashboard.index') }}">
          <span class="material-icons-outlined">handshake</span> Партнёры
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'services')active @endif" href="{{ route('services.dashboard.index') }}">
          <span class="material-icons-outlined">medical_services</span> Услуги
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if($modelTag == 'values')active @endif" href="{{ route('values.dashboard.index') }}">
          <span class="material-icons-outlined">star</span> Ценности
        </a>
      </li>

      <li class="aside__menu-item">
        <p class="aside__menu-title">Дополнительно</p>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link" href="{{ route('home') }}" target="_blank">
          <span class="material-icons-outlined">home</span> Перейти на сайт
        </a>
      </li>

      <li class="aside__menu-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="aside__menu-button"><span class="material-icons-outlined">exit_to_app</span> Выйти</button>
        </form>
      </li>
    </ul>
  </nav>
</aside>
