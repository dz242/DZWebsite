
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dominik Zmuda's Messages</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="index.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>


    <body>


    <h3 style='text-align:center;'>Thanks for your message, <?php echo $_POST["name"]; ?></h3>

    <?php

        // Create connection
        $conn = new mysqli("db", "devuser", "devpass", "dominik_db");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  
        
        $sender = $_POST["name"];
        $sentMessage = $_POST["message"];

        $insertQ = "INSERT INTO messagepost (id, name, message) VALUES('0', '$sender', '$sentMessage')";
        if(mysqli_query($conn, $insertQ)){
            echo ("<h4 style='text-align:center;'>Your message has been received!</h4>");
        }
        else{
            "Error: " . $insertQ . "<br>" . $conn->error;
        }

        for($x=1; $x<=11; $x++){
            $poster = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM messagepost WHERE id=$x"));
            $message = mysqli_fetch_assoc(mysqli_query($conn, "SELECT message FROM messagepost WHERE id=$x"));
            $posterFIN = $poster['name'];
            $messageFIN = $message['message'];


            if ($posterFIN != NULL && $messageFIN != NULL){
                echo("
                <div class='message-post' style='margin-left: 25%;'>
                    <p class='name'>FROM: $posterFIN</p>
                    <br>
                    <p class='message'>MESSAGE: $messageFIN</p>
                    <br><br><br>
                </div>
            ");
            }
            
        }

        $conn->close();
    ?>


    </body>

</html>