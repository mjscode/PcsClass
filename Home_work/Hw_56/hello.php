<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <table class ="table">
    <?php
    $pTr="Trump";
    $trYear=2017;
    $pOb="Obama";
    $obYear=2008;
    $pBs="Bush";
    $bsYear="2000";
    echo "<caption>Our Presidents</caption>";
    ?>
    <thead>
        <tr>
            <?php
        echo "<th>President</th>";
        echo "<th>Year</th>";
            ?>
        </tr>
        </thead>
        <tbody>
            <?php
        echo "<tr>";
        echo "<td>".$pTr."</td>";
        echo "<td>".$trYear."</td>";
    echo "</tr>";
    ?>
    <tr>
        <td><?= $pOb ?></td>
        <td><?= $obYear ?></td>
    </tr>
    <tr>
        <?="<td>". $pBs. "</td>"?>
        <?="<td>". $bsYear. "</td>"?>
    </tr>
    </tbody>
    </table>
    </div>

</body>
</html>
