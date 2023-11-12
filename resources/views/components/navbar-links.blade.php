<ul class="navbar__list">
  <li>
    <a class="navbar__link @if(request()->route()->named('about.index')) navbar__link--active @endif" href="{{ route('about.index') }}">О компании</a>
  </li>

  <li>
    <a class="navbar__link @if(request()->route()->named('services.index')) navbar__link--active @endif" href="{{ route('services.index') }}">Услуги</a>
  </li>

  <li>
    <a class="navbar__link @if(request()->route()->named('partners.index')) navbar__link--active @endif" href="{{ route('partners.index') }}">Партнеры</a>
  </li>

  <li>
    <a class="navbar__link @if(request()->route()->named('drugstores.index')) navbar__link--active @endif" href="{{ route('drugstores.index') }}">Сеть аптек</a>
  </li>

  <li>
    <a class="navbar__link @if(request()->route()->named('express-pharm.index')) navbar__link--active @endif" href="{{ route('express-pharm.index') }}">Express Pharm</a>
  </li>

  <li>
    <a class="navbar__link @if(request()->route()->named('contacts.index')) navbar__link--active @endif" href="{{ route('contacts.index') }}">Контакты</a>
  </li>
</ul>
