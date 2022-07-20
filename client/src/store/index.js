import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";
import { authModule } from  '@/store/modules/AuthModule'

export const HOST_URL = process.env.host || "http://localhost:8000";
export const HOST_API_URL = process.env.host || `${HOST_URL}/api`;

export const ROLE_ADMIN_ID = 1;

export const STATUSES_ID = {
  DRAFT_ID : 1,
  TRASHED_ID : 2,
  PUBLISHED_ID : 3,
  APPROVED_ID : 4,
}

const store = new Vuex.Store({
  modules: {
    auth: authModule,
  },
  plugins: [
    createPersistedState({
      paths: ["authModule"]
    })
  ]
});

export default store;
