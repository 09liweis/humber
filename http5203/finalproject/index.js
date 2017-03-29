var app = new Vue({
    el: '#app',
    data: {
        events: []
    },
    mounted() {
        this.getEvents();
    },
    methods:  {
        getEvents() {
            this.$http.get('API.php').then(function(events) {
                this.events = events.data;
            });
        }
    }
});