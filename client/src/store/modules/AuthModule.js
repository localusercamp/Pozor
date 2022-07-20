import { HOST_API_URL, ROLE_ADMIN_ID } from "@/store";
import axios from "axios"
import { useCookies } from "vue3-cookies";


export const authModule = {
    namespaced: true,
    state: () => ({
        isAuth: false,
        user: null,
    }),
    getters: {
        async getUserToken() {
            const { cookies } = useCookies();
            return cookies.get("jwt");
        },
        getUser(state) {
            return state.user;
        },
        isAuth(state) {
            return state.isAuth;
        },
        async isAuthAsync(state) {
            return state.isAuth;
        },
        isAdmin(state) {
            return state.user?.role?.id == ROLE_ADMIN_ID;
        }
    },
    mutations: {
        SET_AUHT:(state, auth) => {state.isAuth = auth},
        SET_USER:(state, user) => {state.user = user},
    },
    actions: {
        // async getUserToken() {
        //     const { cookies } = useCookies();
        //     return cookies.get("jwt");
        // },
        async login({commit}, data) {
            const { cookies } = useCookies();
            try {
                //const response = await axios.post(`${HOST_URL}/sign-in`, data);
                const response = await fetch(`${HOST_API_URL}/sign-in`, {
                    method: 'POST',
                    headers: {
                        'Content-Type' : 'application/json',
                        'Accept': 'application/json',
                    },
                    credentials: 'include',
                    body: data
                });
                if(response.ok) {
                    const content = await response.json();
                    const user = content.data;
            
                    //axios.defaults.headers.common["Authorization"] = 'Bearer ' + cookies.get("jwt");
                    commit('SET_AUHT', true);
                    commit('SET_USER', user);
                    return true;
                }
            } catch (err) {
                commit('SET_AUHT', false)
                commit('SET_USER', null)
                console.error(err);
                return false;
            }
        },
        async getUser({commit}) {
            const { cookies } = useCookies();
            try {
                const response = await fetch(`${HOST_API_URL}/getUser`, {
                    headers: {
                        'Content-Type' : 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + cookies.get("jwt"),
                    },
                    credentials: 'include',
                });
                if(response.ok) {
                    const content = await response.json();
                    const user = content.data;
                    commit('SET_AUHT', true);
                    commit('SET_USER', user);
                }
            } catch (err) {
                commit('SET_AUHT', false);
                commit('SET_USER', null);
                console.error(err);
                return false;
            }
        },
        async logout({commit}) {
            const { cookies } = useCookies();
            try {
                const response = await fetch(`${HOST_API_URL}/logout`, {
                    headers: {
                        'Content-Type' : 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + cookies.get("jwt"),
                    },
                    credentials: 'include',
                });
                if(response.ok) {
                    commit('SET_AUHT', false);
                    commit('SET_USER', null);
                }
            } catch (err) {
                console.error(err);
                return false;
            }
        }
    },
}