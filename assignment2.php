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
    
        <style>
         /*add Alignments to the text the center*/
        h1{
            text-transform: uppercase;
            color: #ddc7c7;
            text-shadow: 1px 1px 2px #490000, 0 0 25px lightgray, 0 0 5px darkgrey;
            text-align: center ;
            font-family: 'Times New Roman', Times, serif;
            font: size 1600px; ;
            font: weight 1500px; 
            margin: 20px;
            padding: 25px}</style>

    <!-- Creating table to display the data -->
    <table>
    <style>
        /*table Margin, and add border and width, height size to it*/
        table{
            position: cen;
            border-collapse: collapse;
            width: 80%;
            height: 80%;
            padding: 50px;
            border: 5px solid #490000;
            margin-left: auto;
            margin-right: auto;
}</style>

        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>The Programs</th>
                <th>Nationality</th>
                <th>Colleges</th>
                <th>Number of Students</th>
            </tr>
           <style>
            /*some formatting to the table header */
                th{
                    color: #ffffff;
                    text-shadow: 1px 1px 2px #490000, 0 0 25px lightgray, 0 0 5px darkgrey;
                    background-color: #490000;
                    font-family: 'Times New Roman', Times, serif;
                    font-size: x-large;
                    font-weight: 200px;
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #b4c1c1;
            }

            /*when the mouse is over the rows, it will change the background, font size and color*/
                 tr:hover {
                     background-color: rgba(255, 127, 80, 0.342);
                     font-size: xx-large;
                     color: #b4c1c1;
}
            /* create responsive designs for desktop and mobile */
            @media (max-width:500px) and (min-width:100px) {
                body {
                font-size:medium;
                background-color: rgb(178, 178, 7);
                }}
                    

            @media (max-width:500px) and (min-width: 700px) {
                body {
                font-size: large;
                background-color: rgb(224, 255, 244);
                }}
            </style>
            
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
                <style>
                    /*some formatting to the table rows(colors ,font size,weight ,etc...) */
                td{
                    color: #000000;
                    background-color: #e3cfcf;
                    font-family: 'Times New Roman', Times, serif;
                    font-size: x-large;
                    font-weight: 150px;
                    padding:10px;
                    text-align: left;
                    border-bottom: 1px solid #490000;
                    margin: 20px;}
                </style>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
