<template>
  <div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="@/assets/img/slider2.png" width="100%" height="100%"/>
        </div>
        <div class="carousel-item">
          <img src="@/assets/img/slider1.png" width="100%" height="100%"/>
        </div>
        <div class="carousel-item">
          <img src="@/assets/img/slider3.jpg" width="100%" height="100%"/>
        </div>
      </div>
    </div>
  </div>
</template>
