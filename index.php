<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LORE&DURAN</title>
    <meta name="description" content="Startup di capi d'abbigliamento" />
    <meta property="og:title" content="LORE&DURAN" />
    <meta property="og:url" content="https://loreandduran.com/" />
    <meta property="og:description" content="Startup di capi d'abbigliamento" />
    <meta property="og:image" content="image/logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="it_IT" />


    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" type="image/svg+xml" href="image/logo.svg" style="background-color: #fff;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        
        <div class="gradient"></div>
        
        <img src="image/montagne.jpg" class="main_photo">

        <img src="image/logo.svg" class="logo">
        <p class="slogan">Your style your sign</p>
    </div>
    <?php
    include 'connection.php';
    $connessione = connect();
    ?>
    <!--<div class="separator"></div>
    <div class="item">
        <div class="item_image image_left"><img src="./image/articoli/1/1.jpg" alt=""></div>
        <div class="item_text item_text_right">
            <h2>Black</h2>
            <p>Una maglietta con un design semplice e moderno.</p>
            <br>
            <p>Prezzo: € 15,00</p>
        </div>
    </div>
    <div class="separator"></div>
    <div class="item">
        <div class="item_image image_right"><img src="./image/articoli/2/1.jpg" alt=""></div>
        
        <div class="item_text item_text_left"">
            <h2>White</h2>
            <p>Una maglietta con un design semplice e moderno.</p>
            <br>
            <p>Prezzo: € 15,00</p>
        </div>
        
    </div>-->
    <?php
        $sql = "SELECT * FROM Articoli WHERE Articoli.show = 1";
        if($result = $connessione->query($sql)){
            while($row = $result->fetch_array()){
                $idArticolo = $row['idArticolo'];
                $tipo = $row['Tipo'];
                $colore = $row['Colore'];
                $tintaunita = $row['Tintaunita'];
                $prezzo = $row['Prezzo'];
                $descrizione = $row['Descrizione'];
                $prezzo = number_format($prezzo ,2,",");
                $sql2 = "SELECT * FROM Foto WHERE idArticolo = ".$idArticolo;
                if($idArticolo%2!=0){
                    $image_side="image_left";
                    $text_side="item_text_right";
                }else{
                    $image_side="image_right";
                    $text_side="item_text_left";
                }
                echo '
                <div class="separator"></div>
                <div class="item">
                    <div class="item_image '.$image_side.'"><img src="./image/articoli/'.$idArticolo.'/1.jpg" alt=""></div>
                    <div class="item_text '.$text_side.'">
                        <h2>'.$colore.'</h2>
                        <p>'.$descrizione.'</p>
                        <br>
                        <p>Prezzo: € '.$prezzo.'</p>
                    </div>
                </div>
                ';
            }
        }else{
            echo "<tr><td colspan='2'>Errore, impossibile eseguire la query " . $sql ."." . $connessione->connect_error . "</td></tr>"; 
        }
    ?>

    <div class="separator"></div>

    <footer>
        <h1>LORE&DURAN</h1>
        <p>™ 2024 LORE&DURAN</p>
        <div class="info">
            <div class="pagine">
                <h2>Info</h2>
                <a href="chisiamo.html">
                    <h4>Chi Siamo</h4>
                </a>

                <a href="contatti.html">
                    <h4>Come Contattarci</h4>
                </a>

                <a href="faq.html">
                    <h4>FAQ</h4>
                </a>
            </div>

            <div class="social">
                <h2>I nostri social</h2>

                <a href="mailto:info@loreandduran.com"><i class="fas fa-envelope"></i> info@loreandduran.com</a>

                <br>

                <a href="https://tiktok.com/@loreanddurant"><i class="fab fa-tiktok"></i> @loreandduran</a>

                <br>
            
                <a href="https://instagram.com/loreandduran"><i class="fab fa-instagram"></i> @loreandduran</a>
            </div>
        
        </div>
    </footer>
    
</body>
</html>
