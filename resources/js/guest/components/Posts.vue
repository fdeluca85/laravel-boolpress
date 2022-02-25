<template>
    <section>
        <h2>Lista post</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                {{post.title}}
            </li>
        </ul>
    </section>
  
</template>

<script>
export default {
    name:"Posts",
    data () {
        return {
            posts: []
        }
    },
    created(){
        axios.get("/api/posts")
            .then( (respose) => {
                this.posts = respose.data;
            });
    }

}
</script>

<style>

</style>