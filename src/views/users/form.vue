<template>
  <section class="user-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Karyawan</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input id="name" v-model.trim="data.name"></b-form-input>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Email" label-for="email">
                <b-form-input id="email" type="email" v-model.trim="data.email"></b-form-input>
                <p v-show="'email' in this.error" class="text-danger">{{ this.error.email }}</p>
              </b-form-group>

              <b-form-group horizontal label="Nomor Telepon" label-for="phone">
                <b-form-input id="phone" v-model.trim="data.phone"></b-form-input>
                <p v-show="'phone' in this.error" class="text-danger">{{ this.error.phone }}</p>
              </b-form-group>

              <b-form-group horizontal label="Jabatan" label-for="jobtitle">
                <b-form-select v-model="data.jobtitle" :options="jobtitles"/>
                <p v-show="'jobtitle' in this.error" class="text-danger">{{ this.error.jobtitle }}</p>
              </b-form-group>

              <b-form-group v-if="!edit" horizontal label="Kata Sandi" label-for="password">
                <b-form-input id="password" type="password" v-model.trim="data.password"></b-form-input>
                <p v-show="'password' in this.error" class="text-danger">{{ this.error.password }}</p>
              </b-form-group>

              <b-form-group
                v-if="!edit"
                horizontal
                label="Konfirmasi Kata Sandi"
                label-for="confirmPassword"
              >
                <b-form-input
                  id="confirmPassword"
                  type="password"
                  v-model.trim="data.password_confirmation"
                ></b-form-input>
                <p v-show="'password' in this.error" class="text-danger">{{ this.error.password }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitUser"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'user-list' }">
                <b-button variant="light">Batal</b-button>
              </router-link>
            </form>

            <div class="d-flex justify-content-center" v-else-if="!loaded">
              <circle8/>
            </div>

            <b-modal
              centered
              ok-only
              ok-variant="danger"
              title="Oops!"
              size="sm"
              v-model="errorApi"
            >
              <p class="my-2">Telah terjadi error, silahkan kontak administrator anda!</p>
            </b-modal>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'UserForm',
  data () {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      edit: false,
      data: {
        name: null,
        phone: null,
        email: null,
        password: null,
        password_confirmation: null,
        jobtitle: null,
        status: 'active'
      },
      jobtitles: [{ value: null, text: 'Silahkan pilih jabatan karyawan', disabled: true }],
      error: {},
      errorApi: false
    }
  },
  mounted () {
    this.getJobtitles()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.edit = true
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getJobtitles () {
      let self = this
      self.$http
        .get('admin/jobtitle?per_page=all')
        .then(resp => {
          let jobtitles = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })

          self.jobtitles = self.jobtitles.concat(jobtitles)
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    getData () {
      let self = this
      self.$http
        .get('admin/user/' + self.$route.params.id)
        .then(resp => {
          self.loaded = true
          self.data = {
            ...resp.data.data,
            jobtitle: resp.data.data['job-title'][0].id
          }
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitUser () {
      let self = this
      const url =
        'admin/user' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'user-list' })
        })
        .catch(err => {
          const errorResponse = err.response.data
          self.error = errorResponse.errors
          self.submit = false
        })
    }
  }
}
</script>
