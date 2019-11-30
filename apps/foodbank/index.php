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

    var weekday = new Array(7);

    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    var d = new Date();

    var dayofweek = weekday[d.getDay()];


    function getNumber() {
        getNum = 0;

        //first day of month
        var runningDate = new Date(d.getFullYear(), d.getMonth(), 1);

        while (runningDate <= d) {

            if (runningDate.getDay() == d.getDay()) {
                getNum++;
                // console.log(runningDate);
            }
            runningDate.setDate(runningDate.getDate() + 1);

        }

        return getNum;
    }

    // console.log(d);
    </script>

</head>

<body>

    <h1 class="text-center">Food Banks</h1>
    <div id="FoodBanks"></div>

    <script>

    function chkStatus(objElement) {

        // default to close
        var fbStatus = "*** Closed ***";
        var chkDay = "";
        var chkDayNum = "";
        // check day1 to see if open
        // check daynum1 to see if open


        chkDay = objElement.calcDay1;
        chkDayNum = objElement.calcDayNum1;

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }


        chkDay = objElement.calcDay2;
        chkDayNum = objElement.calcDayNum2;

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }


        chkDay = objElement.calcDay3;
        chkDayNum = objElement.calcDayNum3;

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }


        chkDay = objElement.calcDay4;
        chkDayNum = objElement.calcDayNum4;

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }


        chkDay = objElement.calcDay5;
        chkDayNum = objElement.calcDayNum5;

        if (chkDay !== 'undefined' && chkDayNum !== 'undefined') {

            if (chkDay == dayofweek && (chkDayNum == "0" || chkDayNum == getNumber())) {
                return "*** OPEN ***"
            }

        }


        console.log(objElement);

        console.log(objElement.calcDay1);

        console.log(objElement.calcDayNum1);

        return fbStatus;

    }



    function writeBlock(objElement) {

        var mySubString = "";

        //mySubString += "<div class='col-sm-12 col-md-6 col-lg-2'>";

        mySubString += "<div class='card' style='min-width: 12rem';>";
        mySubString += "<div class='card-body'>";

        mySubString += "<h5 class='card-title'>"

        mySubString += objElement.Name;
        mySubString += "</h5><br>";

        mySubString += objElement.Phone;
        mySubString += "<br>";

        mySubString += getLinkMapLocation(objElement);
        mySubString += objElement.Address;


        if (typeof objElement.Address2 !== 'undefined') {
            mySubString += "<br>";
            mySubString += objElement.Address2;
            mySubString += "<br>";
        }

        mySubString += "</br>";
        mySubString += "</a>";

        mySubString += objElement.Days;
        mySubString += "<br>";

        mySubString += objElement.StartTime + "-" + objElement.EndTime;
        mySubString += "<br>";

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



    function getLinkMapLocation(objElement) {

        var myLink = "<a href='https://www.google.com/maps/place/";

        myLink += encodeURIComponent(objElement.Address);

        if (typeof objElement.Address2 !== 'undefined') {
            myLink += encodeURIComponent(" " + objElement.Address2);
        }

        myLink += "' target='_new'>";

        return myLink;

    }







    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myObj = JSON.parse(this.responseText);
            var arrayLen = 0;
            var myString = "";
            var cityNoSpace = "";


            for (city in myObj.FoodBanks[0]) {

                //console.log(city);
                cityNoSpace = city+"";
                cityNoSpace = cityNoSpace.replace(" ","");
                //console.log(cityNoSpace)
                //console.log(myObj.FoodBanks[0][city].length);

                arrayLen = myObj.FoodBanks[0][city].length
                myString += '\r\n\r\n'

                myString += "<section id='" + cityNoSpace + "'>";

                myString += "<div style='padding-top:40px;'><div class='container'>";
                myString += "<h2><button type='button' data-toggle='collapse' data-target='#collapse"+cityNoSpace+"' aria-expanded='true' aria-controls='collapse"+cityNoSpace+"'>" + city + "</button></h2>";
                myString += "</div></div>";

                myString += '\r\n\r\n'

                myString += "<div id='collapse"+cityNoSpace+"' class='card-deck collapse hide' aria-labelledby='headingOne' data-parent='#"+cityNoSpace+"'>";

                for (icnt = 0; icnt < arrayLen; icnt++) {
                    myString += writeBlock(myObj.FoodBanks[0][city][icnt]);
                }

                myString += "</div>";

                myString += "</section>";
                myString += '\r\n\r\n'

            }

            document.getElementById("FoodBanks").innerHTML = myString;

            console.log(myObj);

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
