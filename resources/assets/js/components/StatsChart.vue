<template>
	<div id="stats-container">
		<div id="stats-menu">
			<div class="stats-menu-item"
				 v-bind:class="{'item-active' : activeItem == 'attendance'}"
				 v-on:click="showAttendance">Obecność
			</div>
			<div class="stats-menu-item"
				 v-bind:class="{'item-active' : activeItem == 'sex'}"
				 v-on:click="showSex">Płeć
			</div>
			<div class="stats-menu-item"
				 v-bind:class="{'item-active' : activeItem == 'age'}"
				 v-on:click="showAge">Wiek
			</div>
		</div>
		<canvas ref="statsChart" id="statsChart" height="100px"></canvas>
	</div>
</template>
<script>
	import Chart from 'chart.js';
	
	export default{
		props: ['weeks', 'present_users', 'all_users','males', 'females'],
		data: function(){
			return {
				vueWeeks: [],
				vuePresentUsers: [],
				vueAllUsers: [],
				vueMales: [],
				vueFemales: [],
				chart: '',
				activeItem: 'attendance'
			}
		},
		methods: {
			generateWeeks: function(){
				for(var i = 1; i <= this.weeks; i++){
					this.vueWeeks.push('T' + i);
				}
			},
			generateAttendance: function(){
				this.chart = new Chart(this.$refs.statsChart, {
				type: 'line',
			    data: {
			  		labels: this.vueWeeks,
			        datasets: [{label: 'Obecni', data: this.vuePresentUsers},
			        		   {label: 'Wszyscy', data: this.vueAllUsers, fill: false}]
			    },
			    options: {
        			elements: {
            			line: {
               				 tension: 0, // disables bezier curves
            			}
        			}
        		}
			});
			},
			generateSex: function(){
				this.chart = new Chart(this.$refs.statsChart, {
				type: 'bar',
			    data: {
			  		labels: this.vueWeeks,
			        datasets: [{label: 'Mężczyźni', data: this.vueMales, backgroundColor: '#5bc0de'},
			        		   {label: 'Kobiety', data: this.vueFemales, backgroundColor: '#d9534f'}]
			    },
			    options: {
        			elements: {
            			line: {
               				 tension: 0, // disables bezier curves
            			}
        			}
        		}
			});
			},
			generateAge: function(){
				this.chart = new Chart(this.$refs.statsChart, {
				type: 'bar',
			    data: {
			  		labels: this.vueWeeks,
			        datasets: [{label: 'Mężczyźni', data: this.vueMales, backgroundColor: '#5bc0de'},
			        		   {label: 'Kobiety', data: this.vueFemales, backgroundColor: '#d9534f'}]
			    },
			    options: {
			    	scales: {
			    		xAxes: [{ stacked: true }],
			    		yAxes: [{ stacked: true }]
			    	},
        			elements: {
            			line: {
               				 tension: 0, // disables bezier curves
            			}
        			}
        		}
			});
			},
			showAttendance: function(){
				this.activeItem = 'attendance'
				if(this.chart != ''){
					this.chart.destroy()
				};
				this.generateAttendance();
			},
			showSex: function(){
				this.activeItem = 'sex';
				this.chart.destroy();
				this.generateSex();
			},
			showAge: function(){
				this.activeItem = 'age';
				this.chart.destroy();
				this.generateAge();
			}
		},
		created: function() {
			this.generateWeeks();
			this.vuePresentUsers = JSON.parse(this.present_users);
			this.vueAllUsers = JSON.parse(this.all_users);
			this.vueMales = JSON.parse(this.males);
			this.vueFemales = JSON.parse(this.females);
		},
		mounted: function(){
			this.showAttendance();
		}
	}
</script>
<style>
	#stats-container{
		border: 1px solid darkgrey;
	}
	#stats-menu{
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		background-color: lightgrey;
	}
	.stats-menu-item{
		padding:5px;
		background-color: lightgrey;
		border-bottom: 1px solid darkgrey;
		border-right: 1px solid darkgrey;
	}
	.stats-menu-item:hover{
		cursor:pointer;
	}
	.item-active{
		background-color: #f7f7f7;
		border: none;
		border-top: 2px solid darkgrey;
		border-right: 1px solid darkgrey;
		cursor: default;
		pointer-events: none;
	}
</style>