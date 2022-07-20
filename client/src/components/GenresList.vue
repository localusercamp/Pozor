<template>
    <div v-if="genres.length > 0">
        <h3>Список Жанров</h3>
        <transition-group name="genre-list">
            <genre-item 
                v-for="genre in genres" 
                :genre="genre" 
                :key="genre.id"
            />
        </transition-group>
    </div>
    <h2 v-else style="color: red">
            Список жанров пуст!
    </h2>
</template>

<script>
import GenreItem from "@/components/GenreItem.vue"
    export default {
        components: {
            GenreItem,
        },
        props: {
            genres: {
                type: Array,
                required : true
            }
        }
    }
</script>

<style scoped>

</style>