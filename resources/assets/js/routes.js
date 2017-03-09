import Home from './components/Home.vue';
import Cart from './components/Cart.vue';
import Product from './components/products/Product.vue';
import SingleProduct from './components/products/SingleProduct.vue';
import SingleCategory from './components/categories/SingleCategory.vue';

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
    {path: '/category/:id', component: SingleCategory},
    {path: '/product/:id', name: 'single-product', component: SingleProduct},
    {path: '/cart', component: Cart}
];