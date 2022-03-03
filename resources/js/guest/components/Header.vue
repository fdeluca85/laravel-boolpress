<template>
  <header>
      <div class="container">
        <div class="top-header">
          <h1>BoolPress - Blog di ricette</h1>
          <button><a href="/admin/home">Area riservata</a></button>
        </div>
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
      </div>
  </header>
</template>

<script>
export default {
    name:"Header"
}
</script>

<style  lang='scss' scoped>
header{
  background-color: #005F73;
  line-height: 1em;
  padding-top: 1em;
  h1{
    color: beige;
    font-family: 'Indie Flower', cursive;
  }
}
button{
  border: none;
  padding: 1em;
  
  background-color: #94d2bd;
    a{color: #1A2643;
    font-size: 1.2em;}

}
nav{
  display: flex;  
  justify-content: space-evenly;
  padding: 1em;
  a{
    color: beige;
    font-size: 1.2em;
    text-transform: uppercase;
  }
  li{
    list-style: none;
  }

}
.top-header{
  padding: 1em 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

</style>