<template>
<span>
	<i v-if="locked" v-on:click="lock" class="fa fa-lock locker" aria-hidden="true"></i>
	<i v-else v-on:click="lock" class="fa fa-unlock-alt locker" aria-hidden="true"></i>
</span>
</template>

<script>
export default {
	props: ['week_id'],
	data: function() {
		return {
			locked: false
		}
	}, 
	methods: {
		lock: function() {
			this.locked = !this.locked;
			eventBus.$emit('lockedChange', this.week_id);
		}
	}


}
</script>
<style>
.locker {
	font-size: 10px;
}
.locker:hover {
	cursor: pointer;
}
</style>