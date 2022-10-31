require('./bootstrap');

// *** Start import vue ***
    import { createApp } from 'vue';
// *** End import vue ***

// *** Start import router ***
    import router from './router'
    window.router = router
// *** Start import router ***

// *** Start import Sweet Alert *** 
    import Swal from 'sweetalert2'
    window.Swal = Swal;
    const Sweet = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    window.Sweet = Sweet;
// *** End import Sweet Alert *** 

// *** Start import vue-toastification Alert *** 
    import Toast from "vue-toastification";
    import "vue-toastification/dist/index.css";
    const props = {
    transition: "Vue-Toastification__slideBlurred",
    maxToasts: 20,
    newestOnTop: true
    };
// *** End import vue-toastification Alert ***

// *** Start import PrimeVue ***
    import PrimeVue from 'primevue/config';
    import 'primevue/resources/themes/saga-blue/theme.css'       //theme
    import 'primevue/resources/primevue.min.css'                 //core css
    import 'primeicons/primeicons.css'                           //icons
// *** End import PrimeVue ***

// *** Start import vue-select ***
    import vSelect from "vue-select";
    import "vue-select/dist/vue-select.css";
// *** End import vue-select ***

// *** Start import vue-loading-overlay ***
    import VueLoading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
// *** End import vue-loading-overlay ***

const app = createApp()
.component("v-select", vSelect)
.use(router)
.use(PrimeVue)
.use(VueLoading)
.use(Toast, props);
const mountedApp = app.mount('#app');