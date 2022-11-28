<template>
  <div>
    <h2 class="center">Number Converter</h2>
    <form method="post" v-on:submit.prevent="convertNumber">
      <div class="wrapper">
        <div class="col-6">
          <label for="number">Number to convert</label>
          <input type="number" name="number" id="number" v-model="number">
        </div>
        <div class="col-6">
          <label for="language">language</label>
          <select name="language" id="language" v-model="language">
            <option v-for="item in languages" :key="item.key" :value="item.key">{{ item.name }}</option>
          </select>
        </div>
        <div class="col-12 center">
          <button class="button">Convert</button>
        </div>
      </div>
    </form>
    <div class="col-12 center">
      <p class="result">{{ result }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      number: 0,
      language: "fa",
      languages: [
        {key: "fa", name: "persian"},
        {key: "en", name: "english"},
        {key: "es", name: "spanish"},
        {key: "fr", name: "french"},
        {key: "ar", name: "arabic"},
        {key: "tr", name: "turkish"},
        {key: "ru", name: "russian"},
        {key: "de", name: "german"},
        {key: "zh", name: "chinese"},
        {key: "br", name: "brazil"},
      ],
      result: ""
    };
  },
  mounted() {

  },

  methods: {
    convertNumber: function (e) {
      let self = this;
      axios.post("/api/number_converter", {language: this.language, number: this.number},
          {headers: {'Content-Type': 'application/json'}}).then(res => {
        self.result = res.data.spellout;
      }).catch(err => {
        console.log(err);
      })
    }
  }
};
</script>

<style>
.center {
  text-align: center;
}

.result {
  font-family: 'Roboto', sans-serif;
  font-size: 25px;
}
</style>