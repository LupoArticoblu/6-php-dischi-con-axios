<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.4/axios.min.js' integrity='sha512-6VJrgykcg/InSIutW2biLwA1Wyq+7bZmMivHw19fI+ycW0jIjsadm8wKQQLlfv3YUS4owfMDlZU38NtaAK6fSg==' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="./css/style.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.38/vue.global.js' integrity='sha512-B4Vi3lDoGX3hJG09PmOxQoi5xcFjo8edRBVyy4oZdv9cwe8aE2jjNp2O7U/DgvOsQnq+hOfE9/RXCYuXXzJGTw==' crossorigin='anonymous'></script>
  <title>Document</title>
</head>
<body>

  <div id="app">
    <header>
      <div class="container" id="header-container">
        <div class="left-header">
          <img src="https://pluspng.com/img-png/spotify-logo-png-open-2000.png" alt="Spotify logo">
        </div>

        <div class="right-header">
          <select name="genere" id="genre-select" v-model="selectedGenre" @change="filterDiscs">
            <option value="All">All</option>
            <option v-for="genre in genres" :key="genre" :value="genre">{{ genre }}</option>
          </select>
        </div>
      </div>
    </header>

    <main>
      <div class="container" id="main-container">
        <div id="album-container"> 
        <!--disco-->
          <div v-for="(disc, index) in filteredDiscs" :key="index" @click="openModal(index)" class="disc">
            <img :src="disc.poster" :alt="disc.title">
            <h2>{{ disc.title }}</h2>
            <small>{{ disc.author }}</small>
          </div>
        </div>

        <!-- modal dettaglio-->
        <div v-if="showModal" id="modal-container">
          <div class="disc single-disc">
            <img :src="singleDisc.poster" :alt="singleDisc.title">
            <h2>{{singleDisc.title}}</h2>
            <small>{{singleDisc.author}}</small>
            <small>{{singleDisc.year}}</small>
            <strong>{{singleDisc.genre}}</strong>
            <div class="btn-container">
              <button @click="showModal = false" class="close-btn">X</button> 
            </div>
          </div>
        </div>
        

      </div>
    </main>  
  </div>
  
  <script src="./script/script.js"></script>
</body>
</html>