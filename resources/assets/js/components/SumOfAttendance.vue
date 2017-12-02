<template>
	<div class="sumOfAttendance">
		{{sum + '/' + total}}
	</div>
</template>
<script>
	export default {
		props: ['week_id'],
		data: function(){
			return {
				sum: 0,
				total: 0
			}
		},
		methods: {
			updateChart: function(){
				eventBus.$emit('updateChart', [this.sum, this.total, this.week_id]);
			}
		},
		watch: {
			sum: function() {
				this.updateChart();
			},
			total: function() {
				this.updateChart();
			}
		},
		created: function(){
			eventBus.$on('sumCreate', ([value, week])=>{
				if((value != 'null') && (week == this.week_id)) {
					this.sum += parseInt(value);
					this.total++;
				}
			});
			eventBus.$on('sumUpdate', ([value, week])=>{
				if(week == this.week_id) {
					if(value == 1){
						this.sum ++;
						this.total++;
					} else if(value == 0){
						this.sum --;
					} else if(value == null){
						this.total--;
					}
				}
			});
		},
		mounted: function(){
			eventBus.$emit('drawChart', [this.sum, this.total, this.week_id]);
		}
	}

</script>