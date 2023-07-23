<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Ini adalah tabel manual dengan HTML -->

    <table border="1">
        <tr>
            <td>Ini adalah row 1</td>
            <td>Ini adalah row 2</td>
            <td>Ini adalah row 3</td>
            <td>Ini adalah row 4</td>
            <td>Ini adalah row 5</td>
        </tr>
        <tr>
            <td>Ini adalah row 1</td>
            <td>Ini adalah row 2</td>
            <td>Ini adalah row 3</td>
            <td>Ini adalah row 4</td>
            <td>Ini adalah row 5</td>
        </tr>
    </table>

    <!-- Ini adalah tabel dengan syntax dari PHP -->

    <table border="1">
        <?php
        for($i = 0; $i < 2; $i++){
            echo "<tr>";
                for($j = 0; $j < 5; $j++){
                    echo "<td> Ini menggunakan PHP </td>";
                }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>