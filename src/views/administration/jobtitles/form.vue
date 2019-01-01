<template>
  <section class="job-title-add">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ this.label }} Jabatan</h5>

            <form v-if="loaded" class="forms-sample">
              <b-form-group horizontal label="Lokasi" label-for="locations">
                <b-form-select
                  v-model="data.location_id"
                  :options="locations"
                  @input="getDepartments(data.location_id)"
                />
                <p
                  v-show="'location_id' in this.error"
                  class="text-danger"
                >{{ this.error.location_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Departemen" label-for="departments">
                <b-form-select v-model="data.department_id" :options="departments"/>
                <p
                  v-show="'department_id' in this.error"
                  class="text-danger"
                >{{ this.error.department_id }}</p>
              </b-form-group>

              <b-form-group horizontal label="Nama" label-for="name">
                <b-form-input type="text" v-model="data.name" placeholder="Nama Jabatan"/>
                <p v-show="'name' in this.error" class="text-danger">{{ this.error.name }}</p>
              </b-form-group>

              <b-form-group horizontal label="Deskripsi" label-for="about">
                <b-form-textarea
                  v-model="data.about"
                  placeholder="Deskripsi Pekerjaan"
                  :rows="3"
                  :max-rows="6"
                />
                <p v-show="'about' in this.error" class="text-danger">{{ this.error.about }}</p>
              </b-form-group>

              <b-form-group horizontal label="Kepala Departemen" label-for="departmentHead">
                <b-form-radio-group v-model="data.is_dept_head">
                  <b-form-radio value="1">Ya</b-form-radio>
                  <b-form-radio value="0">Tidak</b-form-radio>
                </b-form-radio-group>
              </b-form-group>

              <b-form-group horizontal label="Hak Akses">
                <b-form-group label="Perusahaan" label-size="sm">
                  <!-- <b-form-checkbox v-model="allSelected[0]" :indeterminate="indeterminate" @change="toggleAll">
                    {{ allSelected[0] ? 'Un-select All' : 'Select All' }}
                  </b-form-checkbox>-->
                  <b-form-checkbox-group v-model="data.roles[0]">
                    <b-form-checkbox value="detail">Lihat Detail</b-form-checkbox>
                    <b-form-checkbox value="update">Ubah</b-form-checkbox>
                  </b-form-checkbox-group>
                </b-form-group>

                <b-form-group label="Lokasi" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[1]" :options="roleOptions"/>
                </b-form-group>

                <b-form-group label="Departemen" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[2]" :options="roleOptions"/>
                </b-form-group>

                <b-form-group label="Jabatan" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[3]" :options="roleOptions"/>
                </b-form-group>

                <b-form-group label="Karyawan" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[5]" :options="roleOptions"/>
                </b-form-group>

                <b-form-group label="Profil" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[6]">
                    <b-form-checkbox value="detail">Lihat Detail</b-form-checkbox>
                    <b-form-checkbox value="update">Ubah</b-form-checkbox>
                  </b-form-checkbox-group>
                </b-form-group>

                <b-form-group label="Perjalanan" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[7]" :options="roleOptions"/>
                </b-form-group>

                <b-form-group label="Toko" label-size="sm">
                  <b-form-checkbox-group v-model="data.roles[8]" :options="roleOptions"/>
                </b-form-group>
              </b-form-group>

              <b-button
                v-if="!submit"
                type="submit"
                variant="success"
                class="mr-2"
                @click.prevent="submitJobtitle"
              >{{ this.label }}</b-button>
              <b-button v-else disabled variant="success" class="mr-2">
                <i class="fa fa-spinner fa-pulse"></i>
              </b-button>
              <router-link :to="{ name: 'jobtitle-list' }">
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
  name: 'JobTitleForm',
  data() {
    return {
      label: 'Buat',
      loaded: true,
      submit: false,
      data: {
        location_id: null,
        department_id: null,
        name: null,
        about: null,
        is_dept_head: 0,
        roles: [[], [], [], [], [], [], [], [], [], []]
      },
      locations: [{ value: null, text: 'Silahkan pilih lokasi kantor', disabled: true }],
      departments: [{ value: null, text: 'Silahkan pilih nama departemen', disabled: true }],
      // allSelected: [
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      //   false,
      // ],
      // indeterminate: false,
      roleOptions: [
        { value: 'list', text: 'Lihat Daftar' },
        { value: 'detail', text: 'Lihat Detil' },
        { value: 'create', text: 'Buat' },
        { value: 'update', text: 'Ubah' },
        { value: 'delete', text: 'Hapus' }
      ],
      error: {},
      errorApi: false
    }
  },
  mounted() {
    this.getLocations()
    if (this.$route.params.id !== 'add') {
      this.loaded = false
      this.label = 'Ubah'
      this.getData()
    }
  },
  methods: {
    // toggleAll(checked) {
    //   console.log(this.data.roles[0])
    //   this.data.roles[0] = checked ? this.roleOptions.slice() : []
    //   console.log(this.data.roles[0])
    // },
    getLocations() {
      let self = this
      self.$http
        .get('admin/location?per_page=all')
        .then(resp => {
          let locations = resp.data.data.map(u => {
            return { value: u.id, text: u.name }
          })

          self.locations = self.locations.concat(locations)
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    getDepartments(locationId) {
      if (locationId) {
        let self = this
        self.departments = [{ value: null, text: 'Silahkan pilih nama departemen', disabled: true }]
        self.$http
          .get('admin/department?per_page=all&location_id=' + locationId)
          .then(resp => {
            let departments = resp.data.data.map(u => {
              return { value: u.id, text: u.name }
            })

            self.departments = self.departments.concat(departments)
          })
          .catch(err => {
            self.errorApi = true
            console.log(err)
          })
      } else {
        self.errorApi = true
      }
    },
    getData() {
      let self = this
      self.$http
        .get('admin/jobtitle/' + self.$route.params.id)
        .then(resp => {
          const response = resp.data.data
          self.getDepartments(response.location.id)
          self.data = {
            location_id: response.location.id,
            department_id: response.department.id,
            name: response.name,
            about: response.about,
            is_dept_head: response.is_dept_head,
            roles: response.roles.map(r => {
              let enabled = []
              r.list && enabled.push('list')
              r.detail && enabled.push('detail')
              r.create && enabled.push('create')
              r.update && enabled.push('update')
              r.delete && enabled.push('delete')
              return enabled
            })
          }
          self.loaded = true
        })
        .catch(err => {
          self.errorApi = true
          console.log(err)
        })
    },
    submitJobtitle() {
      let self = this
      const url =
        'admin/jobtitle' + (self.$route.params.id !== 'add' ? '/' + self.$route.params.id : '')
      self.submit = true
      self.data.roles = self.data.roles.map(r => {
        return {
          list: r.indexOf('list') != -1 ? 1 : 0,
          detail: r.indexOf('detail') != -1 ? 1 : 0,
          create: r.indexOf('create') != -1 ? 1 : 0,
          update: r.indexOf('update') != -1 ? 1 : 0,
          delete: r.indexOf('delete') != -1 ? 1 : 0
        }
      })

      const apiCall =
        self.$route.params.id !== 'add'
          ? self.$http.put(url, self.data)
          : self.$http.post(url, self.data)
      apiCall
        .then(resp => {
          self.error = {}
          self.$router.push({ name: 'jobtitle-list' })
        })
        .catch(err => {
          const errorResponse = err.response.data
          self.error = errorResponse.errors
          self.submit = false
        })
    }
  }
  // watch: {
  //   selected (newVal, oldVal) {
  //     // Handle changes in individual flavour checkboxes
  //     if (newVal.length === 0) {
  //       this.indeterminate = false
  //       this.allSelected[0] = false
  //     } else if (newVal.length === this.roleOptions.length) {
  //       this.indeterminate = false
  //       this.allSelected[0] = true
  //     } else {
  //       this.indeterminate = true
  //       this.allSelected[0] = false
  //     }
  //   }
  // }
}
</script>
