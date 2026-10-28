<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>

    <?php
    // Read a text field safely.
    function getValue($name) {
        if (isset($_POST[$name]) && is_string($_POST[$name])) {
            return trim($_POST[$name]);
        }

        return "";
    }

    // Display text safely in HTML.
    function escape($value) {
        return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = getValue("firstname");
        $lastname = getValue("lastname");
        $age = getValue("age");
        $food = getValue("food");
        $bookday = getValue("bookday");
        $partysize = getValue("partysize");

        // Convert the species code into its full name.
        $speciesNames = array(
            "M" => "Human",
            "D" => "Dwarf",
            "E" => "Elf",
            "H" => "Hobbit"
        );

        $speciesCode = getValue("species");
        $species = "Unknown";

        if (isset($speciesNames[$speciesCode])) {
            $species = $speciesNames[$speciesCode];
        }

        // Unchecked checkboxes are not sent in POST.
        $booking = array();

        if (isset($_POST["accom"])) {
            $booking[] = "Accommodation";
        }

        if (isset($_POST["4day"])) {
            $booking[] = "Four-day tour";
        }

        if (isset($_POST["10day"])) {
            $booking[] = "Ten-day tour";
        }

        echo "<p>Welcome "
            . escape($firstname) . " "
            . escape($lastname) . "!</p>";

        if (count($booking) > 0) {
            echo "<p>You are now booked on: "
                . implode(" and ", $booking) . ".</p>";
        } else {
            echo "<p>No booking option was selected.</p>";
        }

        echo "<p>Species: " . escape($species) . "</p>";
        echo "<p>Age: " . escape($age) . "</p>";
        echo "<p>Meal Preference: " . escape($food) . "</p>";
        echo "<p>Date: " . escape($bookday) . "</p>";
        echo "<p>Number of travellers: "
            . escape($partysize) . "</p>";
    } else {
        echo '<p>Please complete the '
            . '<a href="register.html">booking form</a>.</p>';
    }
    ?>
</body>
</html>