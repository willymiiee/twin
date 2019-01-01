<template lang="html">
  <b-navbar class="fixed-top" toggleable="md" type="dark" variant="info">
    <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a href="#" class="navbar-brand brand-logo">{{ company }}</a>
      <!-- <a class="navbar-brand brand-logo" href="#"><img src="../../assets/images/logo.svg" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="../../assets/images/logo-mini.svg" alt="logo"/></a> -->
    </div>
    <b-collapse is-nav id="nav_collapse">
      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <template slot="button-content">
            <img class="img-xs rounded-circle" src="../../assets/images/faces-clipart/pic-1.png" alt="profile image">
          </template>
          <b-dropdown-item href="#">Profil</b-dropdown-item>
          <b-dropdown-item @click="logout">Keluar</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script lang="js">
export default {
  name: 'app-header',
  data() {
    return {
      company: null
    }
  },
  mounted() {
    this.company = localStorage.company
  },
  methods: {
    logout() {
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

<style scoped lang="scss">
.navbar-brand {
  font-size: 1.1rem!important;
}
</style>
