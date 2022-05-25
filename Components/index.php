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
  <title>MS Engage Project</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <link rel="stylesheet" href="./style.css">


</head>

<body>

  <section class="light">
    <div class="container py-2">
      <div class="h1 text-center text-dark" id="pageHeaderTitle">Microsoft Engage 2022 Project</div>

      <article class="postcard light blue">
        <a class="postcard__img_link" href="#">
          <img class="postcard__img" src="./customer.jpg" Image Title" />
        </a>
        <div class="postcard__text t-dark">
          <h1 class="postcard__title blue"><a href="#">Face Recognition</a></h1>
          <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
              <!-- <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020 -->
            </time>
          </div>
          <div class="postcard__bar"></div>
          <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
          <ul class="postcard__tagbox">
            <!-- <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li> -->
            <!-- <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> -->
            <li class="tag__item play blue">
              <a href="./CustomerDetails.php" target="_blank"><i class="fas fa-play mr-2"></i>Use Now</a>
            </li>
          </ul>
        </div>
      </article>

      <article class="postcard light red">
        <a class="postcard__img_link" href="#">
          <img class="postcard__img" src="./shoppingcart.webp" alt="Image Title" />
        </a>
        <div class="postcard__text t-dark">
          <h1 class="postcard__title red"><a href="#">Object Detection</a></h1>
          <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
              <!-- <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020 -->
            </time>
          </div>
          <div class="postcard__bar"></div>
          <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
          <ul class="postcard__tagbox">
            <!-- <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li> -->
            <!-- <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> -->
            <li class="tag__item play red">
              <a href="./ObjectDetect.php" target="_blank"><i class="fas fa-play mr-2"></i>Use Now</a>
            </li>
          </ul>
        </div>
      </article>
    
    </div>
  </section>
</body>

</html>