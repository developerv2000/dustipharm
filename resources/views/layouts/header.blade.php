<header class="header">
  <div class="header__inner main-container">
    <x-logo class="header__logo" />

    <nav class="navbar">
      <x-navbar-links />
    </nav>

    <div class="header__phones">
      <div class="header__phone-icon">
        <span class="material-icons">call</span>
      </div>

      <div class="header__phones-links">
        <a class="header__phone-item" href="tel:+992918000000">+992 918 00 00 00</a>
        <a class="header__phone-item" href="tel:+992918111111">+992 918 11 11 11</a>
      </div>
    </div>

    <button class="menu-toggler only-mobile" data-action="toggle-menu">
      <span class="material-icons">menu</span>
    </button>

    <x-mobile-menu />
  </div>
</header>
