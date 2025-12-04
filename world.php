<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$query = $_GET['country'] ?? '';
$lookup = $_GET['lookup'] ?? '';
$query = strip_tags($query);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($lookup == "cities") {

    $stmt = $conn->query(
        "SELECT c.name AS name, c.district AS district, c.population AS population
         FROM cities c
         JOIN countries cs ON c.country_code = cs.code
         WHERE cs.name LIKE '%$query%'"
    );

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
        </tr>

        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['district'] ?></td>
                <td><?= number_format($row['population']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php

} else {

    $stmt = $conn->query(
        "SELECT name, continent, independence_year, head_of_state
         FROM countries
         WHERE name LIKE '%$query%'"
    );

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Independence</th>
            <th>Head of State</th>
        </tr>

        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['continent'] ?></td>
                <td><?= $row['independence_year'] ?></td>
                <td><?= $row['head_of_state'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
}
?>
