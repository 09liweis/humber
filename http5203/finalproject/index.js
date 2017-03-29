var app = new Vue({
    el: '#app',
    data: {
        events: [],
        activeEvents: [],
        dates: [],
        selectedDate: ''
    },
    mounted() {
        this.getEvents();
        this.getDates();
    },
    methods:  {
        getDates() {
            this.$http.get('EventController.php?action=getDates').then(function(dates) {
                this.dates = dates.data;
            });
        },
        getEvents() {
            this.$http.get('EventController.php?action=getEvents').then(function(events) {
                this.events = events.data;
                this.activeEvents = events.data;
            });
        },
        
        filterFree() {
            this.filter('freeEvent', 'Yes');
        },
        
        filterPaid() {
            this.filter('freeEvent', 'No');
        },
        
        filterDate() {
            this.filter('startDate', this.selectedDate);
        },
        
        filter(property, value) {
            this.activeEvents = this.events.filter(function(event) {
                return event[property] == value;
            });
        }
    }
});