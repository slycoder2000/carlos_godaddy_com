const STORAGE_KEY = 'driver-vehicle-storage';

function isEmpty(obj) {
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) return false;
	}
	return true;
}

new Vue({
	el: '#wrapper',
	data() {
		return {};
	},
	created() {
		//localStorage.removeItem(STORAGE_KEY);
		this.lineitems = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
		// if lineitems is empty, create array of 14 rows (0-13)
		// console.log(isEmpty(this.lineitems));
		// if (isEmpty(this.lineitems)) {
		// 	for (let cntr = 0; cntr < 20; cntr++) {
		// 		this.lineitems.push({ desc: '', id: cntr, amount: '', pos: false, calc: true });
		// 	}
		// 	localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
		// }
		// this.calcTotalAmount();
	},
	methods: {
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
