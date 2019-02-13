<template>
  <section class="stock-warehouse">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row card-title mb-4">
              <div class="col">
                <h5>Stok Gudang</h5>
              </div>
            </div>

            <template v-if="loaded && datas.length !== 0">
              <div class="table-responsive">
                <table class="table center-aligned-table">
                  <thead>
                    <tr>
                      <th class="pl-0 border-bottom-0">Gudang</th>
                      <th class="pl-0 border-bottom-0">Jenis Barang</th>
                      <th class="pl-0 border-bottom-0">Total Dus</th>
                      <th class="pl-0 border-bottom-0">Total Pcs</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="d in datas" :key="d.id">
                      <td class="pl-0">
                        <router-link :to="{ name: 'stock-list', params: { id: d.id } }">
                          [{{ d.code }}] {{ d.name }}
                        </router-link>
                      </td>
                      <td class="pl-0">{{ d.stocks.length }}</td>
                      <td class="pl-0">{{ d.stocks.reduce((acc, s) => acc + s.qty, 0) }}</td>
                      <td class="pl-0">{{ d.stocks.reduce((acc, s) => acc + s.qty_pcs, 0) }}</td>
                    </tr>
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
  name: 'StockWarehouse',
  data () {
    return {
      datas: [],
      loaded: false,
      currentPage: 1,
      totalRows: 0,
      perPage: 5,
      errorApi: false
    }
  },
  mounted () {
    this.getData()
  },
  methods: {
    getData () {
      let self = this
      self.$http
        .get('admin/warehouse?page=' + self.currentPage)
        .then(resp => {
          self.loaded = true
          self.totalRows = resp.data.meta.total
          self.datas = resp.data.data
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    pageChange (page) {
      this.currentPage = page
      this.loaded = false
      this.getData()
    }
  }
}
</script>
