import Layout from '@/layout/Layout.vue'
import CreateProductView from '../js/views/CreateProductView.vue';
import CreateShelfView from '../js/views/CreateShelfView.vue';
import InventoryTableView from '../js/views/InventoryTableView.vue';
import PurchaseOrderView from '../js/views/PurchaseOrderView.vue';
import Dashboard from '../js/components/Dashboard.vue';
import PosView from "../js/views/Posview.vue";


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
                path: 'pos', 
                name: 'Pos', 
                component: PosView
            },
            { 
                path: 'create-product', 
                name: 'CreateProduct', 
                component: CreateProductView 
            },
            { 
                path: 'create-shelf', 
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
           
        ]
    }
];
  
export default routes;