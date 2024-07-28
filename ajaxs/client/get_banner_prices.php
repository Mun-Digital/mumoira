<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
$DB = new DB();
    try {
        // Get position_id from GET request
        $position_id = isset($_GET['position_id']) ? $_GET['position_id'] : null;
        $position_id = 1;
        // Perform database query using $DB object
        $prices = $DB->get_results("SELECT * FROM banner_price WHERE position_id = :position_id", ['position_id' => $position_id]);
    
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($prices);
    } catch (Exception $e) {
        // Handle database connection errors
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
?>