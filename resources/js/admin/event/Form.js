import AppForm from '../app-components/Form/AppForm';

Vue.component('event-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                price:  '' ,
                category:  '' ,
                total_seats:  '' ,
                start_time:  '' ,
                end_time:  '' ,
                is_custom_seat:  false ,
                custom_seats:  [{
                    name:'1A',
                    occupied:false,
                }] ,
                
            }
        }
    },
    methods:{
        addSeat: function() {
            var obj = {
                name:'',
                occupied:false,
            };
            this.form.custom_seats.push(obj);
        },
        removeSeat: function(index) {
            if(index > 0) {
                this.form.custom_seats.splice(index, 1);
            }
        }
    }

});