<template>
	<span><span v-show="!editing">{{showValue}}</span>
	   <input v-show="editing" v-bind:type="type" v-model="newValue">
	   <i v-show="!editing"
	   	  v-on:click="edit" class="fa fa-pencil btn-sm btn-basic" aria-hidden="true"></i>
	   <i v-show="editing"
	      v-on:click="update" class="fa fa-check btn-sm btn-basic" aria-hidden="true"></i>
	   <i v-show="editing"
	      v-on:click="cancel" class="fa fa-times btn-sm btn-basic" aria-hidden="true"></i>
	</span>
</template>
<script>
	export default{
		props: ['user_id', 'column', 'value', 'type'],
		data: function(){
			return {
				editing: false,
				showValue: '',
				newValue: ''
			}
		},
		methods: {
			edit: function(){
				this.editing = true;
				this.newValue = this.showValue;
			},
			cancel: function(){
				this.editing = false;
				this.newValue = '';
			},
			update: function(){
				this.editing = false;
				axios.put('/panel/user/' + this.user_id + '/' + this.column + '/' + this.newValue);     
				this.showValue = this.newValue;
			}
		},
		created: function(){
			this.showValue = this.value;
		}
	}

	
</script>