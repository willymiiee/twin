<template>
  <section class="item-detail">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Barang</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Kode" label-for="code">
                <b-form-input id="code" placeholder="Kode barang" v-model.trim="data.code"></b-form-input>
                <p v-show="'code' in this.error" class="text-danger">{{ this.error.code }}</p>
              </b-form-group>

              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input id="name" placeholder="Nama barang" v-model.trim="data.name"></b-form-input>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Deskripsi" label-for="description">
                <b-form-textarea
                  placeholder="Deskripsi barang"
                  v-model="data.description"
                  :rows="3"
                  :max-rows="6"
                />
                <p v-show="'description' in this.error" class="text-danger">{{ this.error.description }}</p>
              </b-form-group>

              <b-form-group horizontal label="Berat" label-for="weight">
                <b-input-group>
                  <b-form-input id="weight" placeholder="Berat barang" v-model.trim="data.weight"></b-form-input>
                  <b-form-input slot="append" id="weight_unit" placeholder="Satuan berat" v-model.trim="data.weight_unit"></b-form-input>
                </b-input-group>
                <b-input-group>
                  <p v-show="'weight' in this.error" class="text-danger">{{ this.error.weight }}</p>
                  <p slot="append" v-show="'weight_unit' in this.error" class="text-danger">{{ this.error.weight_unit }}</p>
                </b-input-group>
              </b-form-group>

              <b-form-group horizontal label="Satuan" label-for="unit">
                <b-form-input id="unit" placeholder="Satuan barang" v-model.trim="data.unit"></b-form-input>
                <p v-show="'unit' in this.error" class="text-danger">{{ this.error.unit }}</p>
              </b-form-group>

              <b-form-group horizontal label="Isi" label-for="contents">
                <b-form-input id="contents" placeholder="Isi (pcs)" v-model.trim="data.contents"></b-form-input>
                <p v-show="'contents' in this.error" class="text-danger">{{ this.error.contents }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitItem"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'item-list' }">
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
  name: 'ItemForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      data: {
        code: null,
        name: null,
        description: null,
        weight: null,
        weight_unit: null,
        unit: null,
        contents: null,
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
        .get('admin/item/' + self.$route.params.id)
        .then(resp => {
          delete resp.data.data.prices
          delete resp.data.data.stocks
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

    submitItem() {
      let self = this
      const url =
        'admin/item' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'item-list' })
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
