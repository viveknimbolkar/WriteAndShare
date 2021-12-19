<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../backend/connection.php";

//fetch data from db
$fetchThoughts = "SELECT * FROM `content`";
$getData = mysqli_query($conn,$fetchThoughts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thoughts | Write&Share</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="thoughts.php">Thouthgs</a></li>

                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Search this website">
                </div>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php
        //get random element from assocative array to color a quote container
        $getColor = array("secondary","danger","warning","info","success","primary","dark");
        $getRandomElement = array_rand($getColor,1);
        if(mysqli_num_rows($getData) > 0){
            while ($row = mysqli_fetch_assoc($getData)) {
   ?>

        <div class="thought">
        <?php echo $row['writeup']; ?>
        <div class="name">
            <p><?php echo $row['author']; ?></p>
        </div>
    </div>
        <?php
            }
        }else{
            echo "<script>alert('Something went wrong');</script>";
        }
        ?>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>