import AllBooks from './components/book/AllBooks.vue';
import AddBook from './components/book/AddBook.vue';
import EditBook from './components/book/EditBook.vue';
import AllUsers from './components/auth/AllUsers.vue';

/*export const routes = [
    {
        name: 'home',
        path: '/book/',
        component: AllBooks,
    },
    {
        name: 'add',
        path: '/book/add',
        component: AddBook,
    },
    {
        name: 'edit',
        path: '/book/edit/:id',
        component: EditBook
    }
];*/

/*export const routes = [{
    path: 'book',
    children: [
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
    ]
}];*/


export const routes = [
    {
        name: 'home',
        path: '/auth/',
        component: AllUsers,
    }
];


