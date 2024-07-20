<?php
class Agent {
    private $name;
    private $environment;
    private $knowledge = [];
    private $goals = [];

    public function __construct($name, $environment) {
        $this->name = $name;
        $this->environment = $environment;
        $this->environment->addObserver($this);
    }

    public function setGoal($goal) {
        $this->goals[] = $goal;
    }

    public function perceive($environmentState) {
        echo "{$this->name} perceived: " . json_encode($environmentState) . PHP_EOL;
        $this->plan();
    }

    private function plan() {
        echo "{$this->name} is planning..." . PHP_EOL;
        $action = $this->decideAction();
        $this->execute($action);
    }

    private function decideAction() {
        // Simple decision-making logic
        if (count($this->goals) > 0) {
            return "pursue_goal_" . $this->goals[0];
        }
        return 'idle';
    }

    private function execute($action) {
        echo "{$this->name} is executing action: {$action}" . PHP_EOL;
        // Simulate action execution
        $this->learn($action);
    }

    private function learn($action) {
        echo "{$this->name} is learning from action: {$action}" . PHP_EOL;
        // Update knowledge based on action results
        if (!isset($this->knowledge[$action])) {
            $this->knowledge[$action] = 0;
        }
        $this->knowledge[$action]++;
    }
}

// Simulate environment changes
for ($i = 0; $i < 5; $i++) {
    $environment->updateState([
        'time' => time(),
        'randomValue' => mt_rand() / mt_getrandmax()
    ]);
    sleep(2); // Wait for 2 seconds
}
