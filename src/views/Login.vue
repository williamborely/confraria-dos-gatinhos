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

        <button @click="onSubmit" class="btn btn- mt-3">Entrar</button>
    </form>
  </div>
</template>

<script>
import bcrypt from "bcryptjs";
import axios from "axios";

var url = "http://localhost/crud_vuetify_2020/crud.php";

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
        operacion: '',
      user:{
            id: null,
            firstName:'',
            lastName:'',
            email:'',
            password:'',
            recoveryCode:'',
            isActive:'',
        }
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      if(this.form.email && this.form.password) {

        this.getUser();
        const getPassword = this.users[0].password;
        if (bcrypt.compareSync(this.form.password, getPassword)) {
          /* this.$router.push({ name: "Dashboard" }); */
          console.log(getPassword + "Logado!");
        }else {
          console.log("Senha inválda!");
        }
      }else {
        /* this.onReset(event); */
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
    getUser(){
      axios.post(url,{opcion:1, email:this.form.email})
      .then(response =>{
        this.users = response.data;
      })
    },
  },
};
</script>

<style>
html {
  background-color: #fffee2 !important;
  overflow: hidden;
}

#app {
  background-color: #fffee2 !important;
}
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