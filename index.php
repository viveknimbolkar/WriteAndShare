<?php

require "backend/connection.php";

//check the index content
if (isset($_GET["send_text"])) {
    $author = mysqli_real_escape_string($conn,$_GET["author"]);
    $text = mysqli_real_escape_string($conn,$_GET["user_text"]);
    if($text == ""){
        echo "<script> alert('Quoute should not be empty');</script>";
        header("location: /");
    }else{
        $key = uniqid();
        $insert_query = "INSERT INTO `content` (`user_key`, `author`, `writeup`) VALUES ('$key', '$author','$text')";
        $send_info = mysqli_query($conn,$insert_query);
        if ($send_info) {
            header("location: view.php?q=$key");
        }
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
    <meta name="description" content="Write your thoughts and share with anyone you want.">
    <title>Write & Share</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="backend/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="backend/thoughts.php">Thouthgs</a></li>

                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Search this website">
                </div>
            </ul>
        </nav>
    </header>

    <section class="container mt-4">
        <center>
            <form action="<?php echo $_SERVER[" PHP_SELF"]; ?>" method="get">
                <center>
                    <input type="text" placeholder="Author name" class="p-2" name="author" id="author">
                </center><br>
                <textarea class="p-2" name="user_text" id="maintext" placeholder="Write anything..."></textarea>
                <input class="btn btn-danger" type="reset" value="Reset">
                <button class="btn btn-success" type="submit" name="send_text"><i class="fas fa-paper-plane"></i>
                    Share</button>
            </form>
        </center>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>