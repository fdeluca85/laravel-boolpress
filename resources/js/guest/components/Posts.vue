<template>
    <section>
        <div>
            <ul class="box">
                <li class="card" v-for="post in posts" :key="post.id">
                    <h3>{{post.title}}</h3>
                    <img class="foto" :src="`/storage/${post.image}`" :alt="'Immagine che ritrae ' + post.title">
                    <p class="categoria" v-if="post.category">{{post.category.name}} </p>
                    
                    <div  class="intro">
                        <p v-html="post.content"></p>

                    </div>
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
    background-color:#005f73;
    border-radius: 25px;
    
        a{
            color: beige;
            font-size: 1.2em;
            font-weight: 500;
        }        
}
button:hover{
            background-color: #94d2bd;
            
            a{
                color: #1A2643;
            }
        }

img{
        height: 150px;
}
.categoria{
    border: 2px solid #94d2bd;
    width: fit-content;
    padding: .1em .8em;
    margin: 2em;
    font-size: 0.8em;
    color: #001219;
}
.intro{ 
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box !important;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  white-space: normal;
}
.box{
    display: flex;
    flex-wrap: wrap;
    gap: 2em;
}
.card{
    width: 30em;
}
.foto{
    display:block;
    margin:1em auto;
    text-align:center;
    border-radius: 1em;
}


</style>