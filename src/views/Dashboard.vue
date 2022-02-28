<template>
  <div class="admin-dashboard">
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

    <h1>Painel Administrativo</h1>
  </div>
</template>

<script>
// Import Sidemenu
import Navbar from "../components/Sidemenu.vue";

export default {
  name: "Dashboard",
  components: {
    Navbar,
  },
  data() {
    return {
      breadcrumb_custom_items: [
        {
          text: "Painel Administrativo",
          active: true,
        },
      ],
    };
  },
};
</script>

<style lang="css" scoped>
a {
  text-decoration: none;
}
</style>
