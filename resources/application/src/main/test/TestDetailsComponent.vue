<template>
  <div>
    <div class="test__details">
      <div class="test__question">
        <div class="question__header">
          <label class="question__info">Test 01 - Pyetja 12/30</label>
          <div class="-question__time">
            <label>25:18</label>
            <svg></svg>
          </div>
        </div>
        <div class="question__content">
          <div class="question__photo"></div>
          <div class="question__answers">
            <span></span>
            <div class="question__chooses">
              <div class="question__choose">
                <input class="choose__input"/>
                <span class="choose__text"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="question__footer">
          <span class="point"></span>
          <div class="control__buttons">
            <button></button>
            <button></button>
          </div>
        </div>
      </div>
      <div class="test__paginated">
        <button v-for="n in 9">{{n}}</button>
      </div>
    </div>
  </div>
</template>
