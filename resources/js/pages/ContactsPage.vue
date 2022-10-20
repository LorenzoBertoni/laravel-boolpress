<template>
    <div class="container mt-5">
        <h1>Contattaci:</h1>

        <form @submit.prevent="sendEmail">
            <div class="form-group">
                <label for="name">Nome</label>
                <input 
                type="text"
                id="name"
                class="form-control"
                v-model="name"
                >
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input
                type="email"
                id="email"
                class="form-control"
                v-model="email"
                >
            </div>
            
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea
                id="message"
                class="form-control"
                v-model="message"
                ></textarea>
            </div>
            
            <button 
            type="submit"
            class="btn btn-primary"
            >
                Invia
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'ContactsPage',
    data() {
        return {
            name: '',
            email: '',
            message: ''
        }
    },
    methods: {
        sendEmail() {
            axios.post('/api/contacts', {
                name: this.name,
                email: this.email,
                message: this.message
            }).then(response => {
                console.log(response);
            });
        }
    }
}
</script>

<style>
    
</style>