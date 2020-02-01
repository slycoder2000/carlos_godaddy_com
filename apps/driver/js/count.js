const STORAGE_KEY = 'driver-count-storage';

function isEmpty(obj) {
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) return false;
	}
	return true;
}

new Vue({
	el: '#wrapper',
	data() {
		return {
			lineitems: [],
			totalAmount: '0',
			goal: '0',
			goalDays: '0',
			diffGoalTotalAmount: '0',
			goalEachDay: '0'
		};
	},
	created() {
		//localStorage.removeItem(STORAGE_KEY);
		//console.log(STORAGE_KEY + '-goal');
		this.lineitems = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
		this.goal = localStorage.getItem(STORAGE_KEY + '-goal');
		this.goalDays = localStorage.getItem(STORAGE_KEY + '-goal-days');
		// if lineitems is empty, create array of 14 rows (0-13)
		// console.log(isEmpty(this.lineitems));
		if (isEmpty(this.lineitems)) {
			for (let cntr = 0; cntr < 3; cntr++) {
				this.lineitems.push({ id: cntr, desc: '', amount: '' });
			}
		}
		this.goal = isEmpty(this.goal) ? '0' : this.goal;
		this.goalDays = isEmpty(this.goalDays) ? '0' : this.goalDays;

		this.calcTotalAmount();
	},
	methods: {
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

			localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
			this.saveGoal();
		},
		saveGoal: function() {
			this.diffGoalTotalAmount = parseInt(this.goal) - parseInt(this.totalAmount);
			this.goalEachDay = Math.ceil(this.diffGoalTotalAmount / this.goalDays);
			localStorage.setItem(STORAGE_KEY + '-goal', this.goal);
			localStorage.setItem(STORAGE_KEY + '-goal-days', this.goalDays);
		},
		eraseLocalStorage: function() {
			//alert('erasing');
			localStorage.removeItem(STORAGE_KEY);
			this.lineitems = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
			// if lineitems is empty, create array of 14 rows (0-13)
			console.log(isEmpty(this.lineitems));
			if (isEmpty(this.lineitems)) {
				for (let cntr = 0; cntr < 20; cntr++) {
					this.addRow();
				}
			}
			this.calcTotalAmount();
			closeSideMenu();
		}
	},
	computed: {}
});
