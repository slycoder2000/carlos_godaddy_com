const form = document.querySelector('form');

const buttonClear = document.getElementById('btnClear');

const buttonSaveCalc = document.getElementById('btnSaveCalc');

const input = document.getElementById('item');

//other constant declarations here

//let itemsArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];

//localStorage.setItem('items', JSON.stringify(itemsArray));

//const data = JSON.parse(localStorage.getItem('items'));

//data.forEach(item => {

//	liMaker(item);

//});

var fpArithmetic = function(op, x, y) {
	var n = {
		'*': x * y,

		'-': x - y,

		'+': x + y,

		'/': x / y
	}[op];

	return Math.round(n * 100) / 100;
};

LoadFromStorage();

buttonClear.addEventListener('click', function() {
	localStorage.clear();
});

buttonSaveCalc.addEventListener('click', function() {
	CalcAndSave();
});

function AddToTotal(amt) {
	var f1 = document.getElementById('amt0').value;

	var f2 = document.getElementById('amt' + amt).value;

	var f3 = fpArithmetic('+', parseFloat(f1), parseFloat(f2));

	if (!isNaN(f3) && document.getElementById('calc' + amt).checked) document.getElementById('amt0').value = f3;
}

function CalcAndSave() {
	document.getElementById('amt0').value = 0;

	AddToTotal('01');

	AddToTotal('02');

	AddToTotal('03');

	AddToTotal('04');

	AddToTotal('05');

	AddToTotal('06');

	AddToTotal('07');

	AddToTotal('08');

	AddToTotal('09');

	AddToTotal('10');

	AddToTotal('11');

	AddToTotal('12');

	AddToStorage('01');

	AddToStorage('02');

	AddToStorage('03');

	AddToStorage('04');

	AddToStorage('05');

	AddToStorage('06');

	AddToStorage('07');

	AddToStorage('08');

	AddToStorage('09');

	AddToStorage('10');

	AddToStorage('11');

	AddToStorage('12');
}

function AddToStorage(field) {
	var f1 = document.getElementById('pos' + field).checked;

	var f2 = document.getElementById('desc' + field).value;

	var f3 = document.getElementById('amt' + field).value;

	var f4 = document.getElementById('calc' + field).checked;

	localStorage.setItem('hhpos' + field, f1);

	localStorage.setItem('hhdesc' + field, f2);

	localStorage.setItem('hhamt' + field, f3);

	localStorage.setItem('hhcalc' + field, f4);
}

function LoadFromStorage() {
	ReadStorageFields('01');

	ReadStorageFields('02');

	ReadStorageFields('03');

	ReadStorageFields('04');

	ReadStorageFields('05');

	ReadStorageFields('06');

	ReadStorageFields('07');

	ReadStorageFields('08');

	ReadStorageFields('09');

	ReadStorageFields('10');

	ReadStorageFields('11');

	ReadStorageFields('12');

	CalcAndSave();
}

function ReadStorageFields(field) {
	//let itemsArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];

	if (localStorage.getItem('hhpos' + field)) {
		let f1 = localStorage.getItem('hhpos' + field);

		if (f1 == 'true') {
			document.getElementById('pos' + field).checked = true;
		} else {
			document.getElementById('pos' + field).checked = false;
		}
	}

	if (localStorage.getItem('hhdesc' + field)) {
		document.getElementById('desc' + field).value = localStorage.getItem('hhdesc' + field);
	}

	if (localStorage.getItem('hhamt' + field)) {
		document.getElementById('amt' + field).value = localStorage.getItem('hhamt' + field);
	}

	if (localStorage.getItem('hhcalc' + field)) {
		let f4 = localStorage.getItem('hhcalc' + field);

		if (f4 == 'true') {
			document.getElementById('calc' + field).checked = true;
		} else {
			document.getElementById('calc' + field).checked = false;
		}
	}
}
