
const state = () => ({
    sideNav: false,
    plantLinks: [
        {icon: 'mdi-pine-tree', text:  'Trees', route: '/plantsGrid', searchQuery: 'Tree'},
        {icon: 'mdi-tree', text:  'Bushes', route: '/plantsGrid', searchQuery: 'Bush'},
        {icon: 'mdi-flower', text:  'Flowers', route: '/plantsGrid', searchQuery: 'Flower'},
    ],
    maintenanceLinks: [
        {icon: 'mdi-sprout', text:  'Planting', route: '/planting'},
        {icon: 'mdi-watering-can', text:  'Watering', route: '/watering'},
        {icon: 'mdi-bottle-tonic-plus', text:  'Fertilizing', route: '/fertilizing'},
    ],
})

const mutations = {

}

const actions = {

}

const getters = {
    // need setter cause value is changing
    // sideNav: ({sideNav}) => sideNav,
    maintenanceLinks: ({maintenanceLinks}) => maintenanceLinks,
    plantLinks: ({plantLinks}) => plantLinks,
}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}