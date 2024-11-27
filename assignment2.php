<?php

// API Endpoint URL
$url = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

// Fetching data & decode the JSON response
$response = file_get_contents($url);

$data = json_decode($response, true);
if(!$data || !isset($data["results"])){
    die('Error fetching data from the API');
}
$result = $data["results"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<body>
    <h1>University of Bahrain Students Enrollment by Nationality</h1>

    <!-- Creating table to display the data -->
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>The Programs</th>
                <th>Nationality</th>
                <th>Colleges</th>
                <th>Number of Students</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $student){
            ?>
                <tr>
                    <td><?php echo $student["year"];?></td>
                    <td><?php echo $student["semester"];?></td>
                    <td><?php echo $student["the_programs"];?></td>
                    <td><?php echo $student["nationality"];?></td>
                    <td><?php echo $student["colleges"];?></td>
                    <td><?php echo $student["number_of_students"];?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>