<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis 1</title>
</head>
<body>
    <h3>Apa nama ibukota Indonesia?</h3>

    <?php
    if (count($_POST) == 1){
    ?>
    <p style="color: red">Jawaban tidak boleh kosong!</p>
    <?php
    }
    else if (isset($_POST["submit"]) && $_POST["ibukota"] == "jakarta") {
        header("Location: kuis2.php");
    }
    else if (isset($_POST["submit"]) && $_POST["ibukota"] != "jakarta") {
    ?>
    <p style="color: red">Jawaban anda salah!</p>
    <?php
    }
    ?>

    <form method="post">
        <input type="radio" id="bandung" name="ibukota" value="bandung">
        <label for="bandung">Bandung</label><br>
        <input type="radio" id="jakarta" name="ibukota" value="jakarta">
        <label for="jakarta">Jakarta</label><br>
        <input type="radio" id="medan" name="ibukota" value="medan">
        <label for="medan">Medan</label><br>
        <input type="radio" id="surabaya" name="ibukota" value="surabaya">
        <label for="surabaya">Surabaya</label><br>
        <button type="submit" name="submit">Next</button>
    </form>
</body>
</html>