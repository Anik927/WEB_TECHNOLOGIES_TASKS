<?php


require_once "../db_connect.php";   
require_once "../model/BookModel.php"; 


header("Content-Type: application/json");


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $action = $_GET["action"] ?? "";   
} else {
    $action = $_POST["action"] ?? "";
}


if ($action === "getAll") {
    // ---  Get all books ---
    $books = getAllBooks($conn);
    echo json_encode(["success" => true, "data" => $books]);

} elseif ($action === "getOne") {
    // --- Get one book by ID ---
    $id   = (int)($_GET["id"] ?? 0); 
    $book = getBookById($conn, $id);

    if ($book) {
        echo json_encode(["success" => true, "data" => $book]);
    } else {
        echo json_encode(["success" => false, "message" => "Book not found."]);
    }

} elseif ($action === "add") {
    
    $title    = trim($_POST["title"]    ?? "");
    $author   = trim($_POST["author"]   ?? "");
    $category = trim($_POST["category"] ?? "");
    $status   = trim($_POST["status"]   ?? "Available");

    if (empty($title) || empty($author) || empty($category)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit; 
    }

    $success = insertBook($conn, $title, $author, $category, $status);

    if ($success) {
        echo json_encode(["success" => true, "message" => "Book added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add book."]);
    }

} elseif ($action === "update") {
    
    $id       = (int)($_POST["id"]       ?? 0);
    $title    = trim($_POST["title"]    ?? "");
    $author   = trim($_POST["author"]   ?? "");
    $category = trim($_POST["category"] ?? "");
    $status   = trim($_POST["status"]   ?? "Available");

    if ($id <= 0 || empty($title) || empty($author) || empty($category)) {
        echo json_encode(["success" => false, "message" => "Invalid data."]);
        exit;
    }

    $success = updateBook($conn, $id, $title, $author, $category, $status);

    if ($success) {
        echo json_encode(["success" => true, "message" => "Book updated!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Update failed."]);
    }

} elseif ($action === "delete") {
    // --- Delete a book ---
    $id = (int)($_POST["id"] ?? 0);

    if ($id <= 0) {
        echo json_encode(["success" => false, "message" => "Invalid ID."]);
        exit;
    }

    $success = deleteBook($conn, $id);

    if ($success) {
        echo json_encode(["success" => true, "message" => "Book deleted."]);
    } else {
        echo json_encode(["success" => false, "message" => "Delete failed."]);
    }

} else {
    // Unknown action
    echo json_encode(["success" => false, "message" => "Unknown action."]);
}

mysqli_close($conn); 
?>