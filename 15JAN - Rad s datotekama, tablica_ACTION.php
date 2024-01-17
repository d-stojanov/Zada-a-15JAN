<?php

/**
 * Adds additional students to "15JAN - Rad s datotekama, tablica.json".
 * @param array $student Information to append to .json.
 * @param string $file_path File path of .json document.
 * @return void
 */
function add_student_to_JSON(array $student, string $file_path): void {
    $students = json_decode(file_get_contents($file_path), $associative = true);
    $students[] = $student;
    file_put_contents($file_path, json_encode($students, JSON_PRETTY_PRINT));
}

add_student_to_JSON($_POST, "15JAN - Rad s datotekama, tablica.json");

echo "Student was successfully added to: <code>15JAN - Rad s datotekama, tablica.json!</code>";
