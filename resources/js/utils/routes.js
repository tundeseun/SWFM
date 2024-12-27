// resources/utils/routes.js
import Layout from '@/layout/Layout.vue';
import CreateProductView from '@/views/CreateProductView.vue';
import CreateShelfView from '@/views/CreateShelfView.vue';
import InventoryTableView from '@/views/InventoryTableView.vue';
import PurchaseOrderView from '@/views/PurchaseOrderView.vue';
import Dashboard from '@/components/Dashboard.vue';
import ListProductView from '../views/ListProductView.vue';
import Login from '@/components/Login.vue';
import CreatePalletSetting from '@/components/CreatePalletSetting.vue';

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: { requiresAuth: false }
      },
      { 
        path: '/', 
        redirect: '/login'  // Changed to redirect to login by default
      },
    { 
        path: '/app', 
        component: Layout,
        children: [
            { 
                path: 'dashboard', 
                name: 'Dashboard', 
                component: Dashboard 
            },
            { 
                path: 'products/create', 
                name: 'CreateProduct', 
                component: CreateProductView 
            },
            { 
                path: 'products/all', 
                name: 'ListProduct', 
                component: ListProductView 
            },
            { 
                path: 'shelves/create', 
                name: 'CreateShelf', 
                component: CreateShelfView 
            },
            { 
                path: 'inventory/all', 
                name: 'InventoryTable', 
                component: InventoryTableView 
            },
            { 
                path: 'orders/create', 
                name: 'PurchaseOrder', 
                component: PurchaseOrderView 
            },
            { 
                path: 'pallet/create', 
                name: 'Pallet', 
                component: CreatePalletSetting
            },
            //  { 
            //    path: 'pos', 
            //    name: 'Pos', 
            //    component: Posview 
            //  },
        ]
    }
];


// Navigation guard

export default routes;
