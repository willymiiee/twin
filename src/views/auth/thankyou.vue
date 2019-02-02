<template>
  <section class="thankyou">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col">
                  <h2 class="mb-3">Terima kasih!</h2>
                  <h3 class="font-weight-light">Berikut adalah tautan aktivasi akun anda</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                  <router-link class="text-white font-weight-medium" :to="{ name: 'activate', params: { token: token } }">{{ url }}</router-link>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                  <router-link class="text-white font-weight-medium" :to="{ name: 'login' }">Kembali ke halaman login</router-link>
                </div>
              </div>
              <!-- <div class="row mt-5">
                <div class="col-12 mt-xl-2">
                  <p class="text-white font-weight-medium text-center">Copyright &copy; 2018  All rights reserved.</p>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </section>
</template>

<script>
export default {
  name: 'thankyou',
  data () {
    return {
      token: null,
      url: null
    }
  },
  mounted () {
    this.token = localStorage.activationToken
    this.url = process.env.VUE_APP_APP_URL + 'activate/' + this.token
  }
}
</script>
