<template>
  <div>
    <footer type="light" class="font-small pt-0">
      <b-container>
          <b-col md="12">
            <div class="flex-center py-3">
              <a class="icon fc">
                <b-icon-facebook></b-icon-facebook>
              </a>
              <a class="icon ins">
                <b-icon-instagram></b-icon-instagram>
              </a>
              <a class="icon yt">
                <b-icon-youtube></b-icon-youtube>
              </a>
            </div>
          </b-col>
      </b-container>
      <div class="footer-copyright text-center py-3">
        <b-container fluid>
          &copy; 2020 Copyright: <a href="#"> ACGA ONG </a>
        </b-container>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      variant: "dark",
    };
  },
};
</script>

<style lang="css" scoped>
a {
    text-decoration: none;
}
footer {
  box-shadow: 0px 0px 15px -7px grey;
}
.icon {
    margin-left: 10px;
    font-size: 16px;
}
.fc {
    font-size: 20px;
    color: #1877f2;
}
.ins {
    font-size: 20px;
    color: #ab31aa;
}
.yt {
    font-size: 20px;
    color: #fe0000;
}
</style>
