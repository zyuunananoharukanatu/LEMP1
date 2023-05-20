<?php
try {
    $dsn = 'mysql:host=db;dbname=sample;';
    $db = new PDO($dsn, 'root', 'rookt');

    $sql = 'SELECT * FROM answers;';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo("<table><tr><tr><th>key</th><th>value</th></tr>");
    foreach ($result as $key => $values) {
        echo("<tr><td>");
        echo($key);
        echo("</td><td>");
        foreach($values as $value_key => $value) {
            echo($value_key.":".$value);
        }
        echo("</td></tr>");
    }
    echo("</table>");
    var_dump($result);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
} 
