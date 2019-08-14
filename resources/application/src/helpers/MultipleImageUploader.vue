<template>
  <div class="col-md-12 no--padding">
    <label class="file cnf__input col-md-8">
      <input type="file" class="basic__input no--padding" id="file" v-on:change="changeFile" aria-label="File browser example">
      <span class="file-custom"></span>
    </label>
    <div class="box__images cnf__input col-md-4">
      <div class="box box--relative col-md-12 no--padding" v-if="photo_url && images.length == 0">
        <img :src="photo_url">
        <div class="image__info">
          <a v-on:click="deleteImage(image.id)"><i class="fa fa-trash"></i></a>
        </div>
      </div>
      <div class="box box--relative col-md-12 no--padding" v-if="images.length" v-for="i in images">
          <img :src="i">
          <!--<div class="image__info">-->
            <!--<a v-on:click="deleteImage()"><i class="fa fa-trash"></i></a>-->
          <!--</div>-->

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
        images: [],
        files: [],
        medias: [],
        bindHtml: "",
        fileCounter: []
      }
    },
    props: ['photo_url','identifier'],
    watch: {
      files: function () {
      },

      medias: function (val) {
        this.getUrl()
        const files = e.dataTransfer.files
        Array.from(files).forEach(file => this.addImage(file))
        if (val.length == 0) {
          this.fileCounter = []
        }
      }
    },
    methods: {
      getUrl () {
        this.$emit('getURL', this.files)

      },
      changeFile: function (evt) {
        this.files = []
        this.images = []

        var files = evt.target.files;
        Array.from(files).forEach(file => this.addImage(file))
        this.getUrl()
      },
      addImage (file) {
        if (!file.type.match('image.*')) {
          this.error = 'This is not a image!!'
          return
        }
        this.files.push(file)
        const img = new Image(),
          reader = new FileReader();

        reader.onload = (e) => this.images.push(e.target.result)

        reader.readAsDataURL(file)
        this.getUrl()
      },
      isImage: function (param) {
        alert('BOMMM-ISPHOTO')
        let file = param.split(".").pop();

        if (file.match(/^(SVG|GIF|PNG|JPEG|JPG|jpg|jpeg|gif|png|svg)$/)) {
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
            vm.medias = e.target.result
          };

          reader.readAsDataURL(f);

        }
      },
      deleteImage: function (param) {
        if (param != undefined) {
          if (confirm("A jeni i/e sigurte qe doni ta fshini kete foto")) {
            Http.delete('/images/' + param).then((response) => {
              this.$emit('image-deleted');
              this.fileCounter = null
              toast.show('success', 'Fotoja u fshi me sukses')
            });
          }
        } else {
          this.medias.splice(0, 1);
        }
      },
    }
  }
</script>
