<template>
  <div 
    class="card"
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
</template>

<script>
export default {
    name: 'SinglePost',
    props: {
        post: Object
    },
    methods: {
        truncateText(text, maxlength) {
            if (text.length < maxlength) {
                return text;
            } else {
                return text.substring(0, maxlength) + '...';
            }
        }
    }
}
</script>

<style lang="scss" scoped>
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
</style>