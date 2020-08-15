var app = new Vue({
  el: '#app',
  data: {
    message: '',
    error: true,
    usuarios: []
  },
  methods: {
    reverseMessage: function () {
      this.error = true
    }
  },
  created() {
    axios
      .get('http://localhost/app_licencias/sistema/usuarios_get')
      .then(response => {
        this.usuarios = response.data.data
        this.error = true
      })
      .catch(error => {
        console.log(error)
        this.message = error
      })
      .finally(() => this.loading = false)
  }
})