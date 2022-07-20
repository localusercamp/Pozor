<template>
    <div>
        <MovieCardList
            :movies="movies"
            v-if="!isMoviesLoaging"
        />
        <div v-else>
            <h2> Идет загрузка...</h2>
        </div>  
        
    </div>
</template>

<script>
import { GetApprovedMovie } from '@/api/getApprovedMovie';
import MovieCardList from "@/components/MovieCardList.vue";
    export default {
        components: {
            MovieCardList
        },
        data() {
            return {
                movies: [],
                isMoviesLoaging: false,
            }
        },
        methods: {
            async getApprovedMovie() {
                this.isMoviesLoaging = true;
                try {
                    this.movies = await GetApprovedMovie();
                    this.isMoviesLoaging = false;
                } catch (err) {
                    console.error(err);
                }
                finally {
                    this.isMoviesLoaging = false;
                }
            },
        },
        created() {
            this.getApprovedMovie();
        },
    }
</script>

<style scoped>
</style>