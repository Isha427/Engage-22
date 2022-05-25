<!-- // PHP code to establish connection
// with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'engage';

// Server is localhost with
// port number 3308
$servername = 'localhost';
$mysqli = new mysqli(
    $servername,
    $user,
    $password,
    $database
);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM facerecog where slno=1";
$result = $mysqli->query($sql);
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formcss.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>MS Engage Project-Object</title>
</head>

<body>




    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script>
        var savebutton = document.getElementById('savebutton');
        var readonly = true;
        var inputs = document.querySelectorAll('input[type="text"]');
        savebutton.addEventListener('click', function () {

            for (var i = 0; i < inputs.length; i++) {
                inputs[i].toggleAttribute('readonly');
            };

            if (savebutton.innerHTML == "edit") {
                savebutton.innerHTML = "save";
            } else {
                savebutton.innerHTML = "edit";
            }
        });
        
    </script>
    <script>
        const triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
        triggerTabList.forEach((triggerEl) => {
            const tabTrigger = new mdb.Tab(triggerEl);

            triggerEl.addEventListener('click', (event) => {
                event.preventDefault();
                tabTrigger.show();
            });
        });
    </script>
</body>

</html>
<!-- <input type="text" readonly value="9670XXXXXX"><br />
      <label>Catch Garlic Powder -500 gm</label> -->