<?php
// Add a new student
function addStudent($name, $email, $age) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO students (name, email, age) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $email, $age);
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}

// Get all students
function getStudents() {
    global $conn;
    $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get a single student
function getStudent($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Update a student
function updateStudent($id, $name, $email, $age) {
    global $conn;
    try {
        $stmt = $conn->prepare("UPDATE students SET name=?, email=?, age=? WHERE id=?");
        $stmt->bind_param("ssii", $name, $email, $age, $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}

// Delete a student
function deleteStudent($id) {
    global $conn;
    try {
        $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}
?> 