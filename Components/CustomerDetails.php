<?php
include_once 'db.php';
$result = mysqli_query($mysqli, "SELECT * FROM facerecog where slno={$slno}");
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
    <title>MS Engage Project-Customer</title>
</head>

<body>

    <?php
    // LOOP TILL END OF DATA
    while ($rows = $result->fetch_assoc()) {
    ?>

        <div class="container">
            <div class="card">
                <div class="info">
                    <span>Customer Number: <?php echo $rows['slno']; ?></span>

                </div>

                <div class="forms">
                    
                    <div class="profile-img">
                        <img src=" <?php echo $rows['image']; ?>" alt="" />
                    </div>
                    <div class="inputs">
                        <span>Name</span>
                        <input type="text" name="name" readonly value="<?php echo $rows['name']; ?>">
                    </div>
                    <div class="inputs">
                        <span>Budget Slab</span>
                        <input type="text" name="budget_slab" readonly value="<?php echo $rows['budget_slab']; ?>">
                    </div>
                    <div class="inputs">
                        <span>Contact Number</span>
                        <input type="text" name="contact_number" readonly value="<?php echo $rows['contact_number']; ?>">
                    </div>
                    <div class="inputs">
                        <span>Email</span>
                        <input type="text" name="email" readonly value="<?php echo $rows['email']; ?>">
                    </div>
                    <div class="inputs">
                        <span class="title">Premium Produts</span>
                        <input type="text" name="premium_products " readonly value=" <?php echo $rows['premium_products']; ?>">
                    </div>
                    <div class="inputs">
                        <span class="title">Average Product</span>
                        <input type="text" name="average_product" readonly value="<?php echo $rows['average_product']; ?>">
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary text-center"><a href="./edit.php" style="text-decoration:none; color:white;">Edit Details</a></button></div>
            </div>
        </div>
    <?php
    }
    ?>






</body>

</html>