<script>
export default {
  name: 'activate',
  mounted() {
    const token = this.$route.params.token
    this.$http.get('activate/' + token)
      .then(res => {
        localStorage.userActivated = true
        this.$router.push({ name: 'login' })
      })
      .catch(err => {
        console.log(err)
      })
  }
}
</script>
