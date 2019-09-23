<!DOCTYPE html>

<html>

<head>
<title></title>

<script>

const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('phnString').toUpperCase();

var text = '{ "alpha" : [' +
'{ "Ltr":"A", "Phn":"Alpha" },' +
'{ "Ltr":"B", "Phn":"Bravo" },' +
'{ "Ltr":"C", "Phn":"Charlie" },' +
'{ "Ltr":"D", "Phn":"Delta" },' +
'{ "Ltr":"E", "Phn":"Echo" },' +
'{ "Ltr":"F", "Phn":"Foxtrot" },' +
'{ "Ltr":"G", "Phn":"Golf" },' +
'{ "Ltr":"H", "Phn":"Hotel" },' +
'{ "Ltr":"I", "Phn":"India" },' +
'{ "Ltr":"J", "Phn":"Juliet" },' +
'{ "Ltr":"K", "Phn":"Kilo" },' +
'{ "Ltr":"L", "Phn":"Lima" },' +
'{ "Ltr":"M", "Phn":"Mike" },' +
'{ "Ltr":"N", "Phn":"November" },' +
'{ "Ltr":"O", "Phn":"Oscar" },' +
'{ "Ltr":"P", "Phn":"Papa" },' +
'{ "Ltr":"Q", "Phn":"Quebec" },' +
'{ "Ltr":"R", "Phn":"Romeo" },' +
'{ "Ltr":"S", "Phn":"Sierra" },' +
'{ "Ltr":"T", "Phn":"Tango" },' +
'{ "Ltr":"U", "Phn":"Uniform" },' +
'{ "Ltr":"V", "Phn":"Victor" },' +
'{ "Ltr":"W", "Phn":"Whiskey" },' +
'{ "Ltr":"X", "Phn":"X-Ray" },' +
'{ "Ltr":"Y", "Phn":"Yankee" },' +
'{ "Ltr":"Z", "Phn":"Zulu"  } ]}';

var obj = JSON.parse(text);


</script>

</head>

<body>

<form action="" method="GET">
<label for="phn">Phonetisize:</label>
<input name="phnString" type="text">
<br>
<input type="submit" value="Submit">
</form>


<p id="demo"></p>

<script>

for(var cnt=0; cnt<myParam.length; cnt++){
    document.write(myParam.substr(cnt,1));
    document.write(" - ");

        for(num=0; num<26; num++) {
        if(myParam.substr(cnt,1)==obj.alpha[num].Ltr) {
            document.write(obj.alpha[num].Phn);
            }
        }
    document.write("<br/>");

}

document.getElementById("demo").innerHTML = myParam;

</script>

</body>

</html>