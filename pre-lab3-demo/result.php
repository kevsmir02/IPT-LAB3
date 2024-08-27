<?php

$score = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complete_name = $_POST['complete_name'];
    $email = $_POST['email'];
    $agree = $_POST['agree'];

    $answer_1 = $_POST['answer_1'];
    $answer_2 = $_POST['answer_2'];
    $answers = [
        $answer_1,
        $answer_2
    ];
    $score = compute_score($answers);
}

function compute_score($answers) {
    $correct_answers = ['C', 'D'];
    $result = 0;
    for ($i = 0; $i < count($correct_answers); $i++) {
        if ($correct_answers[$i] == $answers[$i]) {
            $result++;
        }
    }
    return $result;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Pre Laboratory Activity #3</title>
</head>
<body>

<h1>Result</h1>

<h1>Congratulations <?php echo $complete_name; ?></h1>
<h2>Your score is <?php echo $score; ?>!</h2>

<h3>Form Data</h3>
<ul>
    <li>Name: <?php echo $complete_name; ?></li>
    <li>Email: <?php echo $email; ?></li>
</ul>
</body>
</html>