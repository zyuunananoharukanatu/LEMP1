<?php
// 文字コード設定
header('Content-Type: application/json; charset=UTF-8');

$json = file_get_contents('php://input');

if (empty($json)) {
    throw new ErrorException("入力されていません");
}
$jsonArray = json_decode($json, true);

// バリデーション
if (!array_key_exists('answer', $jsonArray)
        || empty($jsonArray['answer'])) {
    throw new ErrorException("入力されていません");
}

// 登録
date_default_timezone_set('Asia/Tokyo'); 
try {
    $dsn = 'mysql:host=db;dbname=sample;';
    $db = new PDO($dsn, 'root', 'rookt');
    $sql = 'INSERT INTO answers (answer) VALUES (:answer)';
    $stmt = $db->prepare($sql);
    $params = array(':answer' => date('Y-m-d H:i:s')."->".$jsonArray['answer']);
    $stmt->execute($params);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

echo $json;
