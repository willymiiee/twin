<template lang="html">

  <section class="app-sidebar">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="profile-image"> <img src="../../assets/images/faces-clipart/pic-1.png" alt="image"/> <span class="online-status online"></span> </div>
            <div class="profile-name">
              <p class="name">{{ name }}</p>
              <p class="designation">{{ jobTitle }}</p>
            </div>
          </div>
        </li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'dashboard' }"><i class="fa fa-fw fa-tachometer mr-2"></i> <span class="menu-title ml-2">Dasbor</span></router-link></li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle.administration>
            <i class="fa fa-fw fa-book mr-2"></i> <span class="menu-title ml-2">Administrasi</span> <i class="menu-arrow"></i>
          </span>
          <b-collapse id="administration" visible accordion="myAccordion">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'location-list' }">Lokasi</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'department-list' }">Departemen</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'jobtitle-list' }">Jabatan</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'principal-list' }">Principal</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'warehouse-list' }">Gudang</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'depot-list' }">Depo</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'team-list' }">Tim</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'region-list' }">Daerah</router-link></li>
            </ul>
          </b-collapse>
        </li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'trip-list' }"><i class="fa fa-fw fa-calendar mr-2"></i> <span class="menu-title ml-2">Perjalanan</span></router-link></li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'store-list' }"><i class="fa fa-fw fa-home mr-2"></i> <span class="menu-title ml-2">Toko</span></router-link></li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'item-list' }"><i class="fa fa-fw fa-archive mr-2"></i> <span class="menu-title ml-2">Barang</span></router-link></li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'user-list' }"><i class="fa fa-fw fa-user mr-2"></i> <span class="menu-title ml-2">Karyawan</span></router-link></li>
        <li class="nav-item"><div class="nav-link" @click="logout"><i class="fa fa-fw fa-sign-out mr-2"></i> <span class="menu-title ml-2">Keluar</span></div></li>
      </ul>
    </nav>
  </section>

</template>

<script lang="js">
export default {
  name: 'app-sidebar',
  data () {
    return {
      name: null,
      jobTitle: null
    }
  },
  mounted () {
    this.name = localStorage.userName
    this.jobTitle = localStorage.jobTitle
  },
  methods: {
    logout () {
      let self = this
      localStorage.removeItem('token')
      localStorage.removeItem('userName')
      localStorage.removeItem('userEmail')
      localStorage.removeItem('company')
      localStorage.removeItem('jobTitle')
      self.$router.push({ name: 'login' })
    }
  }
}
</script>
