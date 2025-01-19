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
    <link rel="manifest" href="LD.webmanifest">
</head>
<body>
    <a href="index.php" class="navbar">
        <header>
            <img src="image/logo.png" alt="LORE&DURAN">
        </header>
    </a>
    <div class="item">
        <div class="immagini">
            <?php
                $itemNumber = $_GET['item'];
                $sql = "SELECT * FROM Foto WHERE idArticolo = ".$itemNumber;
                if($result = $connessione->query($sql)){
                    $dotCounter = 0;
                    echo '<div class="slideshow-container">';
                    while($row = $result->fetch_array()){
                        $dotCounter++;
                        $idArticolo = $row['idArticolo'];
                        $idFoto = $row['idFoto'];
                        $nFoto = $row['nFoto'];
                        $estensione = $row['estensione'];
                        if($nFoto>1){
                            if($nFoto==2){
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
                        
                        
                    }
                    echo '
                            
                        </div>
                        
                            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-circle-chevron-left"></i></a>
                            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-circle-chevron-right"></i></a>
                        
                        
                    ';
                    echo '<div style="text-align:center">';
                    for($i=1; $i < $dotCounter; $i++){
                        if($i==1){
                            echo '
                            <span class="dot active" onclick="currentSlide('.$i.')"></span>
                        ';
                        }else{
                            echo '
                            <span class="dot" onclick="currentSlide('.$i.')"></span>
                        ';
                        }
                    }
                    echo '</div>';
                }
            ?>
        </div>
        <div class="content">
            <div class="testo">
                <?php
                    $sql = "SELECT * FROM Articoli WHERE idArticolo = ".$itemNumber;
                    if($result = $connessione->query($sql)){
                        while($row = $result->fetch_array()){
                            $idArticolo = $row['idArticolo'];
                            $tipo = $row['Tipo'];
                            $colore = $row['Colore'];
                            $tintaunita = $row['Tintaunita'];
                            $prezzo = $row['Prezzo'];
                            $descrizione = $row['Descrizione'];
                            $prezzo = number_format($prezzo ,2,",");
                            
                            echo '
                                <h2>'.$colore.'</h2>
                                <p>'.$descrizione.'</p>
                                <br>
                                <p>Prezzo: € '.$prezzo.'</p>
                            ';
                        }
                    }else{
                        echo "<tr><td colspan='2'>Errore, impossibile eseguire la query " . $sql ."." . $connessione->connect_error . "</td></tr>"; 
                    }
                ?>
            </div>

            <div class="ordina">
                <a href="/contatti.html" class="button">Ordina Ora</a>
            </div>
            
            <div class="table">
                <table>
                    <tr>
                        <th>Taglia</th>
                        <th>Lunghezza</th>
                        <th>Spalle</th>
                        <th>Manica</th>
                    </tr>
                    <?php
                        $sql = "SELECT Size, Lenght, Shoulders, Sleeve
                        FROM Misure WHERE idArticolo = ".$itemNumber;
                        if($result = $connessione->query($sql)){
                            while($row = $result->fetch_array()){
                                $size = $row['Size'];
                                $lenght = $row['Lenght'];
                                $shoulders = $row['Shoulders'];
                                $sleeve = $row['Sleeve'];
                                
                                echo '
                                <tr>
                                    <td>'.$size.'</td>
                                    <td>'.$lenght.'</td>
                                    <td>'.$shoulders.'</td>
                                    <td>'.$sleeve.'</td>
                                </tr>
                                ';
                            }
                        }else{
                            echo "<tr><td colspan='2'>Errore, impossibile eseguire la query " . $sql ."." . $connessione->connect_error . "</td></tr>"; 
                        }
                    ?>
                </table>
            </div>
            
        </div>
        

    </div>
    
</body>
</html>
</html>