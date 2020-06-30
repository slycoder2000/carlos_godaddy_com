<template>
	<form class="spreadsheet">
		<div v-for="lineitem in lineitems" class="lineitem">
			<input
				type="text"
				v-model="lineitem.mileage"
				style="width:10em"
				placeholder="mileage"
				@change="calcTotalAmount()"
				@keyup="calcTotalAmount()"
			/>
		</div>
	</form>
</template>

<script>
export default {
	data: function() {
		return {
			STORAGE_KEY: 'driver-vehicle-storage',
			spreadsheet: '',
			lineitems: [{ mileage: 1000 }, { mileage: 3000 }, { mileage: 5000 }],
			oilChangeFrequency: 2000
		};
	},

	created() {
		//localStorage.removeItem(this.STORAGE_KEY);
		//console.log(this.STORAGE_KEY + '-goal');
		this.lineitems = JSON.parse(
			localStorage.getItem(this.STORAGE_KEY) || '[{ mileage: 1000 }, { mileage: 3000 }, { mileage: 5000 }]'
		);
		//this.mileage = localStorage.getItem(this.STORAGE_KEY + '-mileage');
		this.oilChangeFrequency = localStorage.getItem(this.STORAGE_KEY + '-oil-change-frequency');
		this.calcTotalAmount();
	},
	methods: {
		isEmpty: function(obj) {
			for (var key in obj) {
				if (obj.hasOwnProperty(key)) return false;
			}
			return true;
		},
		calcTotalAmount: function() {
			this.totalAmount = 0;
			//			for (let cntr = 0; cntr < 3; cntr++) {
			//				this.totalAmount = parseInt(this.totalAmount) + parseInt(this.lineitems[cntr].amount);
			//			}

			localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
			this.saveMileage();
		},
		saveMileage: function() {
			//this.diffGoalTotalAmount = parseInt(this.goal) - parseInt(this.totalAmount);
			//this.goalEachDay = Math.ceil(this.diffGoalTotalAmount / this.goalDays);
			localStorage.setItem(this.STORAGE_KEY + '-oil-change-frequency', this.oilChangeFrequency);
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
