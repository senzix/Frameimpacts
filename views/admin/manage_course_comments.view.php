<h2><?= isset($course) ? "Comments for Course: " . htmlspecialchars($course['title']) : "All Course Comments" ?></h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <?php if (!isset($course)): ?>
                <th>Course</th>
            <?php endif; ?>
            <th>User</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= htmlspecialchars($comment['id']) ?></td>
                <?php if (!isset($course)): ?>
                    <td><?= htmlspecialchars($comment['course_title']) ?></td>
                <?php endif; ?>
                <td><?= htmlspecialchars($comment['username']) ?></td>
                <td><?= htmlspecialchars($comment['content']) ?></td>
                <td><?= htmlspecialchars($comment['created_at']) ?></td>
                <td>
                    <a href="admin?action=edit_course_comment&comment_id=<?= $comment['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="admin?action=delete_course_comment&comment_id=<?= $comment['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>