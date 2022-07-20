<template>
    <div>
        <h1> Страница с жанрами</h1>
        <my-button
            @click="showDialog"
        >
            Create new Genre
        </my-button>

        <my-dialog v-model:show="dialogVisible">
            <GenreForm
                @create="createGenre"
            />
        </my-dialog>

        <genre-list
            :genres="sortedAndSearchedGenres"
            v-if="!isGenresLoaging"
        />
         <div v-else><h2> Идет загрузка...</h2></div>     
    </div>
</template>

<script>
import GenreList from "@/components/GenresList.vue";
import { HOST_API_URL } from "@/store";
import { mapState, mapGetters, mapMutations, mapActions} from 'vuex'
import MyDialog from '@/components/UI/MyDialog.vue';
import GenreForm from "@/components/GenreForm.vue";
import MyButton from '@/components/UI/MyButton.vue';
    export default {
        components: {
            GenreList,
            MyDialog,
            GenreForm,
            MyButton
        },
        data() {
            return {
                genres: [],
                isGenresLoaging: false,
                dialogVisible: false,
                selectedSort: '',
                sortOptions: [
                    {value: 'id',name: 'On Id'},
                    {value: 'Name',name: 'On Name'},
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
            async getGenres() {
                try {
                    this.isGenresLoaging = true;
                    const response = await fetch(`${HOST_API_URL}/getAllGenres`, {
                        headers: {
                            'Content-Type' : 'application/json',
                            'Accept': 'application/json',
                        },
                    });
                    if(response.ok) {
                        const content = await response.json();
                        this.genres = content.data;
                        this.isGenresLoaging = false;
                    }

                } catch (err) {
                    console.error(err);
                }
                finally {
                    this.isGenresLoaging = false;
                }
            },
            showDialog() {
                this.dialogVisible = true;
            },
            async createGenre(genre) {
                 try {
                    //const response = await axios.post(`${HOST_URL}/sign-in`, data);
                    const response = await fetch(`${HOST_API_URL}/createGenre`, {
                        method: 'POST',
                        headers: {
                            'Content-Type' : 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + await this.getUserToken(),
                        },
                        body: JSON.stringify(genre)
                    });
                    if(response.ok) {
                        const content = await response.json();
                        this.getGenres();
                    }
                } catch (error) {
                    console.log("ERRRR:: ", error);
                }
                this.dialogVisible = false;
            },
            removePost(post) {

                this.posts = this.posts.filter(p => p.id != post.id);
            },
        },
        computed: {
            // getStatusName(status) {
            //     return status.name;
            // },
            sortedGenres() {
                return [...this.genres].sort( (genre1, genre2) => genre1[this.selectedSort]?.localeCompare(genre2[this.selectedSort]));
            },
            sortedAndSearchedGenres() {
                return this.sortedGenres.filter(g => g.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
            }
        },
        mounted() {
            this.getGenres();
        },
    }
</script>

<style scoped>

</style>