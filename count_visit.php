<?php
header('Content-Type: application/json; charset=utf-8');
$file = __DIR__ . '/visits.json';
$data = ["total" => 0, "daily" => 0, "date" => date('Y-m-d')];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $stored = json_decode($json, true);
    if (is_array($stored)) {
        $data = array_merge($data, $stored);
    }
}
$today = date('Y-m-d');
if (!isset($_GET['mode']) || $_GET['mode'] !== 'get') {
    // increment counters
    if ($data['date'] !== $today) {
        $data['daily'] = 0;
        $data['date'] = $today;
    }
    $data['daily']++;
    $data['total']++;
    file_put_contents($file, json_encode($data));
} else {
    // reset daily if date changed but without increment
    if ($data['date'] !== $today) {
        $data['daily'] = 0;
        $data['date'] = $today;
        file_put_contents($file, json_encode($data));
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

