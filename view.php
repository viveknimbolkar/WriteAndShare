<?php

require_once "backend/connection.php";

    //check the url
    if (isset($_GET["q"])) {
        $get = "SELECT * FROM `content` WHERE user_key='$_GET[q]' LIMIT 1";
        $find_content = mysqli_query($conn,$get);
        //check for content
        if(mysqli_num_rows($find_content) > 0){
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <marquee behavior="scroll" direction="left">You cannot change this text.</marquee>

    <section class="container mt-1">
        <center>
            <input type="text" class="m-3" id="content_link"
                value="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
            <button class="btn m-2 btn-primary" onclick="copyURL()"><i class="far fa-copy"></i> Copy link</button>

            <textarea name="user_text" id="maintext">
                    <?php
                       while ($row = mysqli_fetch_assoc($find_content)) {
                           echo $row["writeup"];
                       }
                    }
                    else{
                        header("location: index.php");
                    }
                    
            }
                    ?>
                </textarea>
            <h4>Also share on:</h4>
            <a id="whatsapp">
                <button class="btn btn-success">
                    <i class="fab fa-whatsapp"></i>
                </button>
            </a>
            <a id="telegram">
                <button class="btn btn-primary">
                    <i class="fab fa-telegram"></i>
                </button>
            </a>
        </center>
    </section>


    <script>
        //create whatsapp link
        var content = document.getElementById("maintext").value;
        document.getElementById("whatsapp").setAttribute("href", "https://wa.me/?text=" + encodeURI(content));

        //create telegram link
        var author = document.getElementById("author").value;
        document.getElementById("whatsapp").setAttribute("href", "https://t.me/share/url?url="+encodeURI(author)+"&text="+encodeURI(content)+"");

        //adssign page address to the paragraph tag
        function copyURL() {
            let x = document.getElementById("content_link");
            x.select();
            document.execCommand("copy");
            console.log(x);
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>