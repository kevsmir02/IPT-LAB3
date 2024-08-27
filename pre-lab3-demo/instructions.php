<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complete_name = $_POST['complete_name'];
    $email = $_POST['email'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Pre Laboratory Activity #3</title>
</head>
<body>

<h1>Instructions</h1>

<form method="POST" action="quiz.php">
    <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />

    <label>Terms and conditions</label>
    <textarea>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>

    <input name="agree" type="checkbox" /><br />

    <button type="submit">
        Begin Quiz
    </button>
</form>

</body>
</html>