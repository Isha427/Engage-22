<!-- // PHP code to establish connection
// with the localserver -->
<?php
include_once 'db.php';

// Checking for connections
// if ($mysqli->connect_error) {
//     die('Connect Error (' .
//         $mysqli->connect_errno . ') ' .
//         $mysqli->connect_error);
// }
// $filename = "id.txt";
// $file = fopen( $filename, "r" );
// $filesize = filesize( $filename );
// $slno = fread( $file, $filesize);
// SQL query to select data from database
$sql = "SELECT * FROM facerecog where slno={$slno}";
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
    <title>MS Engage Project-Edit Page</title>
</head>

<body>


    <!-- Tabs content -->

    <?php
    // LOOP TILL END OF DATA
    while ($rows = $result->fetch_assoc()) {
    ?>



        <div class="container">
            <div class="card">
                <form action="update.php" method="POST">
                    <div class="info">
                        <span>Customer Number: <?php echo $rows['slno']; ?></span>

                    </div>

                    <div class="forms">

                        <div class="profile-img">
                            <img src="<?php echo $rows['image']; ?>" alt="" />
                        </div>
                        <div class="inputs">
                            <span><label for="name">Name</label></span>
                            <input type="text" name="name" id="name" value="<?php echo $rows['name']; ?>">
                        </div>
                        <div class="inputs">
                            <span><label for="budget_slab">Budget Slab</label></span>
                            <input type="text" name="budget_slab" id="budget_slab" value="<?php echo $rows['budget_slab']; ?>">
                        </div>
                        <div class="inputs">
                            <span><label for="contact_number">Contact Number</label></span>
                            <input type="text" name="contact_number" id="contact_number" value="<?php echo $rows['contact_number']; ?>">
                        </div>
                        <div class="inputs">
                            <span><label for="email">Email</label></span>
                            <input type="text" name="email" id="email" value="<?php echo $rows['email']; ?>">
                        </div>
                        <div class="inputs">
                            <span class="title"><label for="premium_products">Premium Produts</label></span>
                            <input type="text" name="premium_products" id="premium_products" value="<?php echo $rows['premium_products']; ?>">
                        </div>
                        <div class="inputs">
                            <span class="title"><label for="average_product">Average Product</label></span>
                            <input type="text" name="average_product" id="average_product" value="<?php echo $rows['average_product']; ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Save Details">
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabs content -->
    <?php
    }
    ?>





</body>

</html>