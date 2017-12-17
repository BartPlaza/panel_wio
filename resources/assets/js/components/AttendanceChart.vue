<template>
	<canvas id="attendanceChart" height="100px"></canvas>
</template>
<script>
	import Chart from 'chart.js';
	
	export default{
		data: function(){
			return {
				weeks_id: [],
				weeks: [],
				sum: [],
				total: [],
				chart: ''
			}
		},
		created: function() {
			eventBus.$on('drawChart', ([sum, total, week])=>{
				this.weeks_id.push(week);
				this.weeks.push('T'+ (this.weeks.length+1));
				this.sum.push(sum);
				this.total.push(total);
			});
			eventBus.$on('updateChart', ([sum, total, week])=>{
				var index = this.weeks_id.indexOf(week);
				this.sum[index] = sum;
				this.total[index] = total;
				this.chart.update();
			});
		},
		mounted: function(){
			this.chart = new Chart(this.$el, {
				type: 'line',
			    data: {
			  		labels: this.weeks,
			        datasets: [{
			        	label: 'Obecności',
			            data: this.sum
			        },{
			        	label: 'Wszyscy',
			        	data: this.total,
			        	fill: false
			        }]
			    },
			    options: {
        			elements: {
            			line: {
               				 tension: 0, // disables bezier curves
            			}
        			}
        		}
			});
		}
	}
</script>
<style>

</style>