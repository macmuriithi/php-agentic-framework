# Agentic Framework Documentation

## Overview

The Agentic Framework is designed to simulate an environment and agents within that environment. Agents can perceive changes in the environment, set goals, plan actions, execute them, and learn from their experiences. The framework comprises two main classes: `Agent` and `Environment`.

## Classes

### Agent

The `Agent` class represents an agent that can perceive its environment, set goals, plan actions, and learn from the outcomes of those actions.

#### Properties

- **name**: The name of the agent.
- **environment**: The environment in which the agent operates.
- **knowledge**: An associative array storing the knowledge acquired by the agent.
- **goals**: An array of goals that the agent aims to achieve.

#### Methods

- **__construct($name, $environment)**
  - Initializes the agent with a name and an environment.
  - Registers the agent as an observer of the environment.

- **setGoal($goal)**
  - Adds a goal to the agent's list of goals.

- **perceive($environmentState)**
  - Called when the environment changes.
  - Triggers the agent's planning process.

- **plan()**
  - Initiates the planning phase where the agent decides on an action based on its goals.

- **decideAction()**
  - Contains simple decision-making logic to determine the next action.

- **execute($action)**
  - Executes the decided action.
  - Simulates the action execution and triggers the learning process.

- **learn($action)**
  - Updates the agent's knowledge based on the action's outcome.

### Environment

The `Environment` class represents the environment in which agents operate. It maintains the state of the environment and notifies agents of any changes.

#### Properties

- **state**: An associative array storing the current state of the environment.
- **observers**: An array of observers (agents) that are notified of state changes.

#### Methods

- **updateState($newState)**
  - Merges the new state with the current state.
  - Notifies all registered observers of the state change.

- **addObserver($observer)**
  - Adds an observer (agent) to the list of observers.

- **notifyObservers()**
  - Notifies all registered observers of the current state.

## Usage Example

```php
<?php
require_once('Environment.php');
require_once('Agent.php');

// Create a new environment
$environment = new Environment();

// Create a new agent
$agent = new Agent('Agent1', $environment);

// Set a goal for the agent
$agent->setGoal('find_food');

// Simulate environment changes
for ($i = 0; $i < 5; $i++) {
    $environment->updateState([
        'time' => time(),
        'random_value' => mt_rand() / mt_getrandmax()
    ]);
    sleep(2); // Wait for 2 seconds
}
?>