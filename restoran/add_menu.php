<?php
header("Content-Type: application/json");

// Path to the menu JSON file
$menuFile = "menu.json";

// Check if required data is provided
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name'], $_POST['description'], $_POST['price'])) {
    $newItem = [
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "price" => (int)$_POST['price']
    ];

    // Load existing menu items
    $menuItems = json_decode(file_get_contents($menuFile), true);

    // Append the new item to the array
    $menuItems[] = $newItem;

    // Save updated menu back to the file
    file_put_contents($menuFile, json_encode($menuItems, JSON_PRETTY_PRINT));

    echo json_encode(["message" => "Menu item added successfully."]);
} else {
    echo json_encode(["error" => "Invalid data provided."]);
}
