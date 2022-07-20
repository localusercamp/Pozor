<template>
    <div>
        <MovieCardItemID
            :movie="movie" 
            v-if="!isMovieLoaging"
        />
         <div v-else><h2> Идет загрузка...</h2></div>    
    </div>
</template>

<script>
import { HOST_URL } from "@/store";
import { HOST_API_URL } from "@/store";
import MovieCardItemID from "@/components/MovieCardItemID.vue";
    export default {
        components: {
            MovieCardItemID
        },
        name: 'MovieCardPage',
        data() {
            return {
                movie: {},
                isMovieLoaging: false,
            }
        },
        methods: {
            async getMovieByID(id) {
                try {
                    const isAuth = await this.$store.getters['auth/getUserToken'] != null;
                    const endpoint = isAuth ? '/getTrashMovie' : '/getMovie';
                    this.isMovieLoaging = true;
                    //const response = await axios.post(`${HOST_URL}/sign-in`, data);
                    const response = await fetch(`${HOST_API_URL}${endpoint}/${id}`, {
                        headers: {
                            'Content-Type' : 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + await this.$store.getters['auth/getUserToken'],
                        },
                    });
                    if(response.ok) {
                        const content = await response.json();
                        this.movie = content.data;
                    }
                    this.isMovieLoaging = false;
                } catch (err) {
                    console.error(err);
                }
                finally {
                    this.isMovieLoaging = false;
                }
            },
        },
        beforeMount() {
           
        },
        mounted() {
            this.getMovieByID(this.$route.params.id);
        },
    }
</script>

<style scoped>

</style>