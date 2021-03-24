require('./bootstrap');

window.Vue = require('vue');


Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('gratitude-component', require('./components/GratitudeComponent').default);

const app = new Vue({
    el: '#app',
    data: {
        nav_visible: false,
        show_bug_form: false,
        bug_form_send: false,
        form: true,
        issue: 0,
        bug_word_count: 0,
        greet_message: null,

    },
    methods: {
        toggle_nav: function () {
            this.nav_visible = !this.nav_visible;
        },

        toggle_bug_form: function (visibility) {
            this.show_bug_form = visibility
            this.issue = null;
            if (this.form === false){
                this.form = true;
            }
        },

        check_for_debug_input: function () {
            this.bug_form_send = this.issue.length > 0 && this.issue.length < 1001;
            this.bug_word_count = this.issue.length;
        },

        calculate_time_of_day: function (){
            let now = new Date();
            let hrs = now.getHours();
            if (hrs >=  3) this.greet_message = "Good morning";
            if (hrs > 12) this.greet_message = "Good afternoon";
            if (hrs > 17 || hrs < 3) this.greet_message = "Good evening";
        },




        formSubmit(e) {
            e.preventDefault();
            let currentObj = this;
            axios.post('bug', {
                issue: this.issue,
            }).then(response => {
                if (response.status === 200){
                    this.form = false;
                    this.bug_form_send = false;
                    this.bug_word_count = 0;
                }
            }).catch(function (error) {
                currentObj.output = error;
            });
        },
    },

    beforeMount() {
        this.calculate_time_of_day();
    }

});
