const {createApp} = Vue;

createApp({
  data() {  
    return {
      apiUrl: 'server.php',
      discs: []
      
    }
  },

  methods: {
    getDiscs() {
      axios
        .get(this.apiUrl)
        .then((response) => {
          console.log(response.data);
          this.discs = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  
  mounted() {
    this.getDiscs();
  }
      
}).mount('#app');      