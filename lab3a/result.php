<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$answers = $_POST['answers'] ?? [];
$complete_name = $_POST['complete_name'] ?? '';
$email = $_POST['email'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';

$questions = retrieve_questions();
$total_questions = count($questions['questions']);

$score = compute_score($answers);

$formatted_birthdate = date('F j, Y', strtotime($birthdate));

$hero_class = $score > 2 ? 'is-success' : 'is-danger';

$show_confetti = $score == $total_questions;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="hero <?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score: <?php echo $score; ?> / <?php echo $total_questions; ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo htmlspecialchars($complete_name); ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo htmlspecialchars($formatted_birthdate); ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php if ($show_confetti): ?>
    <canvas id="confetti-canvas"></canvas>
    <script>
    var confettiSettings = {
        target: 'confetti-canvas'
    };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
    </script>
    <?php endif; ?>

    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions['questions'] as $index => $question): ?>
                <tr>
                    <td><?php echo htmlspecialchars($question['question']); ?></td>
                    <td><?php echo htmlspecialchars($question['options'][array_search($questions['answers'][$index], array_column($question['options'], 'key'))]['value']); ?></td>
                    <td><?php echo htmlspecialchars($answers[$index] ?? 'None'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
