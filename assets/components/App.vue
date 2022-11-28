<template>
  <div>
    <h2 class="center">Number Converter</h2>
    <form method="post" onsubmit="convertNumber">
      <div>
        <label for="number">Number to convert</label>
        <input type="number" name="number" id="number">
      </div>
      <div>
        <label for="language">language</label>
        <input type="text" name="language" id="language">
      </div>
      <button>Convert</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {

    };
  },
  mounted() {

  },

  methods: {
    convertNumber: function (e) {
      console.log("convert", e.target.number, e.target.language);
    }
  }
};
</script>

<style>
.center {
  text-align: center;
}
</style>