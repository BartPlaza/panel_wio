<template>
    <div class="attendance"
         v-on:click="changeValue">
            {{vueValue}}
    </div>
</template>

<script>
    export default {
        props: ['user_id','week_id','value'],
        data: function() {
            return {
                vueValue: ''
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
            },
            updateAttendance: function() {
                var vm = this;
                axios.put('/panel/attendance/' + this.user_id + '/' + this.week_id)
                     .then(function (response) {
                        vm.vueValue = response.data;
                    });
            },
            deleteAttendance: function() {
                var vm = this;
                axios.delete('/panel/attendance/' + this.user_id + '/' + this.week_id)
                     .then(function (response) {
                        vm.vueValue = 'null';
                    });
            }
        },
        created: function() {
            this.vueValue = this.value;
            /*var vue = this;
            axios.get('/panel/attendance/' + this.user_id + '/' + this.week_id)
            .then(function (response) {
                vue.value = response.data;
            });*/
        }
        
    }
</script>
<style>

.attendance {
    text-align: center;
}
.attendance:hover {
    cursor: pointer;
}

</style>

