<template>
  <section class="department-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Departemen</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Lokasi Kantor" label-for="locations">
                <b-form-select v-model="data.location_id" :options="locations"/>
                <p
                  v-show="'location_id' in this.error"
                  class="text-danger"
                >{{ this.error.location_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input type="text" v-model="data.name" placeholder="Nama Departemen"/>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitDepartment"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'department-list' }">
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
  name: 'DepartmentForm',
  data() {
    return {
      label: 'Buat',
      loaded: true,
      submit: false,
      data: {
        location_id: null,
        name: null
      },
      locations: [{ value: null, text: 'Silahkan pilih lokasi kantor', disabled: true }],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getLocations()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getLocations() {
      let self = this
      self.$http
        .get('admin/location?per_page=all')
        .then(resp => {
          let locations = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })

          self.locations = self.locations.concat(locations)
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    getData() {
      let self = this
      self.$http
        .get('admin/department/' + self.$route.params.id)
        .then(resp => {
          self.loaded = true
          const response = resp.data.data
          self.data = {
            location_id: response.location.id,
            name: response.name
          }
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitDepartment() {
      let self = this
      const url =
        'admin/department' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'department-list' })
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
