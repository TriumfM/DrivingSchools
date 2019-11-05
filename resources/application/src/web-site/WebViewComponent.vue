<template>
  <div class="main__container web__content">
    <header-navigation>
      <a :class="{'menu__item': true, 'active': false}" >Kategoritë</a>
      <a :class="{'menu__item': true, 'active': false}" >Ekipa Jonë</a>
      <a :class="{'menu__item': true, 'active': false}" >Kontakti</a>
      <router-link class="menu__item" :to="{name: 'login'}">Kyqu për testim</router-link>
    </header-navigation>
    <section class="slide__show" v-if="true">
      <slider-component class="slide__show--images"></slider-component>
      <div class="slide__show--content">
        <span class="content__title">Autoshkolla / Driving School</span>
        <span class="content__details">BLENDI</span>
      </div>
    </section>
    <div class="background-gradient">
      <section class="about__as" v-if="true">
        <div class="row__app">
          <div class="about__as--info">
            <h3 class="info__title">Rreth Nesh</h3>
            <span class="info__content">
            Auto Shkolla “Blendi” e cila është e licencuar dhe kontrollohet nga Ministria e Infrastruktures, trajnon, edukon dhe aftëson kandidatët e rinj që t’i bëjë ata përherë “vozitës të vetëdijshëm”. Ndryshe nga kurset klasike, Auto Shkolla “Blendi” ofron mundësitë më të fundit të teknologjisë, duke përfshirë programet kompjuterike dhe projektorët që shpjegojnë saktësisht situatat, njohuritë rreth trafikut dhe informatat e rëndësishme dhe të nevojshme për një kandidat..          </span>
            <!--<div class="info__buttons">-->
            <!--<button></button>-->
            <!--</div>-->
          </div>
          <div class="about__as--image">
            <img class="image__photo" src="@/assets/img/web_img_1.png"/>
            <span class="image__details">Shenjat e trafikut</span>
          </div>
        </div>
      </section>
      <section class="about__as-second" v-if="true">
        <div class="offer">
          <h3 class="offer__title">Çfarë Ofrojm Ne?</h3>
          <span class="offer__info">????</span>
        </div>
        <!--777-->
        <div class="bottom__line"></div>
        <!---->
        <div class="about__as-boxes">
          <div class="info__boxes">
            <div class="box__logo">
              <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.45 49.83">
                <path class="cls-1" d="M333.26,171.8c-7.43-5.25-15.22-8-22.55-8s-15.12,2.77-22.55,8a55.73,55.73,0,0,0-9.09,8L278,181l1.08,1.25a55.49,55.49,0,0,0,9.09,8c7.43,5.24,15.23,8,22.55,8s15.12-2.77,22.55-8a54.48,54.48,0,0,0,9.09-8l1.09-1.25-1.09-1.26A54.7,54.7,0,0,0,333.26,171.8ZM324.13,181a13.42,13.42,0,1,1-13.42-13.42A13.43,13.43,0,0,1,324.13,181Zm-41,0a52.77,52.77,0,0,1,13.36-9.79,17.22,17.22,0,0,0,0,19.57,47.46,47.46,0,0,1-6.07-3.63A55,55,0,0,1,283.16,181ZM331,187.18a46.61,46.61,0,0,1-6.06,3.63,17.22,17.22,0,0,0,0-19.57,46.61,46.61,0,0,1,6.06,3.63,53.78,53.78,0,0,1,7.3,6.16A54.62,54.62,0,0,1,331,187.18Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M303,181a7.71,7.71,0,1,0,7.7-7.71A7.7,7.7,0,0,0,303,181Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M308.8,148.45h3.83V158H308.8Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M329.65,152.81l-4.79,8.3-3.32-1.92,4.79-8.29Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M334.67,166.76l-1.92-3.32,8.3-4.79L343,162Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M299.89,159.19l-3.32,1.92-4.79-8.3,3.32-1.91Z" transform="translate(-277.99 -148.45)" />
                <path class="cls-1" d="M286.76,166.76l-8.3-4.79,1.92-3.32,8.3,4.79Z" transform="translate(-277.99 -148.45)" />
              </svg>
            </div>
            <div class="bottom__line"></div>
            <h5 class="box__name">Synimi Jonë</h5>
            <sapn class="box__details">Synimi kryesor i Auto Shkollës “Blendi” është zbatimi i detyrave dhe obligimeve ligjore e morale për t’i aftësuar individët me sjelljet ne trafik.</sapn>
          </div>
          <div class="info__boxes info__boxes-active">
            <div class="box__logo">
              <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.66 65.64">
                <path class="cls-1" d="M314.07,240.77H264l14.62-27.22,6.89,4.38,3.52-3.3,3.29,3.41,7-4.65Z" transform="translate(-248.41 -175.2)" />
                <path class="cls-1" d="M297.4,210c-1.39.94-2.65,1.86-4,2.66a1.3,1.3,0,0,1-1.19-.21c-1.09-1-2.1-2.17-3.29-3.41-1,1.1-2.06,2.13-3,3.21-.58.67-1,.85-1.82.26-1.13-.84-2.36-1.55-3.67-2.39,1.46-2.71,2.72-5.47,4.36-8a13.92,13.92,0,0,0,2.24-9.15,41.37,41.37,0,0,1,0-5c0-1-.28-1.38-1.32-1.34-2.08.07-4.17,0-6.32,0V175.2h11.48v1.63c0,6.45,0,12.9,0,19.34a7.84,7.84,0,0,0,.84,3.31C293.53,203,295.44,206.36,297.4,210Z" transform="translate(-248.41 -175.2)" />
                <path class="cls-1" d="M269.7,205.93c1.54,2.52,2.93,4.7,4.2,6.94a2,2,0,0,1-.18,1.58q-5.34,10-10.74,20c-1,1.85-2,3.71-3,5.54a1.62,1.62,0,0,1-1,.79c-3.41.06-6.82,0-10.53,0C255.54,229.15,262.54,217.66,269.7,205.93Z" transform="translate(-248.41 -175.2)" />
                <path class="cls-1" d="M268.33,186.86l-8.24-7.81h15.39v6.27c0,1.32,0,2.64,0,4,0,.95.31,1.33,1.27,1.26.77-.06,1.55,0,2.57,0,0,1.17.05,2.22-.05,3.26,0,.24-.57.62-.88.62-5.95,0-11.9,0-17.87,0Z" transform="translate(-248.41 -175.2)" />
              </svg>
            </div>
            <div class="bottom__line"></div>
            <h5 class="box__name">Qëllimi Jonë</h5>
            <sapn class="box__details">Qëllimi ynë është që me anë të metodave, udhëzimeve, informatavedhe praktikës t’i mënjanojmë të metat që munden me qenë edhe shkaktarët kryesore të aksidenteve.</sapn>
          </div>
          <div class="info__boxes">
            <div class="box__logo">
              <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.78 58.29">
                <path class="cls-1" d="M284.29,158.08h0a18.16,18.16,0,1,0,18.16,18.15A18.16,18.16,0,0,0,284.27,158.08Zm2.2,23.57v0a5.73,5.73,0,0,0,3.18-3.14h8.1a13.76,13.76,0,0,1-11.27,11.26v-1.81C286.51,185.82,286.51,183.74,286.49,181.65ZM282,185.91v3.82a13.61,13.61,0,0,1-11.27-11.29h8.09l0,0a5.66,5.66,0,0,0,3.17,3.16C282,183.05,282,184.48,282,185.91Zm.44-15.22a5.67,5.67,0,0,0-3.56,3.27.16.16,0,0,1,0,.06h-.11l-4.15,0h-3.86a13.6,13.6,0,0,1,13.46-11.49h.1A13.57,13.57,0,0,1,297.77,174h-8.1a6,6,0,0,0-2.34-2.73A5.73,5.73,0,0,0,282.48,170.69Z" transform="translate(-254.88 -136.11)" />
                <path class="cls-1" d="M313.67,138.9v32.79c0,1.81-.54,2.47-2.28,2.89l-5.17,1.23a2.94,2.94,0,0,1-.65.07,2.34,2.34,0,0,1-1.23-.33,2.27,2.27,0,0,1-1-1.43,2.24,2.24,0,0,1,1.82-2.61c1.34-.34,2.69-.67,4-1q0-12.14,0-24.16v-5.23l-11.59,2.76c-3.7.89-7.42,1.78-11.12,2.65,0,2.29,0,4.48,0,6.68a2.29,2.29,0,0,1-1.84,2.41,2.25,2.25,0,0,1-1.78-.46,2.42,2.42,0,0,1-.83-1.87c0-1.09,0-2.18,0-3.28v-2c0-.49,0-1,0-1.47q-8.1-1.92-16.2-3.88l-6.51-1.54v4.65q0,12.33,0,24.68v.07c.8.15,1.59.35,2.39.55l1.13.28a2.23,2.23,0,0,1,1.2,3.65,2.06,2.06,0,0,1-2,.69c-1.81-.37-3.55-.81-5.48-1.3a2.12,2.12,0,0,1-1.65-2,3.77,3.77,0,0,1,0-.58V138.77c0-.21,0-.37,0-.54a2.35,2.35,0,0,1,.93-1.71,2.23,2.23,0,0,1,1.9-.32c3.77.89,7.52,1.78,11.29,2.69l4.46,1.06L284,142.47a1.46,1.46,0,0,0,.55,0l21.71-5.18,4.27-1c.2,0,.41-.1.6-.12a2.21,2.21,0,0,1,2.47,1.84A5.74,5.74,0,0,1,313.67,138.9Z" transform="translate(-254.88 -136.11)" />
              </svg>
            </div>
            <div class="bottom__line"></div>
            <h5 class="box__name">Instruktorët</h5>
            <sapn class="box__details">Instruktoret e licencuar nga Ministria e Infrastruktures te cilet aftesojne kandidatet nga pjesa praktike jane me nje pervoj shume vjeqare ne kete lami dhe kryejne punen e tyre me plot pergjegjesi morale dhe profesionale.</sapn>
          </div>
        </div>
      </section>
      <section class="category" v-if="true">
        <div class="row__app">
          <div class="category__image">
            <img class="category__image-button" src="@/assets/img/test.png"/>
          </div>
          <div class="category__info">
            <div class="category__info_entry">
              <h4 class="info__title">Kategoritë që Ofrojm</h4>
              <span class="info__text">???</span>
            </div>
            <div class="row__app info__boxes">
              <div class="box">
                <div class="box__logo">A</div>
                <h6 class="box__name">Kategoria A</h6>
                <div class="box__details">
                  <ul>
                    <li>???</li>
                    <li>???</li>
                    <li>???</li>
                    <li>???</li>
                  </ul>
                </div><!--<button class="box__box"></button>-->
              </div>
              <div class="box">
                <div class="box__logo">B</div>
                <h6 class="box__name">Kategoria B</h6>
                <div class="box__details">
                  <ul>
                    <li>???</li>
                    <li>???</li>
                    <li>???</li>
                    <li>???</li>
                  </ul>
                </div><!--<button class="box__box"></button>-->
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="gallery" v-if="false">
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
      <section class="team" v-if="true">
        <div class="team__header">
          <h4 class="team__header--title">Ekipi Jonë Profesional</h4>
          <span class="team__header--details">???</span>
        </div>
        <!---->
        <div class="bottom__line"></div>
        <!---->
        <div class="team__members">
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/mehdi1.jpg"/>
            <div class="box_details">
              <span class="box__name">Muhamedi Parashumti</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/blendi1.jpg"/>
            <div class="box_details">
              <span class="box__name">Blendi Parashumti</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/albesa1.jpg"/>
            <div class="box_details">
              <span class="box__name">Albesa Parashumti</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/bashkim1.jpg"/>
            <div class="box_details">
              <span class="box__name">Bashkim Radogoshi</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/lindita1.jpg"/>
            <div class="box_details">
              <span class="box__name">Lindita Thaqi</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/adrian1.jpg"/>
            <div class="box_details">
              <span class="box__name">Adrian Bunjaku</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/blerina1.jpg"/>
            <div class="box_details">
              <span class="box__name">Blerina Zefaj</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/besart1.jpg"/>
            <div class="box_details">
              <span class="box__name">Besart Pruthi</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/burim1.jpg"/>
            <div class="box_details">
              <span class="box__name">Burim Kepuska</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
          <div class="box_member">
            <img class="box__photo" src="@/assets/img/vesa1.jpg"/>
            <div class="box_details">
              <span class="box__name">Vesa Lajqi</span>
              <span class="box__occupation">pozita???</span>
              <div class="box__links">
                <i class="box_icon fa fa-facebook-square"></i>
                <i class="box_icon fa fa-twitter"></i>
                <i class="box_icon fa fa-linkedin-square"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact" v-if="true">
        <div class="row__app">
          <div class="contact__info">
            <h3 class="info__title">Na Kontaktoni</h3>
            <div class="info__form">
              <div class="input">
                <label class="input__name">Emri</label>
                <input class="input__value" v-model="message.name"/>
                <span class="input__error" v-if="errors.name">{{ errors.name[0] }}</span>
              </div>
              <div class="input">
                <label class="input__name">Emaili</label>
                <input class="input__value" v-model="message.email"/>
                <span class="input__error" v-if="errors.email">{{ errors.email[0] }}</span>
              </div>
              <div class="input">
                <label class="input__name">Mesazhi</label>
                <textarea class="input__value textarea--input" v-model="message.message_text"></textarea>
                <span class="input__error" v-if="errors.message_text">{{ errors.message_text[0] }}</span>
              </div>
            </div>
            <button class="button__style button-send" @click="save()">Dergoje<img src="@/assets/img/arrow_right.svg"/></button>
          </div>
          <div class="map">
            <div class="map__view">
              <GmapMap style=" width: 500px; height: 350px;" :zoom="15" :center="center" :options="mapOptions">
                <GmapMarker :position="{lat: 42.3724984, lng:20.4387721}"/>
              </GmapMap>
            </div>
            <div class="map__addresses">
              <div class="map__address">
                <svg class="map__address--logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.28 25.42">
                  <path class="cls-1" d="M61.93,53.11a8.6,8.6,0,0,0-8.65,8.55v.06c0,1.92,1.11,4.82,3.54,9.17,1.64,2.94,3.28,5.43,3.37,5.56l1.2,1.79a.61.61,0,0,0,.54.28.56.56,0,0,0,.53-.28l1.2-1.79c.07-.13,1.71-2.59,3.37-5.56,2.4-4.35,3.54-7.25,3.54-9.17A8.63,8.63,0,0,0,61.93,53.11Zm0,12a3.49,3.49,0,1,1,3.48-3.48,3.48,3.48,0,0,1-3.48,3.48Z" transform="translate(-53.28 -53.11)" />
                </svg>
                <span class="map__address--value">Rruga Migjeni/Gjakovë/Kosovë</span>
              </div>
              <div class="map__address">
                <svg class="map__address--logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.19 24.21">
                  <path class="cls-1" d="M303.84,424.82a1.73,1.73,0,0,0-2.45-.15.71.71,0,0,0-.15.15l-1.79,1.79a.35.35,0,0,1-.49.09c-.4-.21-.81-.38-1.18-.62A18.32,18.32,0,0,1,293.3,422a10.56,10.56,0,0,1-1.61-2.6.38.38,0,0,1,.09-.48c.6-.57,1.18-1.17,1.74-1.73a1.74,1.74,0,0,0,.15-2.45l-.15-.15-1.34-1.43c-.48-.47-.95-1-1.45-1.45a1.74,1.74,0,0,0-2.45-.1l-.1.1c-.61.6-1.19,1.22-1.81,1.83a3,3,0,0,0-.91,2,8.47,8.47,0,0,0,.64,3.59,21.81,21.81,0,0,0,3.88,6.46,24,24,0,0,0,7.93,6.2,11.52,11.52,0,0,0,4.4,1.25,3.28,3.28,0,0,0,2.77-1.05c.51-.58,1.09-1.1,1.64-1.65a1.74,1.74,0,0,0,.15-2.45l-.15-.15c-.94-1-1.92-1.93-2.88-2.89" transform="translate(-285.45 -408.82)" />
                  <path class="cls-1" d="M302.87,420.81l1.87-.33a8.36,8.36,0,0,0-7.06-6.84l-.26,1.87a6.41,6.41,0,0,1,5.45,5.29" transform="translate(-285.45 -408.82)" />
                  <path class="cls-1" d="M305.78,412.73a13.74,13.74,0,0,0-7.8-3.91l-.32,1.86a11.94,11.94,0,0,1,10.12,9.8l1.86-.32a13.89,13.89,0,0,0-3.86-7.43" transform="translate(-285.45 -408.82)" />
                </svg>
                <span class="map__address--value">+383 49-503-503 & +383 45-503-503</span>
              </div>
              <div class="map__address">
                <svg class="map__address--logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.24 18.44">
                  <title>Untitled-1</title>
                  <path class="cls-1" d="M70.07,49.81H51.77a3,3,0,0,0-3,3h0V65.29a3,3,0,0,0,3,3h18.3a3,3,0,0,0,3-3h0V52.78a3,3,0,0,0-3-3Zm1.61,15.48a1.61,1.61,0,0,1-1.61,1.61H51.77a1.61,1.61,0,0,1-1.61-1.61V52.78a1.61,1.61,0,0,1,1.61-1.61h18.3a1.61,1.61,0,0,1,1.61,1.61Z" transform="translate(-48.8 -49.81)" />
                  <path class="cls-1" d="M64.08,58.88,70,53.57a.68.68,0,0,0,.06-1h0a.69.69,0,0,0-1,0l-8.17,7.33-1.6-1.44h0l-.1-.1-6.51-5.84a.68.68,0,0,0-.9,1l6,5.36-6,5.58a.7.7,0,0,0,0,1,.74.74,0,0,0,.51.2.66.66,0,0,0,.46-.17l6.06-5.68,1.64,1.48a.7.7,0,0,0,.46.16.66.66,0,0,0,.44-.17l1.69-1.51,6,5.72a.7.7,0,0,0,.47.19.69.69,0,0,0,.5-1.17Z" transform="translate(-48.8 -49.81)" />
                </svg>
                <span class="map__address--value">blendiautoshkolla@gmail.com</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="marketing" v-if="false">
        <h1>Marketing</h1>
      </section>
    </div>
    <section class="footer">
      <div class="company">
        <img class="company__logo" src=""/>
        <span class="box__copy">Copyrights © 2019 ASH BLENDI</span>
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
import SliderComponent from '@/web-site/SliderComponent'
import {Http} from '@/helpers/http-helper'
import alert from '@/services/sweetAlert.js'

export default {
  name: 'WebView',
  components: {
    HeaderNavigation,
    SliderComponent
  },
  data () {
    return {
      center:{
        lat: 42.3724984,
        lng:20.4387721
      },
      mapOptions: {
        disableDefaultUI: true
      },
      message: {},
      errors: {}
    }
  },
  mounted: function () {
  },
  methods: {
    save: function () {
      Http.post(`/messages`, this.message)
        .then(response => {
          this.errors = {}
          this.message = {}
          alert.CaseInfo('success', 'Success!', '')
        })
        .catch(e => {
          this.errors = e.response.data.errors
        })
    }
  }
}
</script>
