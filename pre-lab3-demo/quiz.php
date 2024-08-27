<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complete_name = $_POST['complete_name'];
    $email = $_POST['email'];
    $agree = $_POST['agree'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Pre Laboratory Activity #3</title>
</head>
<body>

<h1>Quiz</h1>

<form method="POST" action="result.php">
    <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="agree" value="<?php echo $agree; ?>" />
    <h2>This essential gas is important so that we can breath.</h2>

    <h4>Choices</h4>
    <input type="radio" name="answer_1" value="A" /> Nitrogen<br />
    <input type="radio" name="answer_1" value="B" /> Carbondioxide<br />
    <input type="radio" name="answer_1" value="C" /> Oxygen<br />
    <input type="radio" name="answer_1" value="D" /> Helium<br />

    <h2>What is the nearest planet to the sun?</h2>

    <h4>Choices</h4>
    <input type="radio" name="answer_2" value="A" /> Pluto<br />
    <input type="radio" name="answer_2" value="B" /> Earth<br />
    <input type="radio" name="answer_2" value="C" /> Venus<br />
    <input type="radio" name="answer_2" value="D" /> Mercury<br />

    <button type="submit">
        Real Submit
    </button>
</form>

</body>
</html>