<?php
header('Content-Type: application/json; charset=utf-8');
$csvFile = __DIR__ . '/majalis.csv';
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'invalid data']);
    exit;
}
$fields = ['name','sheikh','city','lectureType','time','audience','womensAccommodation','liveStream','liveStreamUrl','capacity','specialty','location'];
$handle = fopen($csvFile, 'w');
if ($handle === false) {
    http_response_code(500);
    echo json_encode(['status' => 'error']);
    exit;
}
fputcsv($handle, $fields);
foreach ($data as $row) {
    $values = [];
    foreach ($fields as $field) {
        $values[] = isset($row[$field]) ? str_replace(["\r","\n"], ' ', $row[$field]) : '';
    }
    fputcsv($handle, $values);
}
fclose($handle);
echo json_encode(['status' => 'success']);
?>
