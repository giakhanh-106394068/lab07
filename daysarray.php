<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Days of the Week</title>
</head>
<body>
    <h1>PHP Variables, Arrays and Operators</h1>

    <?php
    $days = array(
        "Sunday", "Monday", "Tuesday", "Wednesday",
        "Thursday", "Friday", "Saturday"
    );

    echo "<p>The days of the week in English are:<br>";
    echo implode(", ", $days) . ".</p>";

    $days = array(
        "Dimanche", "Lundi", "Mardi", "Mercredi",
        "Jeudi", "Vendredi", "Samedi"
    );

    echo "<p>The days of the week in French are:<br>";
    echo implode(", ", $days) . ".</p>";
    ?>
</body>
</html>