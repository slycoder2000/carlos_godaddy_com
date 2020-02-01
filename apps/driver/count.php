<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <title>Count</title>
    <script src="/scripts/vue.js"></script>
    <style>
    #driver-nav {
        display: grid;
        grid-gap: 10px;
        padding: 0;
        list-style: none;
        grid-template-columns: repeat(4, 1fr);
    }



    @media screen and (max-width: 750px) {
        input {
            font-size: 4vw;
        }
    }
    </style>
</head>

<body>

    <!--Nav-->
    <div id="wrapper" class="small-container">

        <div id="driver-nav">
            <?php require_once('tabs.php'); ?>

        </div>
        <h1>Drive Counter</h1>

        <form class="spreadsheet">
            <div v-for="lineitem in lineitems" class="lineitem">
                <input type="text" v-model="lineitem.desc" style="width:10em" placeholder="desc"
                    @change="calcTotalAmount()" @keyup="calcTotalAmount()"> <input type="button" value="+"
                    @click="increment(lineitem.id)">
                <input type="text" v-model="lineitem.amount" style="width: 4em" placeholder="amount"
                    @change="calcTotalAmount()" @keyup="calcTotalAmount()"> <input type="button" value="-"
                    @click="decrement(lineitem.id)"><br>
            </div>


            <div style="font-size: 2em; padding-left:1em;">Total Deliveries: {{totalAmount}}
            </div>
            <div style="font-size: 2em; padding-left:1em;">Goal: <input type="text" v-model="goal" style="width: 4em"
                    placeholder="amount" @change="saveGoal()" @keyup="saveGoal()">
            </div>
            <div style="font-size: 2em; padding-left:1em;">Num to Reach Goal: {{diffGoalTotalAmount}}
            </div>
            <div style="font-size: 2em; padding-left:1em;">Goal Days: <input type="text" v-model="goalDays"
                    style="width: 4em" placeholder="amount" @change="saveGoal()" @keyup="saveGoal()">
            </div>
            <div style="font-size: 2em; padding-left:1em;">Each Day: {{goalEachDay}}
            </div>

        </form>
    </div>

    <script src="js/count.js"></script>

</body>

</html>