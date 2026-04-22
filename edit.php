<?php
require 'db.php';
require 'ui.php';

$id = $_GET['id'] ?? null;
$error = '';

if (!$id) {
    header('Location: index.php');
    exit;
}

// Fetch current data
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    if (empty($name) || empty($email) || empty($course)) {
        $error = 'All fields are required.';
    } else {
        $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
        if ($pdo->prepare($sql)->execute([$name, $email, $course, $id])) {
            header("Location: index.php?success=1");
            exit;
        } else {
            $error = 'Failed to update student. Please try again.';
        }
    }
}

renderPageStart('Edit Student', 'Update student information');
?>

<?php if ($error): ?>
    <div class="alert error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="card panel">
    <form method="POST">
        <div class="form-grid">
            <div class="field">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
            </div>
            <div class="field field-full">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="button">Update Student</button>
            <a href="index.php" class="button button-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php
renderPageEnd();