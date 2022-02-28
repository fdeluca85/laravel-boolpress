<template>
  <main>
    <div class="container">
      <router-view :key="$route.path"></router-view>
    </div>
  </main>
</template>

<script>

export default {
    name:"Main"
    
}
</script>

<style  lang='scss' scoped>

</style>