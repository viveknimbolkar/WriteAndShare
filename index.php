<?php

require "backend/connection.php";

//check the index content
if (isset($_GET["send_text"])) {
    $text = mysqli_real_escape_string($conn,$_GET["user_text"]);
    $key = uniqid();
    $insert_query = "INSERT INTO `content` (`user_key`, `writeup`) VALUES ('$key', '$text')";
    $send_info = mysqli_query($conn,$insert_query);
    if ($send_info) {
        header("location: view.php?q=$key");
    }
}

//get the id from the url and fetch the data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write & Share</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="backend/style.css">
</head>
<body>
    <header class="bg-primary p-2 text-white">
        <center>
            <strong>
                <h2>WRITE & SHARE</h2>
            </strong>
        </center>
    </header>

    <section class="container mt-4">
        <center>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                <textarea name="user_text" id="maintext" placeholder="Write anything that you want..."></textarea>
                <input class="btn btn-danger" type="reset" value="Reset">
                <button class="btn btn-success" type="submit" name="send_text"><i class="fas fa-paper-plane"></i> Submit</button>
            </form>
        </center>
    </section>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
