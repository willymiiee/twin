<template>
  <section class="stock-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Stok</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Barang" label-for="item_code">
                <b-form-select v-model="data.item_code" :options="items" :disabled="edit">
                  <template slot="first">
                    <option :value="null" disabled>Silahkan pilih barang</option>
                  </template>
                </b-form-select>
                <p v-show="'item_code' in this.error" class="text-danger">{{ this.error.item_code }}</p>
              </b-form-group>

              <b-form-group horizontal label="Banyak Dus" label-for="qty">
                <b-form-input type="number" id="qty" placeholder="0" :min="0" v-model.trim="data.qty"></b-form-input>
                <p v-show="'qty' in this.error" class="text-danger">{{ this.error.qty }}</p>
              </b-form-group>

              <b-form-group horizontal label="Banyak Pcs" label-for="qty_pcs">
                <b-form-input type="number" id="qty_pcs" placeholder="0" :min="0" v-model.trim="data.qty_pcs"></b-form-input>
                <p v-show="'qty_pcs' in this.error" class="text-danger">{{ this.error.qty_pcs }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitStock"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'stock-list', params: { id: this.$route.params.warehouseId } }">
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
  name: 'StockForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      edit: false,
      data: {
        item_code: null,
        warehouse_id: this.$route.params.warehouseId,
        qty: 0,
        qty_pcs: 0
      },
      items: [],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getItems()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.edit = true
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getItems () {
      let self = this
      self.$http
        .get('admin/item?per_page=all')
        .then(resp => {
          self.items = resp.data.data.map(i => {
            return { value: i.code, text: i.code + ' - ' + i.name }
          })

          if (!self.edit) {
            self.getUnselectedItems()
          }
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    getUnselectedItems () {
      let self = this
      self.$http
        .get('admin/warehouse/' + self.$route.params.warehouseId)
        .then(resp => {
          let stocks = resp.data.data.stocks.map((s) => s.item_code)
          console.log(stocks)
          self.items = self.items.filter((i) => stocks.indexOf(i.value) == -1)
          console.log(self.items)
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    getData() {
      let self = this
      self.$http
        .get('admin/warehouse/' + self.$route.params.warehouseId + '/stock/' + self.$route.params.id)
        .then(resp => {
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

    submitStock() {
      let self = this
      const url =
        'admin/warehouse/' + self.$route.params.warehouseId + '/stock' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

console.log(self.data)
      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'stock-list', params: { id: this.$route.params.warehouseId } })
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
