<footer class="footer">
  <div class="footer__top">
    <div class="footer__top-inner main-container">
      {{-- Links --}}
      <div class="footer__links">
        <h4 class="footer__title">Полезные ссылки</h4>
        <ul class="footer__links-list">
          <li>
            <a class="footer__links-item" href="https://evolet.tj/" target="_blank">Evolet Tajikistan</a>
          </li>

          <li>
            <a class="footer__links-item" href="https://vegapharm.tj/" target="_blank">Vegapharm Tajikistan</a>
          </li>

          <li>
            <a class="footer__links-item" href="https://spey.tj/" target="_blank">Spey Tajikistan</a>
          </li>

          <li>
            <a class="footer__links-item" href="https://neouniverse.tj/" target="_blank">Neo Universe</a>
          </li>

          <li>
            <a class="footer__links-item" href="https://asiapharm.tj/" target="_blank">Asia Pharma</a>
          </li>

          <li>
            <a class="footer__links-item" href="https://madadpharm.tj/" target="_blank">Madad Pharma</a>
          </li>
        </ul>
      </div>
      {{-- Links end --}}

      <div class="footer__contacts">
        <h4 class="footer__title">Контакты</h4>
        <p class="footer__contacts-txt">
          ООО «Дусти Фарм» <br>Республика Таджикистан, Хатлонская область <br>Г. Куляб, ул. Исмоили Сомони, 25
        </p>
      </div>

      {{-- Socials --}}
      <div class="footer__socials">
        <h4 class="footer__title">Наши соцсети</h4>
        <ul class="footer__socials-list">
          <li>
            <a class="footer__socials-item" href="#">
              <svg class="footer__socials-svg">
                <use xlink:href="{{ asset('img/main/sprites.svg') }}#facebook" />
              </svg>
            </a>
          </li>

          <li>
            <a class="footer__socials-item" href="#">
              <svg class="footer__socials-svg">
                <use xlink:href="{{ asset('img/main/sprites.svg') }}#instagram" />
              </svg>
            </a>
          </li>

          <li>
            <a class="footer__socials-item" href="#">
              <svg class="footer__socials-svg">
                <use xlink:href="{{ asset('img/main/sprites.svg') }}#twitter" />
              </svg>
            </a>
          </li>

          <li>
            <a class="footer__socials-item" href="#">
              <svg class="footer__socials-svg">
                <use xlink:href="{{ asset('img/main/sprites.svg') }}#wk" />
              </svg>
            </a>
          </li>
        </ul>
      </div>
      {{-- Socials end --}}
    </div>
  </div>

  <div class="footer__bottom">
    <p class="footer__copyright">© {{ date('Y') }} ООО “Дусти Фарма”. <br>Все права защищены.</p>
    <button class="scroll-top"><span class="material-icons">expand_less</span></button>
  </div>
</footer>
