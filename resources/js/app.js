import './bootstrap';

import {createApp} from 'vue';

import Example from './components/ExampleComponent.vue';
// Images
import FeatureImagePreview from './components/imagepreview/FeatureImage.vue';
import FirstImagePreview from './components/imagepreview/FirstImage.vue';
import SecondImagePreview from './components/imagepreview/SecondImage.vue';
// Address DrpoDown
import Address from './components/address/AddressDropDown.vue';
// Category DrpoDown
import Category from './components/category/CategoryDropDown.vue';


const app = createApp();
app.component('example-component', Example);
app.mount("#app");

// Feature Image
const featureImagePreview = createApp();
featureImagePreview.component('feature-image-preview', FeatureImagePreview);
featureImagePreview.mount("#feature_image_design");

// Feature Image
const firstImagePreview = createApp();
firstImagePreview.component('first-image-preview', FirstImagePreview);
firstImagePreview.mount("#first_image_design");

// Feature Image
const secondImagePreview = createApp();
secondImagePreview.component('second-image-preview', SecondImagePreview);
secondImagePreview.mount("#second_image_design");

// Address DrpoDown
const addressDropDown = createApp();
addressDropDown.component('address-dependent-dropdown', Address);
addressDropDown.mount("#address_dependent_dropdown");

// Category DrpoDown
const categoryDropDown = createApp();
categoryDropDown.component('category-dependent-dropdown', Category);
categoryDropDown.mount("#category_dependent_dropdown");















// require('./bootstrap');
//
// window.Vue = require('vue');
// window.axios = require('axios');
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el : '#app',
// });
