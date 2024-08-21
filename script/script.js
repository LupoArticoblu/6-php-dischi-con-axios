const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      discs: [],
      filteredDiscs: [],
      genres: [],
      selectedGenre: 'All',
      singleDisc: {},
      showModal: false
    };
  },
  methods: {
    getDiscs() {
      axios
        .get(this.apiUrl)
        .then((response) => {
          this.discs = response.data;
          this.filteredDiscs = this.discs; // Mostra tutti i dischi inizialmente
          this.extractGenres(); // Estrai i generi unici dai dischi
        })
        .catch((error) => {
          console.log(error);
        });
    },
    extractGenres() {
      this.genres = [...new Set(this.discs.map(disc => disc.genre))];
    },
    filterDiscs() {
      if (this.selectedGenre === 'All') {
        this.filteredDiscs = this.discs;
      } else {
        this.filteredDiscs = this.discs.filter(disc => disc.genre === this.selectedGenre);
      }
    },
    openModal(index) {
      const params = {
        discIndex: index
      };
      axios
        .get(this.apiUrl, { params })
        .then((response) => {
          this.singleDisc = response.data;
          this.showModal = true;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  mounted() {
    this.getDiscs(); // Carica i dischi quando il componente viene montato
  }
}).mount('#app');