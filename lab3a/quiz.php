<?php

require "helpers.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = $_POST['complete_name'] ?? '';
$email = $_POST['email'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
$agree = $_POST['agree'] ?? null;

$questions_data = retrieve_questions(); 
$questions = $questions_data['questions'];

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">PHP Quiz</h1>
    <h2 class="subtitle">Answer all questions within 60 seconds!</h2>

    <form method="POST" action="result.php" id="quiz-form">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />

        <?php foreach ($questions as $index => $question): ?>
            <div class="box">
                <h3 class="title is-4"><?php echo ($index + 1) . '. ' . htmlspecialchars($question['question']); ?></h3>

                <?php foreach ($question['options'] as $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option['key']); ?>" required />
                                <?php echo htmlspecialchars($option['value']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="button is-link">Submit Quiz</button>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('quiz-form').submit();
        }, 60000);  
    });
</script>

</body>
</html>
