<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Users</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="modalAdd()">Add new</button>
      </div>
    </div>
    <div class="table_2td">
      <div class="table__row" v-for="brand in 10">
        <div class='table__th--data'>
          <div class="table__th">User: </div>
          <div class='table__td table_td--click'>Ana Aliu</div>
        </div>
        <div class='table__th--data'>
          <div class="table__th">Tel: </div>
          <div class='table__td table_td--click'>045123000</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="getDetails(brand.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" v-on:click="destroy()" @click="destroy(brand.id)">
                <div class="dropdown__item--icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Delete</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
