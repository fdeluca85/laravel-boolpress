<template>
  <header>
      <h2>BoolPress- Blog di ricette</h2>
      <a href="/admin/home">Area riservata</a>
      <nav>
        <li>
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'about' }">Chi siamo</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'categories' }">Categorie</router-link>
        </li>
        
      </nav>
  </header>
</template>

<script>
export default {
    name:"Header"
}
</script>

<style>
header{
  background-color: aquamarine;
}

</style>