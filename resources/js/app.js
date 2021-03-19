/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
//     data: {
//         message: 'Привет, Vue!'
//     }
// });


const api_token = 'jd9fh982h98dh9hd03hfh2hf2oi3hdioh23iooi2h3fio2hi2hf3io2i2';

const productModal = new Vue({
    api_key: '',
    el: '#productModal',
    data: {
        message: 'Привет, Vue!'
    },
    methods: {
        setTypeProduct: function (event) {
            let product_types = document.querySelectorAll('#form_product_type option');

            let category_id = event.target.value;

            let first_type = null;

            product_types.forEach((item) => {
                item.removeAttribute('selected');

                if (item.dataset.categoryId === category_id) {
                    first_type = item
                    item.classList.remove('d-none')
                } else {
                    item.classList.add('d-none')
                }
            });

            if (first_type !== null) {
                first_type.setAttribute('selected', 'selected')
            }
        }
    }
});

