const STORAGE_KEY = 'driver-calculator-storage';

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
			spreadsheet: '',
			lineitems: [],
			totalAmount: 0,
			calcItems: [],
			xferFrom: -1,
			xferTo: -1,
			mxfer: false
		};
	},
	created() {
		//localStorage.removeItem(STORAGE_KEY);
		this.lineitems = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
		// if lineitems is empty, create array of 14 rows (0-13)
		console.log(isEmpty(this.lineitems));
		if (isEmpty(this.lineitems)) {
			for (let cntr = 0; cntr < 20; cntr++) {
				this.lineitems.push({ desc: '', id: cntr, amount: '', pos: false, calc: true });
			}
			localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
		}
		this.calcTotalAmount();
	},
	methods: {
		saveRow() {
			localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
		},
		addRow(cntr) {
			this.lineitems.push({ desc: '', id: cntr, amount: '', pos: false, calc: true });
		},

		fpArithmetic: function(op, x, y) {
			var n = {
				'*': x * y,

				'-': x - y,

				'+': x + y,

				'/': x / y
			}[op];
			return Math.round(n * 100) / 100;
		},
		calcTotalAmount: function() {
			this.totalAmount = 0;
			let ttlAmount = 0;
			// this.lineitems.forEach(lineitem => {
			// 	ttlAmount = 0;
			// 	ttlAmount = this.fpArithmetic('+', parseFloat(this.totalAmount), parseFloat(lineitem.amount));
			// 	//console.log(lineitem.amount + '+' + ttlAmount);
			// 	if (!isNaN(ttlAmount)) {
			// 		if (lineitem.calc == true) this.totalAmount = ttlAmount;
			// 		//console.log(this.totalAmount + ' ' + lineitem.amount + ' ' + ttlAmount + ' ' + lineitem.calc);
			// 	}
			// });

			filteredItems = this.lineitems.filter(item => {
				return item.calc == true && item.amount != '';
			});

			console.log(filteredItems);

			ttlAmount = filteredItems.reduce((currentTotal, item) => {
				return this.fpArithmetic('+', parseFloat(item.amount), parseFloat(currentTotal));
			}, 0);

			//console.log(ttlAmount);
			this.totalAmount = ttlAmount;

			//console.log(this.totalAmount);
			localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
		},
		transfer: function(checkedItem) {
			// transferring from one line item to the next requires
			// memorizing where to copy the value from and to
			// clearing the from value
			//console.log(checkedItem);
			if (checkedItem == true) {
				// let foundFirstColumn = -1;
				// let foundLastColumn = -1;
				// this.lineitems.forEach(function(value, i) {
				// 	//console.log('%d: %s %s', i, value.pos, value.calc);
				// 	if (foundFirstColumn == -1 && value.pos) foundFirstColumn = i;
				// 	if (foundLastColumn == -1 && value.calc) foundLastColumn = i;
				// });
				alert(checkedItem);
				if (this.transferFromToColumns()) {
					//console.log(this.checkedRow(pos), this.checkedRow(calc));
					//console.log(this.lineitems[3].amount, this.lineitem[0].desc);

					alert('transfer');
					this.lineitems[0].amount = '11.01';

					//this.processTransfer(100, 1);
					localStorage.setItem(STORAGE_KEY, JSON.stringify(this.lineitems));
				} else {
					alert('Please check items in last and first columns.');
					//this.clearFirstColumnCheckboxes();
				}
			}
		},
		transferFromToColumns: function() {
			this.xferFrom = -1;
			this.xferTo = -1;
			let foundItem = [];

			foundItem = this.lineitems.find(item => {
				return item.pos === true;
			});
			if (!isEmpty(foundItem)) {
				console.log(foundItem.id);
				this.xferFrom = foundItem.id;
			}

			foundItem = this.lineitems.find(item => {
				return item.calc === true;
			});
			if (!isEmpty(foundItem)) {
				console.log(foundItem);
				this.xferTo = foundItem.id;
			}
			if (this.xferFrom != -1 && this.xferTo != -1) {
				return true; // success
			} else {
				return false; // failed
			}
		},
		processTransfer: function(amount, to) {},
		clearFirstColumnCheckboxes: function() {
			this.lineitems.forEach(lineitem => {
				//lineitem.pos = false;
			});
		},
		mtransfer: function() {
			//alert('xfer');
			closeSideMenu();
			this.clearFirstColumnCheckboxes();
			// change bg orange
			document.body.style.background = 'orange';
			// wait for click - store value

			// change bg blue
			document.body.style.background = 'blue';
			// wait for click - store value
			// change bg grey
			document.body.style.background = '#ccc';
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
