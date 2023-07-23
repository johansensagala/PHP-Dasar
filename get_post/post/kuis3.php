<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis 3</title>
</head>
<body>
    <h3>Apa rumus kimia senyawa asam sulfat?</h3>

    <?php
    if (count($_POST) == 1){
    ?>
    <p style="color: red">Jawaban tidak boleh kosong!</p>
    <?php
    }
    else if (isset($_POST["submit"]) && $_POST["senyawa"] == "sulfat") {
        header("Location: kuis4.php");
    }
    else if (isset($_POST["submit"]) && $_POST["senyawa"] != "sulfat") {
    ?>
    <p style="color: red">Jawaban anda salah!</p>
    <?php
    }
    ?>

    <form method="post">
        <input type="radio" id="bromida" name="senyawa" value="bromida">
        <label for="bromida">HBr</label><br>
        <input type="radio" id="karbonat" name="senyawa" value="karbonat">
        <label for="karbonat">H<sub>2</sub>CO<sub>3</sub></label><br>
        <input type="radio" id="sulfat" name="senyawa" value="sulfat">
        <label for="sulfat">H<sub>2</sub>SO<sub>4</sub></label><br>
        <input type="radio" id="klorida" name="senyawa" value="klorida">
        <label for="klorida">HCl</label><br>
        <button type="submit" name="submit">Next</button>
    </form>
</body>
</html>