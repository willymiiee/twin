<template>
  <section class="depot-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Depo</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input id="name" v-model.trim="data.name"></b-form-input>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Gudang" label-for="warehouse_id">
                <b-form-select
                  v-model="data.warehouse_id"
                  :options="warehouses"
                />
                <p
                  v-show="'warehouse_id' in this.error"
                  class="text-danger"
                >{{ this.error.warehouse_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Alamat" label-for="address">
                <b-form-textarea
                  v-model="data.address"
                  placeholder="Alamat Lengkap"
                  :rows="3"
                  :max-rows="6"
                />
                <p v-show="'address' in this.error" class="text-danger">{{ this.error.address }}</p>
              </b-form-group>

              <b-form-group horizontal label="Nomor Telepon" label-for="phone">
                <b-form-input id="phone" v-model.trim="data.phone"></b-form-input>
                <p v-show="'phone' in this.error" class="text-danger">{{ this.error.phone }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kode Pos" label-for="zipcode">
                <b-form-input id="zipcode" v-model.trim="data.zipcode"></b-form-input>
                <p v-show="'zipcode' in this.error" class="text-danger">{{ this.error.zipcode }}</p>
              </b-form-group>

              <b-form-group horizontal label="Provinsi" label-for="province_id">
                <b-form-select
                  v-model="data.province_id"
                  :options="provinces"
                  @change="getRegion('district', $event)"
                />
                <p
                  v-show="'province_id' in this.error"
                  class="text-danger"
                >{{ this.error.province_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kabupaten" label-for="district_id">
                <b-form-select
                  v-model="data.district_id"
                  :options="districts"
                  @change="getRegion('subdistrict', $event)"
                />
                <p
                  v-show="'district_id' in this.error"
                  class="text-danger"
                >{{ this.error.district_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kecamatan" label-for="subdistrict_id">
                <b-form-select
                  v-model="data.subdistrict_id"
                  :options="subdistricts"
                  @change="getRegion('village', $event)"
                />
                <p
                  v-show="'subdistrict_id' in this.error"
                  class="text-danger"
                >{{ this.error.subdistrict_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kelurahan" label-for="village_id">
                <b-form-select v-model="data.village_id" :options="villages"/>
                <p
                  v-show="'village_id' in this.error"
                  class="text-danger"
                >{{ this.error.village_id }}</p>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitDepot"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'depot-list' }">
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
  name: 'DepotForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      edit: false,
      data: {
        warehouse_id: null,
        name: null,
        address: null,
        latitude: null,
        longitude: null,
        phone: null,
        province_id: null,
        district_id: null,
        subdistrict_id: null,
        village_id: null,
        zipcode: null
      },
      warehouses: [],
      provinces: [],
      districts: [],
      subdistricts: [],
      villages: [],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getWarehouses()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.edit = true
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getWarehouses () {
      let self = this
      self.$http
        .get('admin/warehouse?page=all')
        .then(resp => {
          self.warehouses = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    getRegion(type, event = null) {
      let parentId = null
      if (event) parentId = event
      let self = this
      self.type = type
      self.$http
        .get('region?type=' + self.type + '&parent_id=' + parentId)
        .then(resp => {
          const data = resp.data.map(u => {
            return { value: u.id, text: u.name }
          })
          if (self.type == 'province') self.provinces = data
          else if (self.type == 'district') {
            self.districts = data
            self.subdistricts = []
            self.villages = []
          } else if (self.type == 'subdistrict') {
            self.subdistricts = data
            self.villages = []
          } else if (self.type == 'village') self.villages = data
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    getData() {
      let self = this
      self.$http
        .get('admin/depot/' + self.$route.params.id)
        .then(resp => {
          resp.data.data.warehouse_id = resp.data.data.warehouse ? resp.data.data.warehouse.id : null
          resp.data.data.province_id = resp.data.data.province ? resp.data.data.province.id : null
          resp.data.data.district_id = resp.data.data.district ? resp.data.data.district.id : null
          resp.data.data.subdistrict_id = resp.data.data.subdistrict
            ? resp.data.data.subdistrict.id
            : null
          resp.data.data.village_id = resp.data.data.village ? resp.data.data.village.id : null

          setTimeout(() => {
            self.getRegion('district', resp.data.data.province_id)
            setTimeout(() => {
              self.getRegion('subdistrict', resp.data.data.district_id)
              setTimeout(() => {
                self.getRegion('village', resp.data.data.subdistrict_id)
              }, 100)
            }, 100)
          }, 100)

          delete resp.data.data.warehouse
          delete resp.data.data.province
          delete resp.data.data.district
          delete resp.data.data.subdistrict
          delete resp.data.data.village
          delete resp.data.data.team
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

    submitDepot() {
      let self = this
      const url =
        'admin/depot' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'depot-list' })
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
