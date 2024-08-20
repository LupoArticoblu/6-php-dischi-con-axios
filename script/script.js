const {createApp} = Vue;

createApp({
  data() {  
    return {
      apiUrl: 'server.php',
      discs: [],
      singleDisc: {},
      showModal: false
    }
  },

  methods: {
    getDiscs() {
      axios
        .get(this.apiUrl)
        .then((response) => {
          this.discs = response.data;
          console.log(this.discs);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openModal(index) {
      const params = {
        discIndex: index
      }
      axios
        .get(this.apiUrl, {params})
        .then(response => {
          this.singleDisc = response.data;
          this.showModal = true;
          console.log(this.singleDisc);
          
        })
        .catch(error => {
          console.log(error);
        }
      )
    }
  },
  
  mounted() {
    this.getDiscs();
  }
      
}).mount('#app');      