<template>
  <div class="col-md-12 no__padding">
    <input type="file" v-on:change="changeFile" multiple>
    <div>
      <div class="box box--relative" v-if="gallery.length" v-for="image in gallery" :key="image.id" v-show="isImage(image.path)">
        <img :src="image.path">
        <div class="image__info">
          <a v-on:click="deleteImage(image.id)"><i class="fa fa-trash"></i></a>
        </div>
      </div>

      <div class="box box--relative" v-for="media in medias">
        <img :src="media">
        <div class="image__info">
          <a v-on:click="deleteImage()"><i class="fa fa-trash"></i></a>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

  import {Http} from '@/helpers/http-helper'
  import toast from '@/helpers/toast'

  export default {
    data () {
      return {
        images: {},
        medias: [],
        bindHtml: "",
        fileCounter: [],
        uploadFlag: false
      }
    },
    props: ['gallery', 'identifier'],
    watch: {
      gallery: function (val) {
//        console.log('From Gallery ' + this.uploadFlag)
        if (this.uploadFlag === false) {
          this.medias = [];
        }
      },
      medias: function (val) {
        if (val.length === 0) {
          this.fileCounter = []
        }
      }
    },
    methods: {
      changeFile: function (evt) {
        this.uploadFlag = true;
        var files = evt.target.files;
        this.fileCounter.push(files);

        if (this.validateImageNumber() > 4) {
          toast.show("error", "Numri i fotove te lejuara eshte kater (4)")
          this.fileCounter = []
          return false
        }

        this.initializeImage(files);
      },
      isImage: function (param) {

        let file = param.split(".").pop();

        if (file.match(/^(SVG|GIF|PNG|JPEG|JPG|jpg|jpeg|gif|png|svg)$/)) {
          this.uploadFlag = false;
          return true;
        } else {
          return false;
        }
      },
      initializeImage: function (param) {
        var vm = this;

        vm.$emit('drop-success', param);

        for (var i = 0, f; f = param[i]; i++) {
          if (!f.type.match('image.*')) {
            continue;
          }

          var reader = new FileReader();

          reader.onload = (e) => {
            vm.medias.push(e.target.result);
            this.uploadFlag = false;
          };

          reader.readAsDataURL(f);

        }
      },
      deleteImage: function (param) {
        if (param !== undefined) {
          if (confirm("A jeni i/e sigurte qe doni ta fshini kete foto")) {
            Http.delete('/images/' + param).then((response) => {
              this.$emit('image-deleted');
              this.fileCounter = []
              toast.show('success', 'Fotoja u fshi me sukses')
            });
          }
        } else {
          this.medias.splice(0, 1);
        }
      },
      validateImageNumber: function () {
        var total = 0;

        this.fileCounter.forEach((val) => {
          total += val.length
        })

        return this.gallery.length + total;
      }
    }
  }
</script>
