var Vue = require('vue');

Vue.config.debug = true;


var app = new Vue({

    el: '#app',

    created: function() {
        this.times = new Array(24 * 4 * 7);
    },

    data: {

        times: [],

        mouseDown: false,

    },

    methods: {

        isDown: function(down) {
            this.mouseDown = down;
        },

        onTimeClick: function(event, day, hour) {
            if(event.type === 'mousedown') {
                this.isDown(true);
            }
            if(this.mouseDown) {
                for(var quarter = 0; quarter<4;quarter++) {
                    var index = this.toIndex(day, hour, quarter);
                    this.times[index] = !this.times[index];
                }
                event.target.classList.toggle('green');
            }
        },

        isActive: function(day, hour) {
            var index = this.toIndex(day, hour);
            return this.times[index];
        },

        toIndex: function(day, hour, quarter) {
            quarter = (typeof quarter === 'undefined') ? 'default' : quarter;
            hour = (typeof hour === 'undefined') ? 'default' : hour;

            return day * 24 * 4 + hour * 4 + quarter;
        }
    }

});