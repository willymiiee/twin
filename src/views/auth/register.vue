<template lang="html">

  <section class="register">
    <div class="wrapper d-flex align-items-center auth register-full-bg">
      <div class="row w-100">
        <div class="col-lg-6 mx-auto">
          <div class="auth-form-light text-left p-5">
            <h2>Daftar</h2>
            <!-- <h4 class="font-weight-light">Hello! let's get started</h4> -->
            <form class="pt-4">
              <form>
                <div class="form-group">
                  <label for="inputName">Nama</label>
                  <input type="string" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="John Doe" v-model="name">
                  <i class="mdi mdi-account"></i>
                  <span v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</span>
                </div>
                <div class="form-group">
                  <label for="inputCompanyName">Nama Perusahaan</label>
                  <input type="string" class="form-control" id="inputCompanyName" aria-describedby="companyNameHelp" placeholder="XYZ Company" v-model="companyName">
                  <i class="mdi mdi-account"></i>
                  <span v-show="'company_name' in this.error" class="text-danger">{{ this.error.company_name }}</span>
                </div>
                <div class="form-group">
                  <label for="inputName">Telepon</label>
                  <input type="string" class="form-control" id="inputPhone" aria-describedby="phoneHelp" placeholder="081123456789" v-model="phone">
                  <i class="mdi mdi-account"></i>
                  <span v-show="'phone' in this.error" class="text-danger">{{ this.error.phone }}</span>
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="john.doe@gmail.com" v-model="email">
                  <i class="mdi mdi-account"></i>
                  <span v-show="'email' in this.error" class="text-danger">{{ this.error.email }}</span>
                </div>
                <div class="form-group">
                  <label for="inputPassword">Kata Sandi</label>
                  <input type="password" class="form-control" id="inputPassword" placeholder="" v-model="password">
                  <i class="mdi mdi-eye"></i>
                  <span v-show="'password' in this.error" class="text-danger">{{ this.error.password }}</span>
                </div>
                <div class="form-group">
                  <label for="inputPasswordConfirm">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="" v-model="confirmPassword">
                  <i class="mdi mdi-eye"></i>
                  <span v-show="'password' in this.error" class="text-danger">{{ this.error.password }}</span>
                </div>
                <div class="mt-5">
                  <div class="btn btn-block btn-primary btn-lg font-weight-medium" @click="register">Daftar</div>
                </div>
                <!-- <div class="mt-2 w-75 mx-auto">
                  <b-form-checkbox id="checkbox1" v-model="status" value="accepted" unchecked-value="not_accepted">I accept the terms and use</b-form-checkbox>
                </div> -->
                <div class="mt-2 text-center">
                  <div class="auth-link text-black">Sudah punya akun? Silahkan <router-link class="auth-link text-black font-weight-medium" :to="{ name: 'login' }">masuk</router-link></div>
                </div>
              </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</template>

<script lang="js">
export default {
  name: 'register',
  data() {
    return {
      error: {},
      name: null,
      companyName: null,
      phone: null,
      email: null,
      password: null,
      confirmPassword: null
    }
  },
  methods: {
    register() {
      let self = this
      let data = new URLSearchParams()
      data.append('name', self.password)
      data.append('company_name', self.companyName)
      data.append('phone', self.phone)
      data.append('email', self.email)
      data.append('password', self.password)
      data.append('password_confirmation', self.confirmPassword)

      this.$http.post('register', data)
        .then(resp => {
          self.error = {}
          const response = resp.data
          localStorage.activationToken = response.activation_token
          self.$router.push({ name: 'thankyou' })
        })
        .catch(err => {
          const errorResponse = err.response.data
          self.error = errorResponse.errors
        })
    }
  }
}
</script>
