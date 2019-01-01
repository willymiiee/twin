<template>
  <section class="trip-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Perjalanan</h5>

            <form class="forms-sample">
              <b-form-group horizontal label="Tipe" label-for="type">
                <b-form-select v-model="data.type" :options="types"/>
                <p v-show="'type' in this.error" class="text-danger">{{ this.error.type }}</p>
              </b-form-group>

              <b-form-group horizontal label="Pengemudi" label-for="user_id">
                <b-form-select v-model="data.user_id" :options="users"/>
                <p v-show="'user_id' in this.error" class="text-danger">{{ this.error.user_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Toko Tujuan" label-for="destination">
                <multiselect
                  placeholder="Silahkan masukkan toko tujuan"
                  v-model="data.destination"
                  :options="stores"
                  :multiple="true"
                  :taggable="true"
                  tag-placeholder="Tambahkan toko"
                  @tag="addStore"
                ></multiselect>
                <p
                  v-show="'destination' in this.error"
                  class="text-danger"
                >{{ this.error.destination }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitTrip"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'trip-list' }">
                <b-button variant="light">Batal</b-button>
              </router-link>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  name: 'TripForm',
  data() {
    return {
      label: 'Buat',
      loaded: true,
      submit: false,
      data: {
        type: null,
        user_id: null,
        destination: []
      },
      types: [
        { value: null, text: 'Silahkan masukkan tipe perjalanan', disabled: true },
        { value: 'sales', text: 'Sales' },
        { value: 'logistic', text: 'Logistik' }
      ],
      users: [{ value: null, text: 'Silahkan masukkan pegawai', disabled: true }],
      stores: [],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getUsers()
    this.getStores()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getUsers() {
      let self = this
      self.$http
        .get('admin/user?per_page=all')
        .then(resp => {
          let users = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })

          self.users = self.users.concat(users)
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    getStores() {
      let self = this
      self.$http
        .get('admin/store?per_page=all')
        .then(resp => {
          self.stores = resp.data.data.map(s => {
            return s.name
          })
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    addStore(newStore) {
      this.stores.push(newStore)
      this.data.destination.push(newStore)
    },
    getData() {
      let self = this
      self.$http
        .get('admin/trip/' + self.$route.params.id)
        .then(resp => {
          self.data = {
            ...resp.data.data,
            user_id: resp.data.data.driver.id,
            destination: resp.data.data.destination.map(d => d.name)
          }
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitTrip() {
      let self = this
      const url =
        'admin/trip' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'trip-list' })
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
