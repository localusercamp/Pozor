export default async function isAdmin ({ next, store }){
    const isAdmin = store.getters['auth/isAdmin'];
    if(!isAdmin){
        return next({
           name: 'mainpage'
        })
    }
    return next()
}