<template>
  <div class="main__container">
    <header-navigation>
      <a :class="{'menu__item': true, 'active': false}" >Rreth Nesh</a>
      <a :class="{'menu__item': true, 'active': false}" >Kategoritë</a>
      <a :class="{'menu__item': true, 'active': false}" >Galeria</a>
      <a :class="{'menu__item': true, 'active': false}" >Ekipa Jonë</a>
      <a :class="{'menu__item': true, 'active': false}" >Kontakti</a>
      <button class="menu__item" :to="{name: 'login'}" @click="logout()">Kyqu për testim</button>
    </header-navigation>
    <section class="slide__show">
      <div class="slide__show--images"></div>
      <div class="slide__show--content">
        <h3 class="content__title"></h3>
        <span class="content__details"></span>
      </div>
    </section>
    <section class="about__as">
      <div class="row__app">
        <div class="about__as--info">
          <h3 class="info__title"></h3>
          <span class="info__content"></span>
          <div class="info__buttons">
            <button></button>
          </div>
        </div>
        <div class="about__as--image">
          <img class="image__photo" src=""/>
          <span class="image__details"></span>
        </div>
      </div>
      <div class="offer">
        <h4 class="offer__title"></h4>
        <span class="details"></span>
      </div>
      <div class="row__app">
        <i></i>
        <div class="about__as-box">
          <div class="box__logo">
            <div class="box__logo--img"></div>
            <h3 class="box__logo--name"></h3>
          </div>
          <div class="box__info">
            <span class="box__info--details"></span>
            <button class="box__info--button"></button>
          </div>
        </div>
        <div class="about__as-box">
          <div class="box__logo">
            <div class="box__logo--img"></div>
            <h3 class="box__logo--name"></h3>
          </div>
          <div class="box__info">
            <span class="box__info--details"></span>
            <button class="box__info--button"></button>
          </div>
        </div>
        <div class="about__as-box">
          <div class="box__logo">
            <div class="box__logo--img"></div>
            <h3 class="box__logo--name"></h3>
          </div>
          <div class="box__info">
            <span class="box__info--details"></span>
            <button class="box__info--button"></button>
          </div>
        </div>
        <i></i>
      </div>
    </section>
    <section class="category">
      <div class="row__app">
        <div class="category__image">
          <img src="category__image-button"/>
          <div class="category__image-buttons">
            <div><-</div>
            <div>-></div>
          </div>
        </div>
        <div class="category__info">
          <h3 class="info__title"></h3>
          <span class="info__text"></span>
          <div class="row__app info__boxes">
            <div class="box">
              <div class="box__logo"></div>
              <h6 class="box__name"></h6>
              <div class="box__details"></div>
              <button class="box__box"></button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="gallery">
      <div class="gallery__header">
        <span>Galeria</span>
        <div class="gallery__icons">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="gallery__body">
        <i></i>
        <div class="gallery__body-images">
          <img src=""/>
          <img src=""/>
          <img src=""/>
          <img src=""/>
          <img src=""/>
        </div>
        <i></i>
      </div>
    </section>
    <section class="team">
      <div class="team__header">
        <h4 class="team__header--title"></h4>
        <span class="team__header--details"></span>
      </div>
      <div class="team__members">
        <div class="box">
          <img class="box__photo" src=""/>
          <span class="box__name"></span>
          <span class="box__occupation"></span>
          <div class="box__links">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact">
      <div class="row__app">
        <div class="contact__info">
          <h3 class="info__title"></h3>
          <div class="info__form">
            <div class="input">
              <label class="input__name"></label>
              <input class="input__value"/>
            </div>
            <div class="input">
              <label class="input__name"></label>
              <input class="input__value"/>
            </div>
            <div class="input">
              <label class="input__name"></label>
              <textarea class="input__value"></textarea>
            </div>
          </div>
          <button></button>
        </div>
        <div class="map">
          <div class="map__view">

          </div>
          <div class="map__addresses">
            <div class="map__address">
              <i class="map__address--logo"></i>
              <span class="map__address--value"></span>
            </div>
            <div class="map__address">
              <i class="map__address--logo"></i>
              <span class="map__address--value"></span>
            </div>
            <div class="map__address">
              <i class="map__address--logo"></i>
              <span class="map__address--value"></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="marketing">
    </section>
    <section class="footer">
      <div class="company">
        <img class="company__logo" src=""/>
        <span class="box__copy"></span>
        <span class="box__content"></span>
        <div class="box__links">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>

    </section>
  </div>
</template>

<script>

  import HeaderNavigation from '@/partials/HeaderNavigation'

  export default {
    name: 'WebView',
    components: {
      HeaderNavigation
    },
    data () {
      return {
      }
    },
    mounted: function () {
    },
    methods: {
    }
  }
</script>
