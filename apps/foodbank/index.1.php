<?php
/*

//display current date and time
echo "today is ". date('l, F j, Y');
echo "the time is ". date("g:i:s a");

$timestamp = strtotime("7/4/2019");
echo date("m/d/Y", $timestamp);

$timestamp = strtotime("+3 weeks", "12/25/2019");

$date = new DateTime();
echo $date->modify("Nov 11, 1918 11:00")->format("g:i:s a, F j, Y");
echo $date ->modify("+1 month") ->format("F j,Y")."<br>";

$interval = DateInterval::createFromDateString("third Thursday of next month");
$int_mon = DateInterval::createFromDateString("every Monday");
$int_mon = DateInterval::createFromDateString("every Monday");

$start = new DateTime("Dec 31, 2018");
$end = new DateTime("Jan 1, 2020");
$meetings = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
foreach ($meetings as $meeting) {
    echo $meeting->format('l, F j, Y') . '<br>';
}
*/
$today = date("Y-m-d");
//$today = date("Y-m-d", strtotime("6/7/2019"));


function getDateForSpecificDayBetweenDates($startDate, $endDate, $day_number)
{
    $endDate = strtotime($endDate);
    $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
    for ($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
        $date_array[] = date('Y-m-d', $i);

    return $date_array;
}

// beginning of this month
$start = (new DateTime('first day of this month'))->format('m/d/Y');
// end of next month + 1 day
$ts_start = new DateTime($start);
$end = $ts_start->modify("+2 month")->format('m/d/Y');
//echo $start. "-". $end;

echo $today;
?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/scripts/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>
            function() {

            }
        </script>


</head>

<body>
    <h1 class="text-center">Food Banks</h1>

    <section id="Arvada" class="row">
        <div class="col-xl-12">
            <h2>Arvada</h2>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
            <strong>New Apostolic Church Food Pantry</strong><br>
            720.722.3663 <br>
            5290 Vance St. Arvada, CO 80002 <br>
            Open every Wednesday <br>
            9:00AM-11:00AM <br>
            <?php
            $open_text = "Closed";
            foreach (getDateForSpecificDayBetweenDates($start, $end, 3) as $key => $value) {
                //echo $value. "<br>";
                if ($value == $today) {
                    $open_text = "Open";
                }
            }
            echo "*** " . $open_text . " ***<br>";

            ?>

        </div>

    </section>


    <section id="Aurora" class="row">
        <div class="col-xl-12">
            <h2>Aurora</h2>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
            <strong>Ansar Pantry</strong><br>
            303.459.2153 <br>
            6251 E. Colfax Ave $208 <br>
            Aurora, CO  80011 <br>
            Each Saturday of each month. <br>
            9:00AM-12:00PM <br>
            <?php
            $open_text = "Closed";
            foreach (getDateForSpecificDayBetweenDates($start, $end, 6) as $key => $value) {
                //echo $value. "<br>";
                if ($value == $today) {
                    $open_text = "Open";
                }
            }
            echo "*** " . $open_text . " ***<br>";

            ?>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
            <strong>Aurora Interfaith Community Services</strong><br>
            303.360.0260 <br>
            1553 Clinton St. Aurora, CO  80010 <br>
            Monday, Tuesday & Friday <br>
            8:30AM-1:00PM <br>
            Call by 8:30AM for same day appointment<br>
            <?php
            $open_text = "Closed";
            foreach (getDateForSpecificDayBetweenDates($start, $end, 1) as $key => $value) {
                //echo $value. "<br>";
                if ($value == $today) {
                    $open_text = "Open";
                }
            }
            foreach (getDateForSpecificDayBetweenDates($start, $end, 2) as $key => $value) {
                //echo $value. "<br>";
                if ($value == $today) {
                    $open_text = "Open";
                }
            }
            foreach (getDateForSpecificDayBetweenDates($start, $end, 5) as $key => $value) {
                //echo $value. "<br>";
                if ($value == $today) {
                    $open_text = "Open";
                }
            }
            echo "*** " . $open_text . " ***<br>";

            ?>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">

            <strong>Colfax Community Network</strong><br>
            303.360.9175 <br>
            1585 Kingston St. Aurora, CO  80010 <br>
            Monday - Thursday <br>
            9:00AM-12:00PM <br>
            <?php
            $open_text = "Closed";
            for ($cntr=1; $cntr <5 ; $cntr++) {

                foreach (getDateForSpecificDayBetweenDates($start, $end, $cntr) as $key => $value) {
                    //echo $value. "<br>";
                    if ($value == $today) {
                        $open_text = "Open";
                    }
                }
            }            echo "*** " . $open_text . " ***<br>";

            ?>

        </div>

        <div id="demo">
        </div>


        <ul id="list"></ul>

        <script>
        console.log("test1");
            var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    document.getElementById("demo").innerHTML = myObj.FoodBanks[0].Aurora[1].Name;
    console.log(myObj);

  }
};
xmlhttp.open("GET", "foodbank.json", true);
xmlhttp.send();

//console.log(this.readyState ."  " . this.status);


function getTuesdays(month, year) {
    var d = new Date(year, month, 1),
        tuesdays = [];

    d.setDate(d.getDate() + (9 - d.getDay()) % 7)
    while (d.getMonth() === month) {
        tuesdays.push(new Date(d.getTime()));
        d.setDate(d.getDate() + 7);
    }

    return tuesdays;
}

var meetingTuesdays = [],
    ul = document.getElementById("list"),
    temp,
    li,
    i;

for ( i = 0; i < 12; i += 1) {
    temp = getTuesdays(i, 2013);
    meetingTuesdays.push(temp[1]);
    li = document.createElement("li");
    li.textContent = temp[1];
    ul.appendChild(li);

    meetingTuesdays.push(temp[3]);
    li = document.createElement("li");
    li.textContent = temp[3];
    ul.appendChild(li);
}

console.log(meetingTuesdays);



        </script>


    </section>



    <script src="/scripts/jquery-3.3.1.js"></script>
    <script src="/scripts/umd/popper.js"></script>
    <script src="/scripts/bootstrap-4.3.1/js/bootstrap.js"></script>
</body>

</html>