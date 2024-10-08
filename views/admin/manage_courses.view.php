<h2 class="mb-4">Manage Courses</h2>
<a href="?action=add_course" class="btn btn-primary mb-3">Add New Course</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Image</th>
            <th>Video URL</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= htmlspecialchars($course['title']) ?></td>
                <td><?= htmlspecialchars($course['category_name']) ?></td>
                <td><?= htmlspecialchars(substr($course['description'], 0, 100)) ?>...</td>
                <td>
                    <?php if ($course['image_path']): ?>
                        <img src="<?= htmlspecialchars($course['image_path']) ?>" alt="Course Image" style="max-width: 100px; max-height: 100px;">
                    <?php else: ?>
                        No image
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($course['video_url']) ?></td>
                <td><?= htmlspecialchars($course['created_by']) ?></td>
                <td><?= htmlspecialchars($course['created_at']) ?></td>
                <td><?= htmlspecialchars($course['updated_at']) ?></td>
                <td>
                    <a href="?action=edit_course&course_id=<?= $course['course_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?action=delete_course&course_id=<?= $course['course_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>