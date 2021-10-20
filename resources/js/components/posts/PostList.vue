<template>
  <div>
    <h2>Lista dei post</h2>
    <!-- loader -->
    <Loader v-if="isLoading" />

    <!-- card list -->
    <PostCard v-else v-for="post in posts" :key="post.id" :post="post" />

    <!-- pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li
          class="page-item"
          v-if="pagination.currentPage > 1"
          @click="getPosts(pagination.currentPage - 1)"
        >
          <a class="page-link" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li
          class="page-item"
          :class="pagination.currentPage === n ? 'active' : ''"
          v-for="n in pagination.lastPage"
          :key="n"
          @click="getPosts(n)"
        >
          <a class="page-link">{{ n }}</a>
        </li>
        <li
          class="page-item"
          v-if="pagination.currentPage < pagination.lastPage"
          @click="getPosts(pagination.currentPage + 1)"
        >
          <a class="page-link" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";

export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
  },
  data() {
    return {
      posts: [],
      uri: "http://127.0.0.1:8000/api/posts",
      pagination: {},
      isLoading: false,
    };
  },
  methods: {
    getPosts(page) {
      this.isLoading = true;
      axios
        .get(`${this.uri}?page=${page}`)
        .then((res) => {
          //   destructuring
          const { data, current_page, last_page } = res.data;

          this.posts = data;
          this.pagination = {
            currentPage: current_page,
            lastPage: last_page,
          };
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style scoped>
.page-item {
  cursor: pointer;
}
</style>