export default {
    getHomeItems: ({ items }) => items.slice(0, 10),

    getSelectedItems: ({ selectedItems }) => selectedItems,

    getItemCount: ({ selectedItemCount }) => selectedItemCount,

    getSearchQuery: ({ searchQuery }) => searchQuery,

    getItemById: ({items}) => (id) => items.find(todo => todo.id == id),

    getIsLoading: ({ isLoading }) => isLoading,

    getFilters: ({ filters }) => filters,

    getItemsPerPageOptions: ({ itemsPerPageOptions }) => itemsPerPageOptions,

    getSortOptions: ({ sortOptions }) => sortOptions,

    getPagination: ({pagination}) => pagination
};