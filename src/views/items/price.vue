<template>
  <section class="item-price">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Data Harga Barang</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="DBP" label-for="dbp">
                <b-form-input id="dbp" placeholder="Harga DBP" v-model.trim="data.prices.dbp"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="RBP" label-for="rbp">
                <b-form-input id="rbp" placeholder="Harga rBP" v-model.trim="data.prices.rbp"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="HCOBP" label-for="hcobp">
                <b-form-input id="hcobp" placeholder="Harga HCOBP" v-model.trim="data.prices.hcobp"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="WBP" label-for="wbp">
                <b-form-input id="wbp" placeholder="Harga WBP" v-model.trim="data.prices.wbp"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="CBP" label-for="cbp">
                <b-form-input id="cbp" placeholder="Harga CBP" v-model.trim="data.prices.cbp"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="LKA" label-for="lka">
                <b-form-input id="lka" placeholder="Harga LKA" v-model.trim="data.prices.lka"></b-form-input>
              </b-form-group>

              <b-form-group horizontal label="NKA" label-for="nka">
                <b-form-input id="nka" placeholder="Harga NKA" v-model.trim="data.prices.nka"></b-form-input>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitPrice"
              >Simpan</b-button>
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
  name: 'ItemPriceForm',
  data() {
    return {
      loaded: true,
      submit: false,
      data: {
        item_code: null,
        prices: {
          dbp: null,
          rbp: null,
          hcobp: null,
          wbp: null,
          cbp: null,
          lka: null,
          nka: null
        },
      },
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.data.item_code = this.$route.params.id
    this.getData()
  },
  methods: {
    getData() {
      let self = this
      self.$http
        .get('admin/item/' + self.$route.params.id + '/price')
        .then(resp => {
          const res = resp.data.data.map((p) => {
            return { type: p.type, price: p.price }
          })
          const prices = {
            dbp: res.filter(p => p.type == 'DBP').length != 0 ? res.filter(p => p.type == 'DBP')[0].price : null,
            rbp: res.filter(p => p.type == 'RBP').length != 0 ? res.filter(p => p.type == 'RBP')[0].price : null,
            hcobp: res.filter(p => p.type == 'HCOBP').length != 0 ? res.filter(p => p.type == 'HCOBP')[0].price : null,
            wbp: res.filter(p => p.type == 'WBP').length != 0 ? res.filter(p => p.type == 'WBP')[0].price : null,
            cbp: res.filter(p => p.type == 'CBP').length != 0 ? res.filter(p => p.type == 'CBP')[0].price : null,
            lka: res.filter(p => p.type == 'LKA').length != 0 ? res.filter(p => p.type == 'LKA')[0].price : null,
            nka: res.filter(p => p.type == 'NKA').length != 0 ? res.filter(p => p.type == 'NKA')[0].price : null
          }
          self.data.prices = prices
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    submitPrice() {
      let self = this
      const url = 'admin/item/' + self.$route.params.id + '/price'
      self.submit = true

      const apiCall = self.$http.post(url, self.data)
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
