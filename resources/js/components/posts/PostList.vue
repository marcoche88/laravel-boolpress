<template>
  <div>
    <h2>Lista dei post</h2>
    <PostCard v-for="post in posts" :key="post.id" :post="post" />
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";

export default {
  name: "PostList",
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
      uri: "http://127.0.0.1:8000/api/posts",
    };
  },
  methods: {
    getPost() {
      axios
        .get(`${this.uri}`)
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.getPost();
  },
};
</script>

<style>
</style>