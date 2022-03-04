<template>
  <div class="wrapper">
    <div class="logo">
      <img
        src="https://scontent.fgig19-1.fna.fbcdn.net/v/t1.18169-9/12193423_1670106629898930_47414607797405322_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=aAzTPaztfSgAX8jeQnR&_nc_ht=scontent.fgig19-1.fna&oh=00_AT8w0IY1dLw352BlXLc1yMZ-UXzTTvmTnPHkvgCEtdl2ww&oe=622D652F"
        alt=""
      />
    </div>
    <div class="text-center mt-4 name">ACGA</div>
    <form class="p-3 mt-3">
      <div class="form-field d-flex align-items-center">
        <span class="far fa-user"></span>
        <b-form-input
          id="email"
          v-model="form.email"
          type="email"
          placeholder="Digite seu e-mail"
          required
        ></b-form-input>
      </div>
      <div class="form-field d-flex align-items-center">
        <span class="fas fa-key"></span>
        <b-form-input
          id="password"
          v-model="form.password"
          type="password"
          placeholder="Digite sua senha"
          required
        ></b-form-input>
      </div>

      <button v-if="loginLoader === false" @click="onSubmit" class="btn btn- mt-3">
        Entrar
      </button>
      <button v-else @click="onSubmit" class="btn btn- mt-3">
        <b-spinner small type="grow"></b-spinner>
        Entrando...
      </button>
      <br />
      <br />
      <b-alert
        v-if="loginErroAlert === true"
        variant="danger"
        fade
        :show="loginErroAlert"
        @dismissed="loginErroAlert = false"
      >
        E-mail ou Senha Invalidos!
      </b-alert>
      <b-alert
        v-else
        variant="danger"
        fade
        :show="loginOrPasswordInvalidAlert"
        @dismissed="loginOrPasswordInvalidAlert = false"
      >
        Preencha E-mail e Senha!
      </b-alert>
    </form>
  </div>
</template>

<script>
// Import BcryptJS
import bcrypt from "bcryptjs";
// Import Axios
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      show: true,
      users: [],
      dialog: false,
      operacion: "",
      user: {
        id: null,
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        recoveryCode: "",
        isActive: "",
      },
      loginErroAlert: false,
      loginOrPasswordInvalidAlert: false,
      loginLoader: false,
    };
  },
  methods: {
    onSubmit(event) {
      this.loginLoader = true;
      event.preventDefault();
      if (this.form.email && this.form.password) {
        this.getUser();
      } else {
        this.loginOrPasswordInvalidAlert = true;
        this.loginLoader = false;
      }
    },
    onReset(event) {
      event.preventDefault();
      // Reset our form values
      this.form.email = "";
      this.form.password = "";
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
    getUser() {
      axios
        .post(
          "http://localhost/confraria-dos-gatinhos/src/controllers/V1/User/userController.php",
          { method: 1, email: this.form.email, isActive: "Active" }
        )
        .then((response) => {
          this.loginLoader = false;
          if (bcrypt.compareSync(this.form.password, response.data[0].password)) {
            this.loginLoader = true;
            /* sessionStorage.setItem('email', this.form.email);
          sessionStorage.setItem('password', this.form.password); */
            this.$router.push({ name: "Dashboard" });
          } else {
            console.log("Senha inválda!");
            this.loginErroAlert = true;
          }
        });
    },
  },
};
</script>

<style scoped>
.wrapper {
  max-width: 350px;
  min-height: 500px;
  margin: 80px auto;
  padding: 40px 30px 30px 30px;
  background-color: #ecf0f3;
  border-radius: 15px;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
  width: 80px;
  margin: auto;
}

.logo img {
  width: 100%;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}

.wrapper .name {
  font-weight: 600;
  font-size: 1.4rem;
  letter-spacing: 1.3px;
  padding-left: 10px;
  color: #555;
}

.wrapper .form-field input {
  width: 100%;
  display: block;
  border: none;
  outline: none;
  background: none;
  font-size: 1.2rem;
  color: #666;
  padding: 10px 15px 10px 10px;
}

.wrapper .form-field {
  padding-left: 10px;
  margin-bottom: 20px;
  border-radius: 20px;
  box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
  color: #555;
}

.wrapper .btn {
  box-shadow: none;
  width: 100%;
  height: 40px;
  background-color: #03a9f4;
  color: #fff;
  border-radius: 25px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  letter-spacing: 1.3px;
}

.wrapper .btn:hover {
  background-color: #039be5;
}

.wrapper a {
  text-decoration: none;
  font-size: 0.8rem;
  color: #03a9f4;
}

.wrapper a:hover {
  color: #039be5;
}

@media (max-width: 380px) {
  .wrapper {
    margin: 30px 20px;
    padding: 40px 15px 15px 15px;
  }
}
</style>
