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
            <div 
            class="card" 
            v-for="(post, index) in posts"
            :key="index"
            >
                <div 
                class="card-img"
                v-if="post.img_path"
                >
                    <img 
                    :src="post.img_path"
                    :alt="post.title"
                    >
                </div>
                <div 
                class="card-img fallback"
                v-else
                >
                    <img 
                    src="/fallback-images/posts-fallback.jpg"
                    alt="immagine segnaposto"
                    >
                </div>

                <div class="card-body">
                    <h4>
                        Titolo:
                        {{post.title}}
                    </h4>

                    <p v-if="post.category">
                        Categoria:
                        {{post.category.name}}
                    </p>
                    <p v-else>
                        Categoria: -
                    </p>
                    
                    <p v-if="post.tags.length > 0">
                        Tag:
                        <span
                        v-for="(tag, index) in post.tags"
                        :key="index"
                        >
                            {{tag.name}} |
                        </span>
                    </p>
                    <p v-else>
                        Tag: -
                    </p>

                    <p>
                        {{truncateText(post.description, 30)}}    
                    </p>

                    <a href="#">
                        Leggi di più
                    </a>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
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
        },
        truncateText(text, maxlength) {
            if (text.length < maxlength) {
                return text;
            } else {
                return text.substring(0, maxlength) + '...';
            }
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
            .card {
                display: flex;
                flex-direction: column;
                flex-basis: calc((100% / 3) - 1rem);
                height: 500px;
                border: 1px solid black;
                border-radius: .5rem;
                .card-img {
                    height: 50%;
                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        object-position: center;
                    }
                }
                a {
                    text-decoration: none;
                }
            }
        }
    }
</style>