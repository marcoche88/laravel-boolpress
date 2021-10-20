<template>
  <div class="card my-4">
    <div class="card-header">
      Creato il: {{ getFormattedDate(post.created_at) }}, alle
      {{ getFormattedHour(post.created_at) }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ post.title }}</h5>
      <p class="card-text">{{ post.content }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: {
    post: Object,
  },
  methods: {
    getFormattedDate(date) {
      const d = new Date(date);
      let day = d.getDate();
      let month = d.getMonth() + 1;
      const year = d.getFullYear();

      if (day < 10) day = "0" + day;
      if (month < 10) month = "0" + month;

      return `${day}-${month}-${year}`;
    },
    getFormattedHour(date) {
      const d = new Date(date);
      let hours = d.getHours();
      let minutes = d.getMinutes();

      if (hours < 10) hours = "0" + hours;
      if (minutes < 10) minutes = "0" + minutes;

      return `${hours}:${minutes}`;
    },
  },
};
</script>

<style>
</style>