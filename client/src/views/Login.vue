<template>
  <main class="form-signin">
    <form @submit.prevent>
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <input
          v-model="email"  
          type="email" 
          class="form-control" 
          placeholder="Email" 
          required
        >

        <input
          v-model="password" 
          type="password" 
          class="form-control" 
          placeholder="Password" 
          required
        >

      <button 
        class="w-100 btn btn-lg btn-primary" 
        type="submit"
        @click="submitLoginForm"
      >
        Sign in
      </button>
    </form>
    <br/>
    <div> "Admin": MainAdmin@admin.com _Admin123</div>
    <br/>
    <div> "Moder": MsModerka@yandex.ru _123User</div>
  </main>
</template>

<script>
    export default {
      data() {
        return {
          email : '',
          password: '',
        }
      },
      methods: {
        async submitLoginForm() {
          const ok = await this.$store.dispatch('auth/login',JSON.stringify(this.$data));
          if(ok) {
            await this.$router.push('/profile');
          } else {
            // throw Error
          }
            
        }
      }
    }
</script>

<style scoped>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>