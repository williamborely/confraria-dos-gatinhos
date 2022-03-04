<template>
  <div>
    <b-navbar toggleable="lg" type="light" variant="variant">
      <b-navbar-brand href="#">
        <img
          class="acga-logo"
          src="https://scontent.fgig19-1.fna.fbcdn.net/v/t1.18169-9/12193423_1670106629898930_47414607797405322_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=aAzTPaztfSgAX8jeQnR&_nc_ht=scontent.fgig19-1.fna&oh=00_AT8w0IY1dLw352BlXLc1yMZ-UXzTTvmTnPHkvgCEtdl2ww&oe=622D652F"
          alt="ACGA-Logo"
        />
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item to="/dashboard" href="/dashboard">
            <b-icon-house-door></b-icon-house-door> Início
          </b-nav-item>
          <b-nav-item to="/articles" href="/articles">
            <b-icon-file-earmark-richtext></b-icon-file-earmark-richtext> Artigos
          </b-nav-item>
          <b-nav-item to="/banners" href="/banners">
            <b-icon-file-image></b-icon-file-image> Banners
          </b-nav-item>
          <b-nav-item to="/users" href="/users">
            <b-icon-file-earmark-person></b-icon-file-earmark-person> Usuários
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template #button-content>
              <em>
                <img width="20px" height="20px" src="./../assets/logo.png" alt="" />
              </em>
            </template>
            <b-dropdown-item href="#">
              <b-icon-person-circle></b-icon-person-circle> Perfil
            </b-dropdown-item>
            <b-dropdown-item href="#">
              <b-nav-item to="/" href="/">
                <b-icon-door-open></b-icon-door-open> Sair
              </b-nav-item>
            </b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Sidemenu",
  data() {
    return {
      variant: "dark",
    };
  },
};
</script>

<style lang="css" scoped>
@media (min-width: 992px) {
  .navbar-expand-lg .navbar-collapse {
    justify-content: end;
  }
  .navbar-expand-lg {
    padding: 8px 60px;
  }
  .router-link-exact-active {
    border-bottom: 3px solid yellow;
  }
}
.acga-logo {
  max-width: 80px;
  max-height: 80px;
}
.navbar {
  box-shadow: 0px 0px 15px -7px grey;
}
.navbar-toggler {
  border: 0;
}
.navbar-toggler:focus {
  outline: none;
  border: none;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}
</style>
