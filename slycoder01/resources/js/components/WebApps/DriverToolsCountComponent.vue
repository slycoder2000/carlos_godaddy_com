<template>
	<form class="spreadsheet">
		<div v-for="lineitem in lineitems" class="lineitem">
			<input
				type="text"
				v-model="lineitem.desc"
				style="width:10em"
				placeholder="desc"
				@change="calcTotalAmount()"
				@keyup="calcTotalAmount()"
			/>
			<input type="button" value="+" @click="increment(lineitem.id)" />
			<input
				type="text"
				v-model="lineitem.amount"
				style="width: 4em"
				placeholder="amount"
				@change="calcTotalAmount()"
				@keyup="calcTotalAmount()"
			/>
			<input type="button" value="-" @click="decrement(lineitem.id)" /><br />
		</div>

		<div style="font-size: 2em; padding-left:1em;">Total Deliveries: {{ totalAmount }}</div>
		<div style="font-size: 2em; padding-left:1em;">
			Goal:
			<input
				type="text"
				v-model="goal"
				style="width: 4em"
				placeholder="amount"
				@change="saveGoal()"
				@keyup="saveGoal()"
			/>
		</div>
		<div style="font-size: 2em; padding-left:1em;">Num to Reach Goal: {{ diffGoalTotalAmount }}</div>
		<div style="font-size: 2em; padding-left:1em;">
			Goal Days:
			<input
				type="text"
				v-model="goalDays"
				style="width: 4em"
				placeholder="amount"
				@change="saveGoal()"
				@keyup="saveGoal()"
			/>
		</div>
		<div style="font-size: 2em; padding-left:1em;">Each Day: {{ goalEachDay }}</div>
	</form>
</template>

<script>
export default {
	data: function() {
		return {
			STORAGE_KEY: 'driver-count-storage',
			spreadsheet: '',
			lineitems: [],
			totalAmount: '0',
			goal: '0',
			goalDays: '0',
			diffGoalTotalAmount: '0',
			goalEachDay: '0'
		};
	},

	created() {
		//localStorage.removeItem(this.STORAGE_KEY);
		//console.log(this.STORAGE_KEY + '-goal');
		this.lineitems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]');
		this.goal = localStorage.getItem(this.STORAGE_KEY + '-goal');
		this.goalDays = localStorage.getItem(this.STORAGE_KEY + '-goal-days');
		// if lineitems is empty, create array of 14 rows (0-13)
		// console.log(this.isEmpty(this.lineitems));
		if (this.isEmpty(this.lineitems)) {
			for (let cntr = 0; cntr < 3; cntr++) {
				this.lineitems.push({ id: cntr, desc: '', amount: '' });
			}
		}
		this.goal = this.isEmpty(this.goal) ? '0' : this.goal;
		this.goalDays = this.isEmpty(this.goalDays) ? '0' : this.goalDays;

		this.calcTotalAmount();
	},
	methods: {
		isEmpty: function(obj) {
			for (var key in obj) {
				if (obj.hasOwnProperty(key)) return false;
			}
			return true;
		},
		increment: function(id) {
			this.lineitems[id].amount++;
			console.log(id);
			this.calcTotalAmount();
		},
		decrement: function(id) {
			if (parseInt(this.lineitems[id].amount) > 0) {
				this.lineitems[id].amount--;
			}
			console.log(id);
			this.calcTotalAmount();
		},
		calcTotalAmount: function() {
			this.totalAmount = 0;
			for (let cntr = 0; cntr < 3; cntr++) {
				this.totalAmount = parseInt(this.totalAmount) + parseInt(this.lineitems[cntr].amount);
			}

			localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
			this.saveGoal();
		},
		saveGoal: function() {
			this.diffGoalTotalAmount = parseInt(this.goal) - parseInt(this.totalAmount);
			this.goalEachDay = Math.ceil(this.diffGoalTotalAmount / this.goalDays);
			localStorage.setItem(this.STORAGE_KEY + '-goal', this.goal);
			localStorage.setItem(this.STORAGE_KEY + '-goal-days', this.goalDays);
		},
		eraseLocalStorage: function() {
			//alert('erasing');
			localStorage.removeItem(this.STORAGE_KEY);
			this.lineitems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]');
			// if lineitems is empty, create array of 14 rows (0-13)
			console.log(this.isEmpty(this.lineitems));
			if (this.isEmpty(this.lineitems)) {
				for (let cntr = 0; cntr < 20; cntr++) {
					this.addRow();
				}
			}
			this.calcTotalAmount();
			closeSideMenu();
		}
	},
	computed: {}
};
</script>

<style scoped></style>
