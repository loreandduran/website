<?php
    if(!(isSet($_GET['item'])) || $_GET['item']==NULL){
        http_response_code(400);
        exit();
    }else{
        include 'connection.php';
        $connessione = connect();
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="CSS/articolo.css">
    <link rel="icon" type="image/svg+xml" href="image/logo.svg" style="background-color: #fff;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="./JS/articolo.js"></script>
</head>
<body>
    <?php
        $itemNumber = $_GET['item'];
        $sql = "SELECT * FROM Foto WHERE idArticolo = ".$itemNumber;
        if($result = $connessione->query($sql)){
            echo '<div class="slideshow-container">';
            while($row = $result->fetch_array()){
                $idArticolo = $row['idArticolo'];
                $idFoto = $row['idFoto'];
                $nFoto = $row['nFoto'];
                $estensione = $row['estensione'];
                if($nFoto==1){
                    echo '
                    <div class="mySlides fade" style="display: block">
                        <img src="./image/articoli/'.$itemNumber.'/'.$nFoto.'.'.$estensione.'">
                    </div>
                ';
                }else{
                    echo '
                    <div class="mySlides fade">
                        <img src="./image/articoli/'.$itemNumber.'/'.$nFoto.'.'.$estensione.'">
                    </div>
                ';
                }
                
            }
            echo '
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            ';
            echo '<div style="text-align:center">';
            $dotCounter = 1;
            while($row = $result->fetch_array()){
                echo '
                    <span class="dot" onclick="currentSlide('.$dotCounter.')"></span>
                ';
                $dotCounter++;
            }
            echo '</div>';
        }
    ?>


    <!--<div class="slideshow-container">
        <div class="mySlides fade">
            <img src="./image/articoli/1/1.jpg">
        </div>
        <div class="mySlides fade">
            <img src="./image/articoli/2/1.jpg">
        </div>
        <div class="mySlides fade">
            <img src="image3.jpg">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>-->
    
</body>
</html>
</html>