<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <title>Calculator</title>

    <script src="/scripts/vue.js"></script>

    <script>
    function openSideMenu() {
        document.getElementById("side-menu").style.width = "250px";
        document.getElementById("wrapper").style.marginLeft = "-250px";
    }

    function closeSideMenu() {
        document.getElementById("side-menu").style.width = "0";
        document.getElementById("wrapper").style.marginLeft = "0";
    }
    </script>

    <style>
    #driver-nav {
        display: grid;
        grid-gap: 10px;
        padding: 0;
        list-style: none;
        grid-template-columns: repeat(5, 1fr);
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


            <!-- Nav -->
            <span class="open-slide">
                <a href="#" onClick="openSideMenu();">
                    <svg width="30" height="30">
                        <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
                        <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
                        <path d="M0,23 30,23" stroke="#000" stroke-width="5" />

                    </svg>
                </a>
            </span>
            <div id="side-menu" class="side-nav">
                <a href="#" onClick="closeSideMenu();" class="btn-close">&times;</a>
                <a href="index.php">Home</a>
                <a href="#" v-on:click.prevent="mtransfer()">Transfer</a>
                <a href="#" v-on:click.prevent="eraseLocalStorage()"
                    tooltip="This will erase the Local Storage variable and clear all the fields.">Clear All</a>
                <a href="#">test2</a>
            </div>

            <nav class="main-nav">

                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#" v-on:click.prevent="mtransfer()">Transfer</a></li>
                    <li><a href="#" v-on:click.prevent="eraseLocalStorage()"
                            tooltip="This will erase the Local Storage variable and clear all the fields.">Clear All</a>
                    </li>
                    <li><a href="#">test2</a></li>
                </ul>
            </nav>

        </div>


        <!-- More will go here -->

        <form class="spreadsheet">

            <div v-for="lineitem in lineitems" class="lineitem">
                <input type="checkbox" v-model="lineitem.pos" @change="saveRow()">
                <!--@change="transfer(lineitem.pos)" -->
                <input type="text" v-model="lineitem.desc" style="width:10em" placeholder="desc" @change="saveRow()"
                    @keyup="saveRow()">
                <input type=" text" v-model="lineitem.amount" style="width: 4em" placeholder="amount"
                    @change="calcTotalAmount()" @keyup="calcTotalAmount()">
                <input type="checkbox" v-model="lineitem.calc" @change="calcTotalAmount()" @mouseup="calcTotalAmount()">
                <!-- {{lineitem.calc}} -->
            </div>

            <div style="border:2px solid #000; width:300px; background-color:#fff; color:#000; text-align:center;">
                Total amount: {{totalAmount}}
            </div>

            <br />

        </form>


    </div>

    <script src="js/calculator.js"></script>


</body>

</html>