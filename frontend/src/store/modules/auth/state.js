export default () => {
    return {
        loggedIn: false,
        token: localStorage.getItem('token') || null,
        email: null,
        orders: []
    }
}