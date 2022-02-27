<template>
    <section>
        <h2>Lista post</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h3>{{post.title}}</h3>
                <p v-if="post.category"><strong>Categoria</strong>: {{post.category.name}} </p>
                <div v-if="post.tags.length > 0">
                    <strong>Tag</strong>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.id">
                            {{tag.name}}
                        </li>
                    </ul>
                </div>
                <p>{{post.content}}</p>
                <button><router-link :to="{ name: 'single-post', params: { slug:post.slug } }">Visualizza post</router-link></button>
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