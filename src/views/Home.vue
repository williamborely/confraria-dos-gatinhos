<template>
  <!-- This block is content page --start-- -->
  <div class="home">
    <Navbar />
    <!-- This block is a breadcrumb component --start-- -->
    <template>
      <div class="breadcrumb">
        <b-breadcrumb>
          <b-breadcrumb-item
            v-for="(val, inx) in breadcrumb_custom_items"
            :to="val.to"
            :active="val.active"
            :key="inx"
          >
            <span style="color: pink" v-if="val.text === 'Blog'">
              {{ val.text }}
            </span>
            <template v-else>
              {{ val.text }}
            </template>
          </b-breadcrumb-item>
        </b-breadcrumb>
      </div>
    </template>
    <!-- This block is a breadcrumb component --end-- -->

    <!-- This block is a first sector --start-- -->
    <b-container fluid class="sector sector-1">
      <b-row cols="12" cols-sm="12" cols-md="12" cols-lg="12" cols-xl="12">
        <template>
          <div>
            <b-carousel
              id="carousel-1"
              v-model="slide"
              :interval="3000"
              controls
              background="#ababab"
              img-width="1024"
              img-height="480"
              style="text-shadow: 1px 1px 2px #333"
              @sliding-start="onSlideStart"
              @sliding-end="onSlideEnd"
            >
              <!-- Text slides with image -->
              <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=52">
              </b-carousel-slide>

              <!-- Slides with custom text -->
              <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
              </b-carousel-slide>

              <!-- Slides with image only -->
              <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58">
              </b-carousel-slide>

            </b-carousel>

          </div>
        </template>
      </b-row>
    </b-container>
    <!-- This block is a first sector --end-- -->
    <!-- This block is a second sector --start-- -->
    <b-container class="sector sector-2">
      <b-row cols="1" cols-sm="2" cols-md="2" cols-lg="2" cols-xl="2">
        <b-col
          ><p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam vel
            veritatis error consequuntur? Error labore et, quo beatae temporibus, veniam
            repudiandae vitae illo cumque deserunt numquam animi unde magnam tempora.
          </p></b-col
        >
        <b-col>
          <b-img
            src="https://placekitten.com/1000/500"
            fluid
            alt="Responsive image"
          ></b-img
        ></b-col>
      </b-row>
    </b-container>
    <!-- This block is a second sector --end-- -->
    <!-- This block is a third sector --start-- -->
    <b-container class="sector sector-3">
      <b-row cols="12" cols-sm="12" cols-md="12" cols-lg="12" cols-xl="12">
        <b-col>
          <div>
            <b-card-group deck>
              <b-card img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top></b-card>
            </b-card-group>
          </div>
        </b-col>
        <b-col>
          <div>
            <b-card-group deck>
              <b-card img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top></b-card>
            </b-card-group>
          </div>
        </b-col>
        <b-col>
          <div>
            <b-card-group deck>
              <b-card img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top></b-card>
            </b-card-group>
          </div>
        </b-col>
        <b-col>
          <div>
            <b-card-group deck>
              <b-card img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top></b-card>
            </b-card-group>
          </div>
        </b-col>
        <b-col>
          <div>
            <b-card-group deck>
              <b-card img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top></b-card>
            </b-card-group>
          </div>
        </b-col>
      </b-row>
    </b-container>
    <Footer />
    <!-- This block is a third sector --end-- -->
  </div>
  <!-- This block is content page --end-- -->
</template>

<script>
// Import Navbar
import Navbar from "./../components/Navbar.vue";
// Import Footer
import Footer from "./../components/Footer.vue";

export default {
  name: "Home",
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      /* This script block is a return prop of breadcrumb --start-- */
      breadcrumb_custom_items: [
        {
          text: "Início",
          active: true,
        },
      ],
      /* This script block is a return prop of breadcrumb --end-- */
    };
  },
};
</script>

<style lang="css" scoped>
a {
  text-decoration: none;
}
.sector {
  margin-bottom: 30px;
}
.card {
  border: 0 !important;
  margin: 8px;
}
</style>
