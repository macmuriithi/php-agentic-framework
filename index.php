<?php
require_once('Environment.php');
require_once('Agent.php');
// Usage example
$environment = new Environment();
$agent = new Agent('Agent1', $environment);
$agent->setGoal('find_food');
//Simulate Environment Changes
for ($i = 0; $i < 5; $i++) {
    $environment->updateState([
        'time' => time(),
        'random_value' => mt_rand() / mt_getrandmax()
    ]);
    sleep(2); // Wait for 2 seconds
}
