<h2 class="mb-4">Test Results for <?= htmlspecialchars($user['username']) ?></h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Test Date</th>
            <th>Correct Answers</th>
            <th>Total Questions</th>
            <th>Percentage</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?= $result['created_at'] ?></td>
                <td><?= $result['correct_count'] ?></td>
                <td><?= $result['total_questions'] ?></td>
                <td><?= number_format($result['percentage'], 2) ?>%</td>
                <td>
                    <a href="?action=view_detailed_result&id=<?= $result['id'] ?>" class="btn btn-sm btn-primary">View</a>
                    <a href="?action=edit_result&id=<?= $result['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?action=download_result_pdf&id=<?= $result['id'] ?>" class="btn btn-sm btn-success">Download PDF</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?action=view_results" class="btn btn-primary">Back to Users List</a>