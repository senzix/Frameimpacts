<h2 class="mb-4">Users with Test Results</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Last Test Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users_with_tests as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= $user['last_test_date'] ?></td>
                <td>
                    <a href="?action=user_results&user_id=<?= $user['user_id'] ?>" class="btn btn-sm btn-primary">View Results</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>