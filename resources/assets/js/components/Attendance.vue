<template>
    <div class="attendance"
         v-bind:class="{'locked' : locked}"
         v-on:click="changeValue">
            {{vueValue}}
    </div>
</template>

<script>
    export default {
        props: ['user_id','week_id','value'],
        data: function() {
            return {
                vueValue: '',
                locked: false
            }
        },
        methods: {
            changeValue: function() {
                if(this.vueValue == 'null'){
                    this.storeAttendance();
                } else if (this.vueValue == 1){
                    this.updateAttendance();
                } else {
                    this.deleteAttendance();
                }
            },
            storeAttendance: function() {
                var vm = this;
                axios.post('/panel/attendance/' + this.user_id + '/' + this.week_id)
                     .then(function (response) {
                        vm.vueValue = response.data;
                    });
                eventBus.$emit('sumUpdate', [1, this.week_id]);
            },
            updateAttendance: function() {
                var vm = this;
                axios.put('/panel/attendance/' + this.user_id + '/' + this.week_id)
                     .then(function (response) {
                        vm.vueValue = response.data;
                    });
                eventBus.$emit('sumUpdate', [0, this.week_id]);
            },
            deleteAttendance: function() {
                var vm = this;
                axios.delete('/panel/attendance/' + this.user_id + '/' + this.week_id)
                     .then(function (response) {
                        vm.vueValue = 'null';
                    });
                eventBus.$emit('sumUpdate', [null, this.week_id]);
            }
        },
        created: function() {
            this.vueValue = this.value;
            /*var vue = this;
            axios.get('/panel/attendance/' + this.user_id + '/' + this.week_id)
            .then(function (response) {
                vue.value = response.data;
            });*/
        },
        mounted: function(){
            eventBus.$emit('sumCreate', [this.value, this.week_id]);
        }
        
    }
</script>
<style>

.attendance 
{
    text-align: center;
}
.attendance:hover 
{
    cursor: pointer;
}
.locked
{
    color: #D3D3D3;
    pointer-events: none;
}

</style>

