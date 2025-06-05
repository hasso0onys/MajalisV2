<?php
header('Content-Type: application/json; charset=utf-8');
$csvFile = __DIR__ . '/majalis.csv';
$fields = ['name','sheikh','city','lectureType','time','audience','womensAccommodation','liveStream','liveStreamUrl','capacity','specialty','location'];
$values = [];
foreach ($fields as $field) {
    $values[] = isset($_POST[$field]) ? str_replace(["\r","\n"], ' ', $_POST[$field]) : '';
}
if (($handle = fopen($csvFile, 'a')) !== false) {
    fputcsv($handle, $values);
    fclose($handle);
    echo json_encode(['status'=>'success']);
} else {
    http_response_code(500);
    echo json_encode(['status'=>'error']);
}

