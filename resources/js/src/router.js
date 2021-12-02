import Index from '././pages/Index.vue';
import Create from '././pages/Create.vue';
import Edit from '././pages/Edit.vue';

const router = [
        {
            path: '/',
            name: 'index',
            component: Index
        },
        {
            path: '/create',
            name: 'create',
            component: Create
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: Edit
        }
    ]

export default router;