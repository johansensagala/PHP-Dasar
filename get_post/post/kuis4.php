<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis 4</title>
</head>
<body>
    

    <form method="post">
        <label for="lukisan">Apa nama lukisan termahal yang pernah dijual di dunia? (Case sensitive)</label><br>

        <?php
        if (isset($_POST["submit"])) {
            if(empty($_POST["lukisan"])){
        ?>
                <p style="color: red">Jawaban tidak boleh kosong!</p>
        <?php
            }
            else if(($_POST["lukisan"]) != "Salvator Mundi") {
        ?>
        <p style="color: red">Jawaban anda salah!</p>
        <?php
            }
            else {
                header("Location: kuis5.php");
            }
        }
        ?>

        <input type="text" id="lukisan" name="lukisan"><br>
        <button type="submit" name="submit">Next</button>
    </form>
</body>
</html>