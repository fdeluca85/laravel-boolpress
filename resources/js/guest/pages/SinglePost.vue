<template>
  <div class="card">
    <h2>{{post.title}}</h2>
    <img class="foto" :src="`/storage/${post.image}`" :alt="'Immagine che ritrae ' + post.title">
    <div v-if="post.tags ">
        <!-- <strong>Tags</strong> -->
            <ul>
                <li v-for="tag in post.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>
    </div>
    <p>{{post.content}}</p>
    <div class="comment">
        <h3>Lascia un commento</h3>
        <form @submit.prevent="addComment()">
            <div>
                <input type="text" id="name" placeholder="Inserisci il nome" v-model="formData.name">
            </div>
            <div>
                <textarea id="content" cols="30" rows="10" placeholder="Inserisci un commento *" v-model="formData.content"></textarea>
            </div>
            <div>
                <button type="submit">Aggingi commento</button>
            </div>
        </form>
        <div v-show="commentSent" class="comment_approve">
            <p>Commento in attesa di approvazione</p>
        </div>
    </div>
  </div>
</template>

<script> 
export default {
    name:"SinglePost",
    data(){
        return{
            post: {},
            formData:{
                name:"",
                content:"",
                post_id: null
            },
            commentSent: false
        }
    },
    methods:{
        addComment(){
            // alert("Commento aggiunto")
            // api/comments
            axios.post(`/api/comments`,this.formData).then( (response) => {
            // console.log(response.data);

            //pulizia campi
            this.formData.name = "";
            this.formData.content = "";

            //commento è stato inserito
            this.commentSent = true
        })
        }
    },
    created() {
        // console.log(this.$route.params.slug);
        axios.get(`/api/posts/${this.$route.params.slug}`)
        .then( (response) => {
            // console.log(response.data);
            this.post = response.data;

            this.formData.post_id = this.post.id;
        }).catch( (error) =>{
            this.$router.push({name: "page-404"});
        })
    }
}
</script>

<style  lang='scss' scoped>
img{
    max-width: 50em;
    max-height: 40em;

}

</style>