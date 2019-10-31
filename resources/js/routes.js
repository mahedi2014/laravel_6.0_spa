import AllBooks from './components/book/AllBooks.vue';
import AddBook from './components/book/AddBook.vue';
import EditBook from './components/book/EditBook.vue';
import UploadFile from './components/file/UploadFile.vue';
import AllUsers from './components/auth/AllUsers.vue';

export const routes = [
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
    },
    {
        name: 'home',
        path: '/auth/',
        component: AllUsers,
    },
    {
        name: 'file-upload',
        path: '/file/upload',
        component: UploadFile,
    },

];



