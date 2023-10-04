<?php

namespace Code\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function playGame(string $generateQuestion, string $checkAnswer, string $task)
{
    $name = greet();
    line($task);

    $numberOfRounds = 3;
    $currentRound = 0;

    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $question = $generateQuestion();
        line('Question: %s', (string) $question);
        $userAnswer = prompt('Your answer');
        $correctAnswer = $checkAnswer($question);

        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct anwer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
    
}
