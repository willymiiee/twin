<template>
  <section class="store-detail">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Toko</h5>

            <form v-if="loaded" class="forms-sample row">
              <div class="col-6">
                <b-form-group horizontal label="Nama" label-for="name">
                  <b-form-input id="name" v-model.trim="data.name"></b-form-input>
                  <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
                </b-form-group>

                <b-form-group horizontal label="Nomor Account" label-for="acc_number">
                  <b-form-input id="acc_number" v-model.trim="data.acc_number"></b-form-input>
                  <p
                    v-show="'acc_number' in this.error"
                    class="text-danger"
                  >{{ this.error.acc_number }}</p>
                </b-form-group>

                <b-form-group horizontal label="Kode Mars" label-for="mars_code">
                  <b-form-input id="mars_code" v-model.trim="data.mars_code"></b-form-input>
                  <p
                    v-show="'mars_code' in this.error"
                    class="text-danger"
                  >{{ this.error.mars_code }}</p>
                </b-form-group>

                <b-form-group horizontal label="Pemilik" label-for="key_person">
                  <b-form-input id="key_person" v-model.trim="data.key_person"></b-form-input>
                  <p
                    v-show="'key_person' in this.error"
                    class="text-danger"
                  >{{ this.error.key_person }}</p>
                </b-form-group>
              </div>

              <div class="col-6">
                <b-form-group horizontal label="Tipe" label-for="type">
                  <b-form-select v-model="data.type" :options="types"/>
                  <p v-show="'type' in this.error" class="text-danger">{{ this.error.type }}</p>
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
              </div>

              <div class="col-12">
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
              </div>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitStore"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'store-list' }">
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
  name: 'StoreForm',
  data() {
    return {
      label: 'Daftarkan',
      loaded: true,
      submit: false,
      data: {
        name: null,
        acc_number: null,
        mars_code: null,
        key_person: null,
        address: null,
        type: null,
        latitude: null,
        longitude: null,
        phone: null,
        province_id: null,
        district_id: null,
        subdistrict_id: null,
        village_id: null,
        zipcode: null
      },
      types: ['R1', 'R2', 'W', 'MM', 'KOP', 'HRC'],
      regionType: 'province',
      provinces: [],
      districts: [],
      subdistricts: [],
      villages: [],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.types = this.types.map(t => {
      return { value: t, text: t }
    })
    this.getRegion(this.regionType)
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    getRegion(type, event = null) {
      let parentId = null
      if (event) parentId = event
      let self = this
      self.regionType = type
      self.$http
        .get('region?type=' + self.regionType + '&parent_id=' + parentId)
        .then(resp => {
          const data = resp.data.map(u => {
            return { value: u.id, text: u.name }
          })
          if (self.regionType == 'province') self.provinces = data
          else if (self.regionType == 'district') {
            self.districts = data
            self.subdistricts = []
            self.villages = []
          } else if (self.regionType == 'subdistrict') {
            self.subdistricts = data
            self.villages = []
          } else if (self.regionType == 'village') self.villages = data
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
        .get('admin/store/' + self.$route.params.id)
        .then(resp => {
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

          delete resp.data.data.province
          delete resp.data.data.district
          delete resp.data.data.subdistrict
          delete resp.data.data.village
          delete resp.data.data.created_at
          delete resp.data.data.created_by
          delete resp.data.data.updated_at
          delete resp.data.data.updated_by
          delete resp.data.data.deleted_at
          delete resp.data.data.deleted_by

          self.data = resp.data.data
          console.log(self.data)
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },

    submitStore() {
      let self = this
      const url =
        'admin/store' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'store-list' })
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
