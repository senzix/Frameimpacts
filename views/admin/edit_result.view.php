<h2 class="mb-4">Edit Test Result for <?= htmlspecialchars($result['username']) ?></h2>
<form action="?action=edit_result&id=<?= $result['id'] ?>" method="POST">
    <input type="hidden" name="user_id" value="<?= $result['user_id'] ?>">
    <div class="mb-3">
        <label for="correct_count" class="form-label">Correct Answers</label>
        <input type="number" class="form-control" id="correct_count" name="correct_count" value="<?= $result['correct_count'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="total_questions" class="form-label">Total Questions</label>
        <input type="number" class="form-control" id="total_questions" name="total_questions" value="<?= $result['total_questions'] ?>" required readonly>
    </div>
    <div class="mb-3">
        <label for="percentage" class="form-label">Percentage</label>
        <input type="text" class="form-control" id="percentage" value="<?= number_format($result['percentage'], 2) ?>%" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Update Result</button>
    <a href="?action=user_results&user_id=<?= $result['user_id'] ?>" class="btn btn-secondary">Cancel</a>
</form>

<script>
document.getElementById('correct_count').addEventListener('input', function() {
    var correctCount = parseInt(this.value);
    var totalQuestions = parseInt(document.getElementById('total_questions').value);
    var percentage = (correctCount / totalQuestions) * 100;
    document.getElementById('percentage').value = percentage.toFixed(2) + '%';
});
</script>