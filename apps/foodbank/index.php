<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Colorado Food Banks</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/scripts/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
    // this code can be used to return the current day of the week
    // as well as the nth day of the month (3rd Wednesday)
    // console.log(dayofweek + " " + getNumber())

    // 4 dates are used with these functions
    // weekday = An array that consists of the days of the week
    // d = today's current date.
    // dayofweek = today's day of week in words

    const weekday = new Array(7);

    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

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
    }


    const getLinkMapLocation = objElement => {

        let myLink = "<a href='https://www.google.com/maps/place/";

        myLink += encodeURIComponent(objElement.Address);

        if (typeof objElement.Address2 !== 'undefined') {
            myLink += encodeURIComponent(" " + objElement.Address2);
        }

        myLink += "' target='_new'>";

        return myLink;

    }



    // console.log(d);

    const chkAllDays = (fbStatus, chkDay, chkDayNum) => {
        // chkDay = objElement.calcDay1;
        // chkDayNum = objElement.calcDayNum1;

        if (fbStatus == "*** OPEN ***") return "*** OPEN ***";

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }
        return "*** Closed ***";

    }

    const chkStatus = (objElement) => {

        // default to close
        let fbStatus = "*** Closed ***";

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

    }



    const writeBlock = objElement => {

        let mySubString = `
<div class='card' style='min-width: 12rem';>
  <div class='card-body'>
    <h5 class='card-title'>${objElement.Name}</h5><br>
      ${objElement.Phone}<br>
      ${getLinkMapLocation(objElement)}${objElement.Address}
      `

        if (typeof objElement.Address2 !== 'undefined') {
            mySubString += "<br>" + objElement.Address2 + "<br>";
        }

        mySubString += `</br></a>

      ${objElement.Days}<br>
      ${objElement.StartTime} - ${objElement.EndTime}<br>
      `

        if (typeof objElement.Notes !== 'undefined') {
            mySubString += objElement.Notes;
            mySubString += "<br>";
        }

        myStatus = chkStatus(objElement)
        if (myStatus=='*** OPEN ***') {
            mySubString += "<span class='alert-success'>";
        } else if (myStatus=='*** Closed ***') {
            mySubString += "<span class='text-danger'>";
}

        mySubString += myStatus

        if (myStatus=='*** OPEN ***') {
            mySubString += '</span>';
} else if (myStatus=='*** Closed ***') {
    mySubString += '</span>';
}

        mySubString += "</div>";
        mySubString += "</div>";

        //mySubString += "</div>";

        return mySubString;

    }



</script>

</head>

<body>

    <h1 class="text-center">Food Banks</h1>
    <div id="FoodBanks"></div>

    <script>

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            const myObj = JSON.parse(this.responseText);
            let arrayLen = 0;
            let myString = "";
            var cityNoSpace = "";


            for (city in myObj.FoodBanks[0]) {

                //console.log(city);
                cityNoSpace = city+"";
                cityNoSpace = cityNoSpace.replace(" ","");
                //console.log(cityNoSpace)
                //console.log(myObj.FoodBanks[0][city].length);

                arrayLen = myObj.FoodBanks[0][city].length
                myString += `
                
<section id='${cityNoSpace}'>
  <div style='padding-top:40px;'><div class='container'>
    <h2><button type='button' data-toggle='collapse' data-target='#collapse${cityNoSpace}' aria-expanded='true' aria-controls='collapse${cityNoSpace}'>
    ${city}</button></h2>
  </div></div>

  <div id='collapse${cityNoSpace}' class='card-deck collapse hide' aria-labelledby='headingOne' data-parent='#${cityNoSpace}'>

`
                for (icnt = 0; icnt < arrayLen; icnt++) {
                    myString += writeBlock(myObj.FoodBanks[0][city][icnt]);
                }

                myString += `
  </div>
</section>
 

 `
            }

            document.getElementById("FoodBanks").innerHTML = myString;

            //console.log(myObj);

            console.log(myString);

        }

    };


    xmlhttp.open("GET", "foodbank.json", true);
    xmlhttp.send();

    </script>

    <script src="/scripts/jquery-3.3.1.min.js"></script>
    <script src="/scripts/popper.js"></script>
    <script src="/scripts/bootstrap-4.3.1/js/bootstrap.js"></script>

</body>


</html>
