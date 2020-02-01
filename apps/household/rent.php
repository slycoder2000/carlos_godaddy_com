<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <script src="/scripts/vue.js"></script>
    <title>Rent</title>

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
        <div id='app'>
            <h1>Rent</h1>
            <div>Rent Amount <input type="text" v-model="rentAmount" /></div>
            <div>3x Amount: {{rentAmount*3}}</div>
        </div>


        <script>
        new Vue({
            el: '#app',

            data: {
                rentAmount: 899,
                hoursWorkedPerDay: 8,
                DaysWorkedPerWeek: 4,
                EstimatedTaxes: 0.25
            },
            methods: {
                moneyFormat: function(price) {
                    return '$' + price;
                },

                fpArithmetic: function(op, x, y) {
                    var n = {
                        '*': x * y,

                        '-': x - y,

                        '+': x + y,

                        '/': x / y
                    } [op];

                    return Math.round(n * 100) / 100;
                },
                netPay: function(amount) {
                    var afterTaxes = this.fpArithmetic('*', amount, this.EstimatedTaxes);
                    return this.fpArithmetic('-', amount, afterTaxes);
                }

            },

            computed: {
                DailyPay: function() {
                    return this.fpArithmetic('*', this.hourlyWage, this.hoursWorkedPerDay);
                },

                WeeklyPay: function() {
                    return this.fpArithmetic('*', this.DailyPay, this.DaysWorkedPerWeek);
                },

                MonthlyPay: function() {
                    return this.fpArithmetic('*', this.WeeklyPay, 4);
                },

                AnnualPay: function() {
                    return this.fpArithmetic('*', this.MonthlyPay, 12);
                },


                DaysWorkedPerMonth: function() {
                    return parseInt(this.DaysWorkedPerWeek) * 4;
                }
            }
        });
        </script>


</body>

</html>