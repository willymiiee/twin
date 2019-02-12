<template>
  <section class="item-list">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row card-title mb-4">
              <div class="col">
                <h5>Daftar Barang</h5>
              </div>

              <div class="col">
                <router-link
                  class="btn btn-primary btn-sm float-right"
                  :to="{ name: 'item-form', params: { id: 'add' } }"
                >Daftarkan Barang Baru</router-link>
              </div>
            </div>

            <template v-if="loaded && datas.length !== 0">
              <div class="table-responsive">
                <table class="table center-aligned-table">
                  <thead>
                    <tr>
                      <th class="pl-0 border-bottom-0">Kode</th>
                      <th class="pl-0 border-bottom-0">Nama</th>
                      <th class="pl-0 border-bottom-0">Satuan</th>
                      <th class="pl-0 border-bottom-0">Kemasan</th>
                      <th class="text-right border-bottom-0"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-for="(d, index) in datas">
                      <tr class="b-table-has-details" :key="d.code">
                        <td class="pl-0">{{ d.code }}</td>
                        <td class="pl-0">{{ d.name }}</td>
                        <td class="pl-0">{{ d.unit }}</td>
                        <td
                          class="pl-0"
                        >{{ d.contents + ' pcs - ' + d.weight + ' ' + d.weight_unit }}</td>
                        <td class="pr-0 text-right">
                          <b-button
                            class="mr-1"
                            size="sm"
                            variant="success"
                            @click.stop="toggleDetails(index)"
                          >{{ d.isActive ? 'Sembunyikan' : 'Daftar harga' }}</b-button>

                          <router-link
                            class="btn btn-outline-success btn-sm"
                            :to="{ name: 'item-form', params: { id: d.code } }"
                          >Detil</router-link>
                        </td>
                      </tr>
                      <tr class="b-table-details" v-if="d.isActive" :key="d.code + '.prices'">
                        <td colspan="5">
                          <div class="card">
                            <div class="card-body">
                              <div class="row card-title mb-4">
                                <div class="col">
                                  <router-link
                                    class="btn btn-outline-info btn-sm float-right"
                                    :to="{ name: 'item-prices', params: { id: d.code } }"
                                  >Data harga</router-link>
                                </div>

                                <div class="table-responsive">
                                  <table class="table center-aligned-table">
                                    <thead>
                                      <tr>
                                        <th>Tipe</th>
                                        <th>Harga</th>
                                        <th>Harga Satuan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="p in d.prices" :key="d.code + '.prices.' + p.type">
                                        <td>{{ p.type }}</td>
                                        <td>{{ p.price | toIDR }}</td>
                                        <td>{{ p.price / d.contents | toIDR }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>

              <b-pagination
                align="center"
                class="flat pagination-success"
                :total-rows="totalRows"
                v-model="currentPage"
                :per-page="perPage"
                @change="pageChange"
              />
            </template>

            <div
              class="d-flex justify-content-center"
              v-else-if="loaded && datas.length == 0"
            >Tidak ada data!</div>

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
  name: 'ItemList',
  data() {
    return {
      datas: [],
      loaded: false,
      currentPage: 1,
      totalRows: 0,
      perPage: 5,
      errorApi: false
    }
  },
  mounted() {
    this.getData()
  },
  methods: {
    toggleDetails(key) {
      this.datas[key].isActive = !this.datas[key].isActive
    },

    getData() {
      let self = this
      self.$http
        .get('admin/item?page=' + self.currentPage + '&per_page=' + self.perPage)
        .then(resp => {
          self.loaded = true
          self.totalRows = resp.data.meta.total
          self.datas = resp.data.data.map(d => {
            let o = Object.assign({}, d)
            o.isActive = false
            return o
          })
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    pageChange(page) {
      this.currentPage = page
      this.loaded = false
      this.getData()
    }
  },
  filters: {
    toIDR(value) {
      return 'Rp. ' + parseFloat(value).toLocaleString('id')
    }
  }
}
</script>
