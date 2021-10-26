import uniqid from "uniqid";

export default () => ({
    items: [],
    selectedItems: [],
    selectedItemCount: 0,
    searchQuery: 'Plants',
    isLoading: false,
    filters: [],
    itemsPerPageOptions: [
        {
            count: 12,
            selected: true,
        },
        {
            count: 24,
            selected: false,
        },
        {
            count: 36,
            selected: false,
        },
        {
            count: 48,
            selected: false,
        }
    ],
    sortOptions: [
        {
            name: 'A-Z',
            selected: true,
            sortFunction: (a, b) => (a.title > b.title ? 1 : a.title === b.title ? 0 : -1)
        },
        {
            name: 'Z-A',
            selected: false,
            sortFunction: (a, b) => (a.title < b.title ? 1 : a.title === b.title ? 0 : -1)
        },
        {
            name: 'Cheapest',
            selected: false,
            sortFunction: (a, b) => (a.price > b.price ? 1 : a.price === b.price ? 0 : -1)
        },
        {
            name: 'Most expensive',
            selected: false,
            sortFunction: (a, b) => a.price < b.price ? 1 : a.price === b.price ? 0 : -1
        }
    ],
    pagination: {
        currentPage: 1,
        pages: []
    },
})