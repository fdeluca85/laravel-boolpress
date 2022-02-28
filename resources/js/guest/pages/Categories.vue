<template>
  <div>
      <h1>Categorie</h1>
      
      <ul class="box">
          <li  class="card" v-for="category in categories" :key="category.id">
              <router-link :to="{name:'single-category', params: { slug:category.slug} }">{{category.name}}</router-link>
          </li>
      </ul>
  </div>
</template>

<script>
export default {
    name:"Categories",
    data(){
        return {
            categories: []
        }
    },
    created(){
        axios.get("/api/categories")
        .then((response) => {
            this.categories = response.data;
        });
    }

}
</script>

<style  lang='scss' scoped>
.box{
    display: flex;
    flex-wrap: wrap;
    gap: 2em;
    
}
.card{
    width: 10em;
    text-align: center;
}

</style>