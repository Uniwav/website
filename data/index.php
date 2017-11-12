<!DOCTYPE html>
<html>
<head>
<title>DataSheet - Uniwav</title>

</head>
<body>
<?php
$file = "data.txt";
$data = file_get_contents($file);

$rowp        = explode("\n", $data);

$rows = str_replace("  ", " ", $rowp);

//array_shift($rows);

foreach($rows as $row => $data)
{
    //get row data
    $row_data = explode(' ', $data);

    $info[$row]['date']           = $row_data[0];
    $info[$row]['heure']         = $row_data[1];
    $info[$row]['temperature']  = $row_data[2];
    $info[$row]['humidite']       = $row_data[3];
    $info[$row]['pression']       = $row_data[4];
    $info[$row]['luminosite']       = $row_data[5];

    //display data
    echo 'Row ' . $row . ' DATE: ' . $info[$row]['date'] . '<br />';
    echo 'Row ' . $row . ' HEURE: ' . $info[$row]['heure'] . '<br />';
    echo 'Row ' . $row . ' TEMPERATURE: ' . $info[$row]['temperature'] . '<br />';
    echo 'Row ' . $row . ' HUMIDITE: ' . $info[$row]['humidite'] . '<br />';
    echo 'Row ' . $row . ' PRESSION: ' . $info[$row]['pression'] . '<br />';
    echo 'Row ' . $row . ' LUMINOSITE: ' . $info[$row]['luminosite'] . '<br />';


    echo '<br />';
}

?>


<hr>

<p id="donnee">Salade </p>

<script type="text/javascript">
function loadCSV(file) {
    var request;
    if (window.XMLHttpRequest) {
        // IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        request = new ActiveXObject('Microsoft.XMLHTTP');
    }
    // load
    request.open('GET', file, false);
    request.send();
    parseCSV(request.responseText);
}

function parseCSV(data){
//replace UNIX new lines
data = data.replace (/\r\n/g, "\n");
//replace MAC new lines
data = data.replace (/\r/g, "\n");
//split into rows
var rows = data.split("\n");

// loop through all rows
for (var i = 0; i < rows.length; i++) {
    // this line helps to skip empty rows
    if (rows[i]) {
        // our columns are separated by comma
        var column = rows[i].split(" ");

        // column is array now 
        // first item is date
        var date = column[0];
        // second item is time
        var time = column[1];

    }
}


var div = document.getElementById('donnee');

div.innerHTML = div.innerHTML + time;
}

loadCSV("data.txt");

</script>


</body>
</html>