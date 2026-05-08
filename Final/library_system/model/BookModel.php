<?php
function getAllBooks($conn) {
    $sql    = "SELECT * FROM books ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    $books = []; // Start with an empty list

    // mysqli_fetch_assoc() reads one row at a time as an array
    // The while loop keeps going until there are no more rows
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row; // Add each row to the list
    }

    return $books; // Return the full list
}

function getBookById($conn, $id) {
    $sql  = "SELECT * FROM books WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the real value to the "?" — "i" means integer
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $book   = mysqli_fetch_assoc($result); // Get the single row

    mysqli_stmt_close($stmt);
    return $book; // Returns the row, or NULL if not found
}

function insertBook($conn, $title, $author, $category, $status) {
    $sql  = "INSERT INTO books (title, author, category, status) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // "ssss" means all 4 values are strings (s = string, i = integer)
    mysqli_stmt_bind_param($stmt, "ssss", $title, $author, $category, $status);

    $success = mysqli_stmt_execute($stmt); // Returns true or false
    mysqli_stmt_close($stmt);

    return $success;
}

function updateBook($conn, $id, $title, $author, $category, $status) {
    $sql  = "UPDATE books SET title=?, author=?, category=?, status=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    // "ssssi" = four strings, then one integer (the ID)
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $author, $category, $status, $id);

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}

function deleteBook($conn, $id) {
    $sql  = "DELETE FROM books WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}
?>