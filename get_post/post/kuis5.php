<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis 5</title>
</head>
<body>
    

    <form method="post">
        <label for="lukisan">3<sup>x</sup>=5<br>
        Berapakah nilai x? (Gunakan tanda ".", 5 angka dibelakang koma)</label><br>

        <?php
        if (isset($_POST["submit"])) {
            if(empty($_POST["lukisan"])){
        ?>
                <p style="color: red">Jawaban tidak boleh kosong!</p>
        <?php
            }
            else if(($_POST["lukisan"]) != "1.46498") {
        ?>
        <p style="color: red">Jawaban    anda salah!</p>
        <?php
            }
            else {
                header("Location: selamat.php");
            }
        }
        ?>

        <input type="text" id="lukisan" name="lukisan"><br>
        <button type="submit" name="submit">Next</button>
    </form>
</body>
</html>