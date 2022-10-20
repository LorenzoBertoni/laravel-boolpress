<template>
    <div class="container mt-5">
        <h1>Contattaci:</h1>

        <form>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" v-model="name">
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" v-model="email">
            
            <label for="message">Messaggio</label>
            <input type="text" id="message" name="message" v-model="message">
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