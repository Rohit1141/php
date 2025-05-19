<?php
include 'db.php';
include 'student_crud.php';

$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        if (addStudent($name, $email, $age)) {
            $message = "Student added successfully!";
        } else {
            $message = "Error adding student!";
        }
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        if (updateStudent($id, $name, $email, $age)) {
            $message = "Student updated successfully!";
        } else {
            $message = "Error updating student!";
        }
    }
    
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        
        if (deleteStudent($id)) {
            $message = "Student deleted successfully!";
        } else {
            $message = "Error deleting student!";
        }
    }
}

// Fetch all students
$students = getStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
        }
        form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        .action-btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #28a745;
            color: white;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>
        
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- Add Student Form -->
        <form method="POST" action="">
            <h3>Add New Student</h3>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="age" placeholder="Age" required>
            <button type="submit" name="add">Add Student</button>
        </form>

        <!-- Student List -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= $student['age'] ?></td>
                <td>
                    <form method="POST" action="" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                        <input type="hidden" name="name" value="<?= htmlspecialchars($student['name']) ?>">
                        <input type="hidden" name="email" value="<?= htmlspecialchars($student['email']) ?>">
                        <input type="hidden" name="age" value="<?= $student['age'] ?>">
                        <button type="submit" name="update" class="action-btn edit-btn">Edit</button>
                    </form>
                    <form method="POST" action="" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                        <button type="submit" name="delete" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
