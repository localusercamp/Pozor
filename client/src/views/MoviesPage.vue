<template>
    <div>
        <h1> Страница с фильмами</h1>
       
        <div class="app__btns">
             <my-input
                v-model="searchQuery"
                placeholder="Search..."
            />
            <my-select
                v-model="selectedSort"
                :options="sortOptions"
            />
        </div>
        <movie-list
            :movies="sortedAndSearchedMovies"
            v-if="!isMoviesLoaging"
        />
        <div v-else>
            <h2> Идет загрузка...</h2>
        </div>
        <div class="page__wrapper">
            <div 
                v-for="pageNumber in totalPages"
                :key="pageNumber"
                class="page"
                :class="{
                    'current-page': page === pageNumber,
                }"
                @click="changePage(pageNumber)"
            >
            {{pageNumber}}
            </div>
        </div>
    </div>
</template>

<script>
import MovieList from "@/components/MovieList.vue";
import MyButton from '@/components/UI/MyButton.vue';
import MyInput from '@/components/UI/MyInput.vue';
import MySelect from '@/components/UI/MySelect.vue';
import { HOST_API_URL, STATUSES_ID } from "@/store";
import { mapState, mapGetters, mapMutations, mapActions} from 'vuex'
    export default {
        components: {
            MovieList,
            MyButton,
            MyInput,
            MySelect,
        },
        data() {
            return {
                isAdmin: false,
                movies: [],
                isMoviesLoaging: false,
                selectedSort: 'status', //default sorted value
                sortOptions: [
                    {value: 'id',name: 'On id'},
                    {value: 'title',name: 'On title'},
                    {value: 'status',name: 'On status'},
                ],
                searchQuery: '',
                page: 1,
                limit: 10,
                totalPages: 0,
            }
        },
        methods: {
            ...mapGetters({
                getUserToken: 'auth/getUserToken',
            }),
            async getAllMyMovies() {
                const params = `?limit=${this.limit}&page=${this.page}`;
                try {
                    this.isMoviesLoaging = true;
                    const endpoint = this.isAdmin ? '/getAllMovie' : '/getMyMovie';
                    const response = await fetch(`${HOST_API_URL}${endpoint}${params}`, {
                        headers: {
                            'Content-Type' : 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + await this.getUserToken(),
                        },
                    });
                    if(response.ok) {
                        const content = await response.json();
                        this.movies = content.data;
                        this.totalPages = content.meta.last_page;
                        this.isMoviesLoaging = false;
                    }

                } catch (err) {
                    console.error(err);
                }
                finally {
                    this.isMoviesLoaging = false;
                }
            },
            changePage(pageNumber) {
                this.page = pageNumber;
            }
        },
        computed: {
             sortedMovies() {
                
                if(this.selectedSort ===  'title') {
                    return [...this.movies].sort( (movie1, movie2) =>  movie1[this.selectedSort]?.localeCompare(movie2[this.selectedSort]));
                }
                else if (this.selectedSort ===  'id') {
                    return [...this.movies].sort( (movie1, movie2) => movie1[this.selectedSort] - movie2[this.selectedSort]);
                }
                // 'status'
                else {
                    const draftMovie = this.movies.filter((m) => m.status.id === STATUSES_ID.DRAFT_ID);
                    const trashMovie = this.movies.filter((m) => m.status.id === STATUSES_ID.TRASHED_ID);
                    const publishMovie = this.movies.filter((m) => m.status.id === STATUSES_ID.PUBLISHED_ID);
                    const approveMovie = this.movies.filter((m) => m.status.id === STATUSES_ID.APPROVED_ID);

                    const sortedMovie = this.isAdmin? 
                                        [...publishMovie,...approveMovie] 
                                        : 
                                        [...publishMovie,...draftMovie,...trashMovie,...approveMovie];
                    return sortedMovie;
                    //return [...this.movies].sort( (movie1, movie2) => movie2[this.selectedSort]['id'] - movie1[this.selectedSort]['id']);
                }
            },
            sortedAndSearchedMovies() {
                return this.sortedMovies.filter(m => m.title.toLowerCase().includes(this.searchQuery.toLowerCase()));
            }
        },
        mounted() {
            this.isAdmin = this.$store.getters['auth/isAdmin'];
            this.getAllMyMovies();    
        },
         watch: {
            // TODO: Неверное отображается пагинация при поиске по названию
            page() {
                this.getAllMyMovies();
            }
        },
    }
</script>

<style scoped>
.app__btns {
    margin: 15px 0;
    display: flex;
    justify-content: space-between;
}
.page__wrapper {
    display: flex;
    margin-top: 5px;
}
.page {
    border: 1px solid teal;
    margin: 5px;
    padding: 7px;
}
.current-page {
    border: 2px solid teal;
    background: seagreen;
    color: white;
}
</style>