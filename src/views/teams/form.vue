<template>
  <section class="team-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Tim</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input id="name" v-model.trim="data.name"></b-form-input>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Depo" label-for="depot_id">
                <b-form-select
                  v-model="data.depot_id"
                  :options="depots"
                />
                <p
                  v-show="'depot_id' in this.error"
                  class="text-danger"
                >{{ this.error.depot_id }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitTeam"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'team-list' }">
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
  name: 'TeamForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      edit: false,
      data: {
        depot_id: null,
        name: null
      },
      depots: [],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getDepots()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.edit = true
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getDepots () {
      let self = this
      self.$http
        .get('admin/depot?page=all')
        .then(resp => {
          self.depots = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    getData() {
      let self = this
      self.$http
        .get('admin/team/' + self.$route.params.id)
        .then(resp => {
          resp.data.data.depot_id = resp.data.data.depot ? resp.data.data.depot.id : null

          delete resp.data.data.depot
          delete resp.data.data.salesmen
          delete resp.data.data.created_at
          delete resp.data.data.created_by
          delete resp.data.data.updated_at
          delete resp.data.data.updated_by
          delete resp.data.data.deleted_at
          delete resp.data.data.deleted_by

          self.data = resp.data.data
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    submitTeam() {
      let self = this
      const url =
        'admin/team' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'team-list' })
        })
        .catch(err => {
          const errorResponse = err.response.data
          self.error = errorResponse.errors ? errorResponse.errors : errorResponse
          self.submit = false
        })
    }
  }
}
</script>
