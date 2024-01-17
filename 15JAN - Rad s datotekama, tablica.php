<?php

/**
 * Returns a decoded JSON associative array.
 * @param string $file_path Path to .json document.
 * @return array Decoded JSON associative array.
 */
function JSON_to_array(string $file_path): array {
    return json_decode(file_get_contents($file_path), $associative = true);
}

/**
 * Converts a decoded JSON array into a HTML table.
 * @param array $JSON_array 
 * @return void
 */
function JSON_to_HTML_table(array $JSON_array): string{
    $HTML_string = "";

    foreach ($JSON_array as $key => $value) {
        $HTML_string .= 
        "<tr>".
            "<td>".$value["first_name"]."</td>".
            "<td>".$value["last_name"]."</td>".
            "<td>".$value["age"]."</td>".
            "<td>".$value["email"]."</td>".
            "<td>".$value["phone"]."</td>".
        "</tr>";
    }

    return $HTML_string;

}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Rad s Datotekama - Vježba (slide 74)</title>
        <meta charset="UTF-8", lang="hr-HR">
        <link rel="stylesheet" href="15JAN - Style.css">
    </head>
    <body>
        <h1>Polaznici</h1>
        <hr>
        <h3>Vježba</h3>
        <p>
            Pročitajte podatke iz datoteke "15JAN - Rad s datotekama, tablica.json"<br>
            te ih ispišite u HTML tablicu.<br>
            Dodajte novog polaznika u datoteku, te ponovno ispišite tablicu s novim<br>
            podacima.
        </p>
        <hr>
        <h3>Dodavanje novog polaznika</h3>
            <table>
                <form action="15JAN - Rad s datotekama, tablica_ACTION.php" method="POST">
                    <tr>
                        <td><label for="first_name" width="300">FIRST NAME:</label></td>
                        <td><input type="text" id="first_name" name="first_name"></td>
                    </tr>
                    <tr>
                        <td><label for="last_name" width="300">LAST NAME:</label></td>
                        <td><input type="text" id="last_name" name="last_name"></td>
                    </tr>
                    <tr>
                        <td><label for="age" width="300">AGE:</label></td>
                        <td><input type="number" id="age" name="age"></td>
                    </tr>
                    <tr>
                        <td><label for="email" width="300">E-MAIL:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="phone" width="300">PHONE:</label></td>
                        <td><input type="number" id="phone" name="phone"></td>
                    </tr>
                    <tr>
                        <td colspan=2><input type="submit" value="Dodaj polaznika."></td>
                    </tr>
                </form>
            </table>
        <hr>

        <h3>Tablica Polaznika:</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>e-mail</th>
                <th>Phone #</th>
            </tr>

            <?php
            echo JSON_to_HTML_table(JSON_to_array("15JAN - Rad s datotekama, tablica.json"));
            ?>

        </table>
    </body>
</html>


