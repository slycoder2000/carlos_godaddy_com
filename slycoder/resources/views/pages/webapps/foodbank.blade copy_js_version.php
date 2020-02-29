@extends('layouts.slycoder')


@section('content')



<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>
    <div id="blockapp" class="card-body">




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
                    cityNoSpace = city + "";
                    cityNoSpace = cityNoSpace.replace(" ", "");
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


        xmlhttp.open("GET", "{{ asset('js/foodbank.json')}}", true);
        xmlhttp.send();
        </script>



    </div>
</section>


@endsection


@push('bodyScripts')

<!-- bodyScripts -->
<script src="{{ asset('js/foodbank.js')}}"></script>
@endpush