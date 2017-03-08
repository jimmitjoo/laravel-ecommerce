import Home from './components/Home.vue';
import Cart from './components/Cart.vue';
import Product from './components/products/Product.vue';
import SingleProduct from './components/products/SingleProduct.vue';

export const routes = [
    {path: '/', component: Home},
    {
        path: '/product',
        compontent: Product,
        /*children: [
            {
                path: ':id',
                component: SingleProduct
            }
        ]*/
    },
    {path: '/product/:id', component: SingleProduct},
    {path: '/hej', component: Cart}
];