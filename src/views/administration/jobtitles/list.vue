<template>
  <section class="job-title-list">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row card-title mb-4">
              <div class="col">
                <h5>Daftar Jabatan</h5>
              </div>

              <div class="col">
                <router-link
                  class="btn btn-primary btn-sm float-right"
                  :to="{ name: 'jobtitle-form', params: { id: 'add' } }"
                >Buat Jabatan Baru</router-link>
              </div>
            </div>

            <template v-if="loaded && datas.length !== 0">
              <div class="table-responsive">
                <table class="table center-aligned-table">
                  <thead>
                    <tr>
                      <th class="pl-0 border-bottom-0">Nama</th>
                      <th class="pl-0 border-bottom-0">Departemen</th>
                      <th class="pl-0 border-bottom-0">Lokasi</th>
                      <th class="text-right border-bottom-0"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="d in datas" :key="d.id">
                      <td class="pl-0">{{ d.name }}</td>
                      <td class="pl-0">{{ d.department.name }}</td>
                      <td class="pl-0">{{ d.location.name }}</td>
                      <td class="pr-0 text-right">
                        <router-link
                          class="btn btn-outline-success btn-sm"
                          :to="{ name: 'jobtitle-form', params: { id: d.id } }"
                        >Detil</router-link>
                      </td>
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
  name: 'JobTitleList',
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
    getData() {
      let self = this
      self.$http
        .get('admin/jobtitle?page=' + self.currentPage)
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

    pageChange(page) {
      this.currentPage = page
      this.loaded = false
      this.getData()
    }
  }
}
</script>
