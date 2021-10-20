<template>
  <div class="loader d-flex justify-content-center align-items-center">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style lang="scss" scoped>
.loader {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
  .spinner-border {
    width: 100px;
    height: 100px;
  }
}
</style>