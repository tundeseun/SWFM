// resources/utils/routes.js
import Layout from '@/layout/Layout.vue';
import CreateProductView from '@/views/CreateProductView.vue';
import CreateShelfView from '@/views/CreateShelfView.vue';
import InventoryTableView from '@/views/InventoryTableView.vue';
import PurchaseOrderView from '@/views/PurchaseOrderView.vue';
import Dashboard from '@/components/Dashboard.vue';
import Posview from '../views/Posview.vue';

const routes = [
    { 
        path: '/', 
        redirect: '/app/dashboard' 
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
                path: 'create-shelves', 
                name: 'CreateShelf', 
                component: CreateShelfView 
            },
            { 
                path: 'inventory-table', 
                name: 'InventoryTable', 
                component: InventoryTableView 
            },
            { 
                path: 'purchase-order', 
                name: 'PurchaseOrder', 
                component: PurchaseOrderView 
            },
             { 
               path: 'pos', 
               name: 'Pos', 
               component: Posview 
             },
        ]
    }
];

export default routes;
