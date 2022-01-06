import Index from '././pages/Index.vue';
import Create from '././pages/Create.vue';
import Edit from '././pages/Edit.vue';
import Login from '././Auth/Login.vue';
import StockProduct from '././pages/stock/Product.vue';

    const router = [
        {
            path: '/',
            name: 'index',
            component: Index
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
            meta : { requiresAuth : true }
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: Edit,
            meta : { requiresAuth : true }
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/stock/product',
            name: 'stock-product',
            component: StockProduct
        }
    ]

export default router;