<?php
header('Content-Type: application/json; charset=utf-8');
$csvFile = __DIR__ . '/majalis.csv';
$data = [];
if (file_exists($csvFile) && ($handle = fopen($csvFile, 'r')) !== false) {
    if (($headers = fgetcsv($handle)) !== false) {
        while (($row = fgetcsv($handle)) !== false) {
            $item = [];
            foreach ($headers as $idx => $header) {
                $item[$header] = $row[$idx] ?? '';
            }
            $data[] = $item;
        }
    }
    fclose($handle);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

