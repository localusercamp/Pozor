export default function guest ({ next, store }){
    if(store.getters['auth/isAuth']){
        return next({
           name: 'mainpage'
        })
    }
   
    return next()
   }