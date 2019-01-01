<template>
  <section class="store-detail">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Toko</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input id="name" v-model.trim="data.name" placeholder="Nama Toko"/>
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

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitStore"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'store-list' }">
                <b-button variant="light">Cancel</b-button>
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
  name: 'StoreForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      data: {
        name: null,
        address: null,
        latitude: null,
        longitude: null
      },
      error: {},
      errorApi: false
    }
  },
  mounted() {
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getData() {
      let self = this
      self.$http
        .get('admin/store/' + self.$route.params.id)
        .then(resp => {
          self.data = resp.data.data
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitStore() {
      let self = this
      const url =
        'admin/store' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'store-list' })
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
