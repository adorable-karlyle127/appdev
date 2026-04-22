<?php
require 'db.php';
require 'ui.php';

$stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll();

renderPageStart('Students', 'Manage all student records');
?>

<?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
    <div class="alert" style="background: rgba(85, 117, 100, 0.12); color: #355244; border: 1px solid rgba(85, 117, 100, 0.18);">
         Student added successfully!
    </div>
<?php endif; ?>

<div class="toolbar">
    <div>
        <h2 style="margin: 0; font-size: 1.3rem; color: var(--text);">Student List</h2>
    </div>
    <a href="create.php" class="button">+ Add Student</a>
</div>

<div class="card panel">
    <?php if (count($students) > 0): ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $s): ?>
                <tr>
                    <td data-label="ID"><?= $s['id'] ?></td>
                    <td data-label="Name" class="student-name"><?= htmlspecialchars($s['name']) ?></td>
                    <td data-label="Email" class="muted"><?= htmlspecialchars($s['email']) ?></td>
                    <td data-label="Course"><span class="pill"><?= htmlspecialchars($s['course']) ?></span></td>
                    <td data-label="Actions">
                        <div class="actions">
                            <a href="edit.php?id=<?= $s['id'] ?>" class="button button-secondary" style="padding: 8px 16px; font-size: 0.9rem;">Edit</a>
                            <a href="delete.php?id=<?= $s['id'] ?>" class="button button-danger" style="padding: 8px 16px; font-size: 0.9rem;" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty-state">
            <h2>No students yet</h2>
            <p>Get started by adding your first student record.</p>
            <a href="create.php" class="button">+ Add Student</a>
        </div>
    <?php endif; ?>
</div>

<?php
renderPageEnd();