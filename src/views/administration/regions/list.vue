<template>
  <section class="location-list">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row card-title mb-4">
              <div class="col">
                <h5>Daftar Daerah</h5>
              </div>

              <div class="col">
                <b-button class="float-right" v-if="type !== 'province'" @click="back" variant="light">Kembali</b-button>
              </div>
            </div>

            <template v-if="loaded && datas.length !== 0">
              <div class="table-responsive">
                <table class="table center-aligned-table">
                  <thead>
                    <tr>
                      <th class="pl-0 border-bottom-0">Kode</th>
                      <th class="pl-0 border-bottom-0">Nama</th>
                      <th/>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="d in datas" :key="d.id">
                      <td class="pl-0">{{ d.id }}</td>
                      <td class="pl-0">{{ d.name }}</td>
                      <td class="pr-0 text-right">
                        <b-button
                          v-if="type !== 'village'"
                          @click="fetchChild(type, d.id)"
                          variant="success"
                        >{{ nextType }}</b-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
  name: 'RegionList',
  data () {
    return {
      type: 'province',
      nextType: 'Kabupaten',
      parentId: null,
      datas: [],
      loaded: false,
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
        .get('region?type=' + self.type + '&parent_id=' + self.parentId)
        .then(resp => {
          self.loaded = true
          self.datas = resp.data
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    fetchChild (type, parentId) {
      if (type === 'province') {
        this.type = 'district'
        this.nextType = 'Kecamatan'
      } else if (type === 'district') {
        this.type = 'subdistrict'
        this.nextType = 'Kelurahan'
      } else if (type === 'subdistrict') this.type = 'village'

      this.parentId = parentId
      this.getData()
    },
    back () {
      this.type = 'province'
      this.nextType = 'Kabupaten'
      this.parentId = null
      this.getData()
    }
  }
}
</script>
