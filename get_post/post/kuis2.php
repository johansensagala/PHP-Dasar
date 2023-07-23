<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis 2</title>
</head>
<body>
    <h3>Yang bukan ikan dibawah ini adalah...</h3>

    <?php
    if (count($_POST) == 1){
    ?>
    <p style="color: red">Jawaban tidak boleh kosong!</p>
    <?php
    }
    else if (isset($_POST["submit"]) && $_POST["nonikan"] == "paus") {
        header("Location: kuis3.php");
    }
    else if (isset($_POST["submit"]) && $_POST["nonikan"] != "paus") {
    ?>
    <p style="color: red">Jawaban anda salah!</p>
    <?php
    }
    ?>

    <form method="post">
        <input type="radio" id="paus" name="nonikan" value="paus">
        <label for="paus">Paus</label><br>
        <input type="radio" id="pari" name="nonikan" value="pari">
        <label for="pari">Pari</label><br>
        <input type="radio" id="hiu" name="nonikan" value="hiu">
        <label for="hiu">Hiu</label><br>
        <input type="radio" id="tuna" name="nonikan" value="tuna">
        <label for="tuna">Tuna</label><br>
        <button type="submit" name="submit">Next</button>
    </form>
</body>
</html>