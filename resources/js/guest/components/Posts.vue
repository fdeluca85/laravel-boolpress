<template>
    <section>
        <div>
            <h2>Lista post</h2>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    <h3>{{post.title}}</h3>
                    <img class="foto" :src="`/storage/${post.image}`" :alt="'Immagine che ritrae ' + post.title">
                    <p class="categoria" v-if="post.category">{{post.category.name}} </p>
                    
                    <p>{{post.content}}</p>
                    <button><router-link :to="{ name: 'single-post', params: { slug:post.slug } }">Continua a leggere</router-link></button>
                </li>
            </ul>
        </div>
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

<style  lang='scss' scoped>

button{
    border: none;
    margin-top: 1em;
    padding: 1em 3em;
    background-color:#1A2643;
    border-radius: 25px;
    
        a{
            color: beige;
            font-size: 1.2em;
            font-weight: 500;
        }        
}
button:hover{
            background-color: #fff;
            
            a{
                color: #1A2643;
            }
        }

img{
        height: 150px;
}
.categoria{
    background-color:aquamarine;
    width: fit-content;
    padding: .1em .8em;
    font-size: 0.8em;
    border-radius: 15px;
}
</style>