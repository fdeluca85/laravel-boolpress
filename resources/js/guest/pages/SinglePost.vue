<template>
  <div>
    <h2>{{post.title}}</h2>
    <img :src="`/storage/${post.image}`" :alt="'Immagine che ritrae ' + post.title">
    <p>{{post.content}}</p>
  </div>
</template>

<script> 
export default {
    name:"SinglePost",
    data(){
        return{
            post: {}
        }
    },
    created() {
        // console.log(this.$route.params.slug);
        axios.get(`/api/posts/${this.$route.params.slug}`)
        .then( (response) => {
            // console.log(response.data);
            this.post = response.data;
        }).catch( (error) =>{
            this.$router.push({name: "page-404"});
        })
    }
}
</script>

<style>

</style>