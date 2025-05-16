<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszk</h1>
    </header>
    <main>
        <section id="glowny">
            <nav>
                <a href="peruwianka.php">Rasa Peruwianka</a>
                <a href="american.php">Rasa American</a>
                <a href="crested.php">Rasa Crested</a>
            </nav>
            <section id="podglowny">
                <img src="crested.jpg" alt="Świnka morska rasy peruwianka">
                <?php
                    $serwer = "localhost";
                    $baza = "hodowla";
                    $uzytkownik = "root";
                    $haslo = "";
    
                    $con = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);
                    $zapytanie1 = "SELECT DISTINCT data_ur, miot, rasa from swinki INNER join rasy on swinki.rasy_id=rasy.id WHERE rasy_id = 7";
                    $wynik = mysqli_query($con, $zapytanie1);
                    $row = mysqli_fetch_row($wynik);
                    echo("<h3>Rasa: ".$row[2]."</h3>");
                    echo("<p>Data urodzenia: ".$row[0]."</p>");
                    echo("<p>Oznaczenie miotu: ".$row[1]."</p>");
                ?>
                <hr>
                <h2>Świnki w tym miocie</h2>
                <?php
                    $zapytanie3 = "SELECT imie, cena, opis from swinki where rasy_id = 7";
                    $wynik3 = mysqli_query($con, $zapytanie3);
                    while($row = mysqli_fetch_array($wynik3)){
                        echo("<h3>".$row[0]." - ".$row[1]." zł </h3>");
                        echo("<p>".$row[2]."</p>");
                    }
                ?>
            </section>
        </section>
        <aside>
            <h3 class="poznaj">Poznaj wszystkie rasy świnek morskich</h3>
            <?php 
                $zapytanie2 = "SELECT rasa from rasy";
                $wynik2 = mysqli_query($con, $zapytanie2);

                while($row = mysqli_fetch_array($wynik2)){
                    echo("<ul>".$row['rasa']."</ul>");
                }
                mysqli_close($con);
            ?>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>   
</body>
</html>