<template>
    <main>
        <h1>Post:</h1>

        <nav>
            <ul class="pagination">
                <li 
                class="page-item"
                :class="(currentPage == 1)?'disabled':''"
                >
                    <a 
                    class="page-link"
                    href="#"
                    @click.prevent="getPosts(currentPage - 1)"
                    >
                        Previous
                    </a>
                </li>
                 <li class="page-item disabled">
                    <span class="page-link">
                        {{currentPage}}/{{lastPage}}
                    </span>
                 </li>
                <li 
                class="page-item"
                :class="(currentPage == lastPage)?'disabled':''"
                >
                    <a 
                    class="page-link"
                    href="#"
                    @click.prevent="getPosts(currentPage + 1)"
                    >
                        Next
                    </a>
                </li>
            </ul>
        </nav>

        <div 
        class="load-in-progress"
        v-if="isLoading"
        >
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div 
        class="posts"
        v-else
        >
            <SinglePost
            v-for="(post, index) in posts"
            :key="index"
            :post="post"
            />
        </div>
    </main>
</template>

<script>
import SinglePost from '../components/SinglePost.vue';

export default {
    name: 'AppMain',
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: null,
            lastPage: null
        }
    },
    components: {
        SinglePost
    },
    methods: {
        getPosts(page) {
            axios.get('/api/posts', {
                params: {
                    page: page
                }
            })
            .then(response => {
                this.posts = response.data.result.data;
                this.isLoading = false;
                this.currentPage = response.data.result.current_page;
                this.lastPage = response.data.result.last_page;
            })
        }
    },
    mounted() {
        this.getPosts(1);
    }
}
</script>

<style lang="scss" scoped>
    main {
        width: 70%;
        margin: 3rem auto;
        h1 {
            margin-bottom: 2rem;
            color: #000;
        }
        .load-in-progress {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            div {
                width: 150px;
                height: 150px;
            }
        }
        .posts {
            display: flex;
            flex-flow: row wrap;
            gap: 1rem;
        }
    }
</style>