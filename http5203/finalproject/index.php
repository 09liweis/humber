<?php
require_once 'API.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Events in Toronto</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div class="wrapper" id="app">
            <div id="events">
                <h3>Found {{ activeEvents.length }} for you</h3>
                <div class="event" v-for="event in activeEvents">
                    <div class="event__image">
                        <img :src="event.thumbImage" />
                    </div>
                    <div class="event__detail">
                        <h3>{{ event.name }}</h3>
                        <p>{{ event.startDate }}</p>
                        <p>Free: {{ event.freeEvent }}</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div id="filters">
                <select v-model="selectedDate" @change="filterDate">
                    <option value="">Select Event by Date</option>
                    <option v-for="date in dates" :value="date">{{ date }}</option>
                </select>
                <div>
                    <a v-on:click="filterFree" href="#free=yes">Free</a>
                    <a v-on:click="filterPaid" href="#free=no">Paid</a>
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
    </body>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
</html>