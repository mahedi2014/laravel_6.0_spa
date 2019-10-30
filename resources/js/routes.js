import AllBooks from './components/book/AllBooks.vue';
import AddBook from './components/book/AddBook.vue';
import EditBook from './components/book/EditBook.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllBooks,
    },
    {
        name: 'add',
        path: '/add',
        component: AddBook,
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditBook
    }
];


