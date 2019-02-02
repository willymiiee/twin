<template>
  <section class="location-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Lokasi</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input type="text" v-model="data.name" placeholder="Nama Lokasi"/>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Alamat" label-for="address">
                <b-form-textarea
                  v-model="data.address"
                  placeholder="Alamat Lengkap"
                  :rows="3"
                  :max-rows="6"
                />
                <p v-show="'address' in this.error" class="text-danger">{{ this.error.address }}</p>
              </b-form-group>

              <b-form-group horizontal label="Provinsi" label-for="state">
                <b-form-input type="text" v-model="data.state" placeholder="Provinsi"/>
                <p v-show="'state' in this.error" class="text-danger">{{ this.error.state }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kota" label-for="city">
                <b-form-input type="text" v-model="data.city" placeholder="Kota"/>
                <p v-show="'city' in this.error" class="text-danger">{{ this.error.city }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitLocation"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'location-list' }">
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
  name: 'LocationForm',
  data () {
    return {
      label: 'Buat',
      loaded: true,
      submit: false,
      data: {
        name: null,
        address: null,
        state: null,
        city: null
      },
      error: {},
      errorApi: false
    }
  },
  mounted () {
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getData () {
      let self = this
      self.$http
        .get('admin/location/' + self.$route.params.id)
        .then(resp => {
          self.loaded = true
          self.data = resp.data.data
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitLocation () {
      let self = this
      let url =
        'admin/location' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'location-list' })
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
