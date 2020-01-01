<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <title>Vehicle</title>

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

</div>
<h1>Vehicle Info</h1>
</body>
</html>