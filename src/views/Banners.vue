<template>
  <div class="banner-painel">
    <Navbar />
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

    <h1>Banners</h1>

    <Footer />
  </div>
</template>

<script>
// Import Sidemenu
import Navbar from "../components/Sidemenu.vue";
// Import BcryptJS
import bcrypt from "bcryptjs";
// Import Axios
import axios from "axios";
// Import Footer
import Footer from "../components/Footer.vue";

export default {
  name: "Articles",
  components: {
    Navbar,
    Footer
  },
  data() {
    return {
      breadcrumb_custom_items: [
        {
          text: "Dashboard",
          to: "/dashboard"
        },
        {
          text: "Banners",
          active: true,
        },
      ],
    };
  },
  methods: {
    getUser() {
      if (sessionStorage.email && sessionStorage.password) {
        const email = sessionStorage.getItem("email");
        const password = sessionStorage.getItem("password");
        axios
          .post(
            "http://localhost/confraria-dos-gatinhos/src/controllers/V1/User/userController.php",
            { method: 1, email: email, isActive: "Active" }
          )
          .then((response) => {
            if (!bcrypt.compareSync(password, response.data[0].password)) {
              this.$router.push({ name: "Login" });
            }
          });
      } else {
        this.$router.push({ name: "Login" });
      }
    },
  },
  mounted() {
    /* this.getUser(); */
  },
};
</script>

<style lang="css" scoped>
a {
  text-decoration: none;
}
</style>
