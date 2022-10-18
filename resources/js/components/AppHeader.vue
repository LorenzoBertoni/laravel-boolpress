<template>
    <header>
        <nav class="guest-navbar">
            <ul>
                <li 
                v-for="(link, index) in navLinks"
                :key="index"
                >
                    <router-link :to="{name: link.link}">
                        {{link.label}}
                    </router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'AppHeader',
    data() {
        return {
           navLinks:    [
                            {
                                label: 'Home Page',
                                link: 'home'
                            },   
                            {
                                label: 'Vai ai Post',
                                link: 'posts'
                            },   
                            {
                                label: 'Contatti',
                                link: 'contacts'
                            }
                        ]
        }
    }
}
</script>

<style lang="scss" scoped>
    .guest-navbar {
        margin: 1rem 0;
        ul {
            list-style: none;
            display: flex;
            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        }
    }
</style>