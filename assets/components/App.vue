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
        <div class="col-12">
          <button>Convert</button>
        </div>
      </div>
    </form>
    <p>{{ result }}</p>
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

.wrapper {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
}

.wrapper > .col-12 {
  flex: 1 1 100%;
}

.wrapper > .col-6 {
  flex: 1 1 50%;
}

.wrapper > .col-4 {
  flex: 1 1 33%;
}

.wrapper > .col-3 {
  flex: 1 1 25%;
}
</style>