<?php
require 'db.php';
include 'ui.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    if (empty($name) || empty($email) || empty($course)) {
        $error = 'All fields are required.';
    } else {
        $sql = "INSERT INTO students (name, email, course) VALUES (:name, :email, :course)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute(['name' => $name, 'email' => $email, 'course' => $course])) {
            $success = true;
            header('Location: index.php?success=1');
            exit;
        } else {
            $error = 'Failed to add student. Please try again.';
        }
    }
}

renderPageStart('Add New Student', 'Create a new student record');
?>

<?php if ($error): ?>
    <div class="alert error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="card panel">
    <form method="POST">
        <div class="form-grid">
            <div class="field">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" required>
            </div>
            <div class="field field-full">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" placeholder="e.g., Computer Science" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="button">Add Student</button>
            <a href="index.php" class="button button-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php
renderPageEnd();