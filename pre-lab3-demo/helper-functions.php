<?php

require_once("questions.php");
require_once("answers.php");

function get_question($question_number) {
    $questions = QUESTIONS;

    // Because array index number starts at 0
    $index_key = $question_number - 1;

    return $questions[$index_key];
}

function is_answer_correct($question_number, $answer) {
    $correct = CORRECT_ANSWERS;
    return false;
}