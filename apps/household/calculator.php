<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <title>Calculator</title>

    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.css"-->
    <script>
    function openSideMenu() {
        document.getElementById("side-menu").style.width = "250px";
        document.getElementById("wrapper").style.marginLeft = "-250px";
    }

    function closeSideMenu() {
        document.getElementById("side-menu").style.width = "0";
        document.getElementById("wrapper").style.marginLeft = "0";
    }

    function transfer() {
        // check to see if at least one item in column 1 and column 4 are checked
        let strChkBox = '';
        let firstColumnChecked = false;
        let lastColumnChecked = false;
        let strTransferFrom = '';
        let strTransferTo = '';
        let strFromDesc = '';
        let strToDesc = '';


        for(chkBox=1;chkBox<=12;chkBox++){
            if(chkBox<10) {
                strChkBox = `0${chkBox}`;
            } else {
                strChkBox = `${chkBox}`;
            }
            if(firstColumnChecked==false) {
                //check first column
                if(document.getElementById('pos' + strChkBox).checked == true) {
                    firstColumnChecked=true;
                    strTransferFrom = strChkBox;
                }
            }
            if(lastColumnChecked==false) {
                //check last column
                if(document.getElementById('calc' + strChkBox).checked == true) {
                    lastColumnChecked=true;
                    strTransferTo = strChkBox;
                }

            }

        }

        if(firstColumnChecked==false || lastColumnChecked==false) {
            alert("One checkbox must be checked from First AND Last columns.");

        } else {
            // Get Confirmation
            strFromDesc = document.getElementById('desc' + strTransferFrom).value;
            strToDesc = document.getElementById('desc' + strTransferTo).value;

            let transferConfirm = confirm(`transfer '${strFromDesc}' to '${strToDesc}'?`)
            if(transferConfirm) {
                // Process transaction
                let transferAmountFrom = document.getElementById('amt' + strTransferFrom).value;
                let transferAmountTo = document.getElementById('amt' + strTransferTo).value;
                let newAmountTo = fpArithmetic('+',parseFloat(transferAmountFrom),parseFloat(transferAmountTo));

                if(isNaN(newAmountTo)) {
                    alert('invalid value');
                } else {
                    //alert("transfering "+transferAmountFrom+", add to "+transferAmountTo+".  New value: "+newAmountTo);
                    document.getElementById('amt' + strTransferFrom).value = "";
                    document.getElementById('amt' + strTransferTo).value = ''+newAmountTo;
                }


            }
        }
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
            font-size:4vw;
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
    <a href="javascript:transfer();">Transfer</a>
    <a href="#">test</a>
    <a href="#">test2</a>
</div>

<nav class="main-nav">

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="javascript:transfer();">Transfer</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test2</a></li>
    </ul>
</nav>

</div>

<button id="btnSaveCalc" style="width:150px;">Save &amp; Calc</button>



<!-- More will go here -->

<form>

    <input id="pos01" type="checkbox" placeholder="desc"  />

    <input id="desc01" type="text" placeholder="desc"  />

    <input id="amt01" type="text" placeholder="amount"  />

    <input id="calc01" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos02" type="checkbox" placeholder="desc"  />

    <input id="desc02" type="text" placeholder="desc"  />

    <input id="amt02" type="text" placeholder="amount"  />

    <input id="calc02" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos03" type="checkbox" placeholder="desc"  />

    <input id="desc03" type="text" placeholder="desc"  />

    <input id="amt03" type="text" placeholder="amount"  />

    <input id="calc03" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos04" type="checkbox" placeholder="desc"  />

    <input id="desc04" type="text" placeholder="desc"  />

    <input id="amt04" type="text" placeholder="amount"  />

    <input id="calc04" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos05" type="checkbox" placeholder="desc"  />

    <input id="desc05" type="text" placeholder="desc"  />

    <input id="amt05" type="text" placeholder="amount"  />

    <input id="calc05" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos06" type="checkbox" placeholder="desc"  />

    <input id="desc06" type="text" placeholder="desc"  />

    <input id="amt06" type="text" placeholder="amount"  />

    <input id="calc06" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos07" type="checkbox" placeholder="desc"  />

    <input id="desc07" type="text" placeholder="desc"  />

    <input id="amt07" type="text" placeholder="amount"  />

    <input id="calc07" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos08" type="checkbox" placeholder="desc"  />

    <input id="desc08" type="text" placeholder="desc"  />

    <input id="amt08" type="text" placeholder="amount"  />

    <input id="calc08" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos09" type="checkbox" placeholder="desc"  />

    <input id="desc09" type="text" placeholder="desc"  />

    <input id="amt09" type="text" placeholder="amount"  />

    <input id="calc09" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos10" type="checkbox" placeholder="desc"  />

    <input id="desc10" type="text" placeholder="desc"  />

    <input id="amt10" type="text" placeholder="amount"  />

    <input id="calc10" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos11" type="checkbox" placeholder="desc"  />

    <input id="desc11" type="text" placeholder="desc"  />

    <input id="amt11" type="text" placeholder="amount"  />

    <input id="calc11" type="checkbox" placeholder="desc" checked />

    <br/>

    <input id="pos12" type="checkbox" placeholder="desc"  />

    <input id="desc12" type="text" placeholder="desc"  />

    <input id="amt12" type="text" placeholder="amount"  />

    <input id="calc12" type="checkbox" placeholder="desc" checked />

    <br/>

    &nbsp;&nbsp;&nbsp;&nbsp;

    <input id="desc0" type="text" placeholder="Total" readonly />

    <input id="amt0" type="text" placeholder="0" readonly />



    <br/>

</form>



<h2>Clear</h2>

<button id="btnClear" style="width: 150px;">Clear All</button>

</div>

<script src="js/scripts.js"></script>
</body>
</html>