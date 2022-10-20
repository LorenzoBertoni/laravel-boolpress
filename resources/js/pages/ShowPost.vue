<template>
    <div class="container mt-5">
        <div 
        class="card"
        v-if="post"
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

                <h5>
                    Slug:
                    {{post.slug}}
                </h5>

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
                    Contenuto:
                    {{post.description}}    
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ShowPost',
    data() {
        return {
            post: null
        }
    },
    methods: {
        getPostSlug() {
            const slug = this.$route.params.slug;

            axios.get('/api/posts/' + slug)
            .then(response => {
                this.post = response.data.result;
            });
        }
    },
    mounted() {
        this.getPostSlug();
    }
}
</script>

<style>

</style>