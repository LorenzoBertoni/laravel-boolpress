<template>
    <div class="container mt-5">
        <div class="jumbotron">
              <h1>Home Page</h1>

              <p>Benvenuto in Boolpress!</p>
              <p>Clicca su "Vai ai post" per vedere i post disponibili</p>
              <p>Oppure contattaci nella sezione "contatti"</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HomePage'
}
</script>

<style lang="scss" scoped>
    .jumbotron {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      .h1 {
        font-size: 50px;
        color: #000;
      }

      p {
        font-style: italic;
        font-size: 20px;
        text-align: center;
      }
    }
</style>