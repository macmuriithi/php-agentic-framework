<?php
class Environment {
    private $state = [];
    private $observers = [];

    public function updateState($newState) {
        $this->state = array_merge($this->state, $newState);
        $this->notifyObservers();
    }

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->perceive($this->state);
        }
    }
}
