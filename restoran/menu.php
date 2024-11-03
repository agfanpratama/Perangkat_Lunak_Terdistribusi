<?php
header("Content-Type: application/json");

// Read and output menu.json
echo file_get_contents("menu.json");
