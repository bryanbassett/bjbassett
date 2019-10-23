/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./mailgo');

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
//import example-component from './components/ExampleComponent.vue';
var x = Vue.component('modalpopper', require('./components/ExampleComponent.vue').default);
var z = Vue.component('items', require('./components/ItemsComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var app = new Vue({
    el: '#wrapper',
    components: { 'modalpopper': x },
    methods:{
        update () {

        },
        test () {
            $("a.badge.badge-light").click(function(e) {
                e.preventDefault();
                let g = $(this).attr("href");
                g = g.split("/")[2];
                app.$refs.mp.modalPop('/popEditItem/'+g);

            });
        }
    },
    mounted() {
        this.test();
    },
});
$(window).on('load', function () {
    $('a').tooltip();
});


$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(function(ready){
    if ($('#category').length) {
        $("#category").change(function(){
            $('.itemForm').html('');
            $.ajax({
                url: "/field/get_by_category?cat_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.itemForm').html(data.html);
                }
            });
        });
    }
    if ($('#visibility').length) {
        $("#visibility").change(function(){
            $.ajax({
                url: "{{ route('settings.toggle_setting') }}?setting_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    location.reload();
                }
            });
        });
    }


});
