// this code can be used to return the current day of the week
// as well as the nth day of the month (3rd Wednesday)
// console.log(dayofweek + " " + getNumber())

// 4 dates are used with these functions
// weekday = An array that consists of the days of the week
// d = today's current date.
// dayofweek = today's day of week in words

const weekday = new Array(7);

weekday[0] = 'Sunday';
weekday[1] = 'Monday';
weekday[2] = 'Tuesday';
weekday[3] = 'Wednesday';
weekday[4] = 'Thursday';
weekday[5] = 'Friday';
weekday[6] = 'Saturday';

const d = new Date();

const dayofweek = weekday[d.getDay()];

// This function goes from the first day of the month to current day
// and for every day of the week that equals today's weekday, getNum is incremented.
// getNum is returned  indicating the nth weekday of the month.
const getNumber = () => {
	getNum = 0;

	//first day of month
	let runningDate = new Date(d.getFullYear(), d.getMonth(), 1);

	while (runningDate <= d) {
		if (runningDate.getDay() == d.getDay()) {
			getNum++;
			// console.log(runningDate);
		}
		runningDate.setDate(runningDate.getDate() + 1);
	}

	return getNum;
};

const getLinkMapLocation = objElement => {
	let myLink = "<a href='https://www.google.com/maps/place/";

	myLink += encodeURIComponent(objElement.Address);

	if (typeof objElement.Address2 !== 'undefined') {
		myLink += encodeURIComponent(' ' + objElement.Address2);
	}

	myLink += "' target='_new'>";

	return myLink;
};

// console.log(d);

const chkAllDays = (fbStatus, chkDay, chkDayNum) => {
	// chkDay = objElement.calcDay1;
	// chkDayNum = objElement.calcDayNum1;

	if (fbStatus == '*** OPEN ***') return '*** OPEN ***';

	if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {
		if (chkDay == dayofweek && (chkDayNum == '0' || chkDayNum == getNumber())) {
			return '*** OPEN ***';
		}
	}
	return '*** Closed ***';
};

const chkStatus = objElement => {
	// default to close
	let fbStatus = '*** Closed ***';

	fbStatus = chkAllDays(fbStatus, objElement.calcDay1, objElement.calcDayNum1);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay2, objElement.calcDayNum2);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay3, objElement.calcDayNum3);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay4, objElement.calcDayNum4);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay5, objElement.calcDayNum5);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay6, objElement.calcDayNum6);
	fbStatus = chkAllDays(fbStatus, objElement.calcDay7, objElement.calcDayNum7);

	// console.log(objElement);

	//console.log(objElement.calcDay1);

	//console.log(objElement.calcDayNum1);

	return fbStatus;
};

const writeBlock = objElement => {
	let mySubString = `
<div class='card' style='min-width: 12rem';>
  <div class='card-body'>
    <h5 class='card-title'>${objElement.Name}</h5><br>
      ${objElement.Phone}<br>
      ${getLinkMapLocation(objElement)}${objElement.Address}
      `;

	if (typeof objElement.Address2 !== 'undefined') {
		mySubString += '<br>' + objElement.Address2 + '<br>';
	}

	mySubString += `</br></a>

      ${objElement.Days}<br>
      ${objElement.StartTime} - ${objElement.EndTime}<br>
      `;

	if (typeof objElement.Notes !== 'undefined') {
		mySubString += objElement.Notes;
		mySubString += '<br>';
	}

	myStatus = chkStatus(objElement);
	if (myStatus == '*** OPEN ***') {
		mySubString += "<span class='alert-success'>";
	} else if (myStatus == '*** Closed ***') {
		mySubString += "<span class='text-danger'>";
	}

	mySubString += myStatus;

	if (myStatus == '*** OPEN ***') {
		mySubString += '</span>';
	} else if (myStatus == '*** Closed ***') {
		mySubString += '</span>';
	}

	mySubString += '</div>';
	mySubString += '</div>';

	//mySubString += "</div>";

	return mySubString;
};
