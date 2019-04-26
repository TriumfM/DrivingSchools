<template>
  <div>
    <div class="results__body">
      <span :class="{'results__point': true, 'success': true, 'error': false}">86 Pikë, Urime keni kaluar</span>
      <div class="results__answers">
        <div :class="{'result__box': true, 'success': (n < 22), 'error': (n >= 22) }" v-for="n in 30">
          <span class="question__order">{{(n < 10)? '0'+n: n}}</span>
          <sapn class="question__result">{{(n > 21)? 'Gabim': 'Saktë'}}</sapn>
        </div>
      </div>
      <button class="button__style button--again">
        <span>Testohu Përsëri</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.54 13.26">
          <line class="cls-1" x1="1.5" y1="6.63" x2="15.68" y2="6.63" />
          <polyline class="cls-1" points="10.91 1.5 16.04 6.63 10.91 11.76" />
        </svg>
      </button>
    </div>
  </div>
</template>
