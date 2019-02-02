<template lang="html">
  <section class="dashboard">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Selamat datang, {{ this.name }}!</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="js">
export default {
  name: 'dashboard',
  data () {
    return {
      name: null
    }
  },
  mounted () {
    this.name = localStorage.userName
  }
}
</script>

<style scoped lang="scss">
</style>
