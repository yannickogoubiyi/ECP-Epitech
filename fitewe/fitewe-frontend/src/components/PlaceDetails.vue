<template>
  <!-- place imgs et details -->
  <!-- imgs -->
  <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            <div class="preview-pic tab-content">
              <div
                class="tab-pane active"
                :id="'demo' + picss.id"
                v-for="(picss, index) in pics_details"
                v-bind:key="picss.id" :class="{ 'inactive': index != 0 }"
              >
                <!-- <div v-for="first in picss" v-bind:key="first.id">
                  <img :src="first" />
                </div> -->
                <img :src="picss.pics" />
              </div>
            </div>
            <ul
              class="preview-thumbnail nav nav-tabs"
              v-for="picss in pics_details"
              v-bind:key="picss.id"
            >
              <li>
                <a :data-target="'#demo' + picss.id" data-toggle="tab"
                  ><img :src="picss.pics"
                /></a>
              </li>
            </ul>
          </div>
          <!-- fin img -->

          <!-- details -->
          <div class="details col-md-6">
            <h3 class="product-title">{{ places_details.place_name }}</h3>
            <p class="product-description">
              {{ places_details.place_description }}
            </p>
            <h6 class="price">{{ places_details.place_address }}</h6>
            <div class="rating">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="review-no">41 reviews</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin details -->

    <!-- comments -->
    <div class="row">
      <div class="panel panel-default widget">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-comment"></span>
          <!-- <h3 class="panel-title">Comments</h3> -->
        </div>
        <div class="panel-body">
          <ul class="list-group d-flex">
            <li class="list-group-item">
              <div
                class="row"
                v-for="details in comments_details"
                v-bind:key="details.id"
              >
                <div class="col-xs-2 col-md-1 mt-3 mb-3">
                  <!-- :src="details.misc.posted_by.avatar" -->
                  <img
                    src="https://bootdey.com/img/Content/avatar/avatar1.png"
                    class="img-circle img-responsive img-user"
                    alt=""
                  />
                </div>
                <div class="col-xs-10 col-md-11">
                  <div>
                    <!-- <a href="#">
                      Google Style Login Page Design Using Bootstrap</a
                    > -->
                    <div class="mic-info">
                      <a href="#">{{ details.misc.posted_by.username }}</a> on
                      {{ details.created_at }}
                    </div>
                  </div>
                  <div class="comment-text">
                    {{ details.content }}
                  </div>
                  <!-- <div class="action">
                    <button
                      type="button"
                      class="btn btn-primary btn-xs"
                      title="Edit"
                    >
                      <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button
                      type="button"
                      class="btn btn-success btn-xs"
                      title="Approved"
                    >
                      <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger btn-xs"
                      title="Delete"
                    >
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                  </div> -->
                </div>
              </div>
            </li>
          </ul>
          <!-- <a href="#" class="btn btn-info btn-sm btn-block" role="button"
            ><span class="glyphicon glyphicon-refresh"></span
          ></a> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      places_details: [],
      comments_details: [],
      pics_details: [],
    };
  },
  methods: {
    getPlacesDetail() {
      let url = "http://localhost:8000/api/places/" + this.$route.params.id;
      axios
        .get(url)
        .then((response) => {
          this.places_details = response.data[0];
          this.pics_details = response.data[0].place_images;

          console.log(this.places_details);
          console.log(this.pics_details);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getCommentDetails() {
      let url =
        "http://localhost:8000/api/comments/place/" + this.$route.params.id;
      axios
        .get(url)
        .then((response) => {
          this.comments_details = response.data.data;
          // console.log(this.comments_details);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.getPlacesDetail();
    this.getCommentDetails();
  },
  computed: {
    filterFirstActivePlaceImg() {
      console.log(place_images[0])
    },
    filterOtherActivePlaceImg() {
      for (let pic of this.pics_details) return pic.pics.slice(1, 100);
    },
  },
};
</script>

<style scoped>
body {
  font-family: "open sans";
  overflow-x: hidden;
}

img {
  max-width: 100%;
}

.container {
  border: solid 3px #f4c430;
  margin-bottom: 14px;
  margin-top: 15px;
}

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}
@media screen and (max-width: 996px) {
  .preview {
    margin-bottom: 20px;
  }
}

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px;
}
.preview-thumbnail.nav-tabs li {
  width: 18%;
  margin-right: 2.5%;
}
.preview-thumbnail.nav-tabs li img {
  max-width: 100%;
  display: block;
}
.preview-thumbnail.nav-tabs li a {
  padding: 0;
  margin: 0;
}
.preview-thumbnail.nav-tabs li:last-of-type {
  margin-right: 0;
}

.tab-content {
  overflow: hidden;
}
.tab-content img {
  width: 100%;
  -webkit-animation-name: opacity;
  animation-name: opacity;
  -webkit-animation-duration: 0.3s;
  animation-duration: 0.3s;
}

.card {
  margin-top: 50px;
  padding: 3em;
  line-height: 1.5em;
  border: none !important;
}

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }
}

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}

.product-title,
.price,
.sizes,
.colors {
  text-transform: UPPERCASE;
  font-weight: bold;
}

.checked,
.price span {
  color: #ff9f1a;
}

.product-title,
.rating,
.product-description,
.price,
.vote,
.sizes {
  margin-bottom: 15px;
}

.product-title {
  margin-top: 0;
}

.size {
  margin-right: 10px;
}
.size:first-of-type {
  margin-left: 40px;
}

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px;
}
.color:first-of-type {
  margin-left: 20px;
}

.add-to-cart,
.like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
.add-to-cart:hover,
.like:hover {
  background: #b36800;
  color: #fff;
}

.not-available {
  text-align: center;
  line-height: 2em;
}
.not-available:before {
  font-family: fontawesome;
  content: "\f00d";
  color: #fff;
}

.orange {
  background: #ff9f1a;
}

.green {
  background: #85ad00;
}

.blue {
  background: #0076ad;
}

.tooltip-inner {
  padding: 1.3em;
}

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
    transform: scale(3);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
    transform: scale(3);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

.inactive{
  display:none;
}

/* comments */

li.list-group-item {
  border-radius: 0;
  border-top: solid 3px #f4c430;
  display: inline;
}
li.list-group-item:hover {
  background-color: rgba(86, 61, 124, 0.1);
}
.comment-text {
  width: 100%;
}
</style>
