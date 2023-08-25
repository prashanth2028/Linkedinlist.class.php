<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    public function isEmpty() {
        return $this->head === null;
    }

    public function append($data) {
        $newNode = new Node($data);
        if ($this->isEmpty()) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null\n";
    }

    public function search($value) {
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $value) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function delete($value) {
        if ($this->isEmpty()) {
            return;
        }

        if ($this->head->data === $value) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            if ($current->next->data === $value) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }
}

// Usage
$list = new LinkedList();
$list->append(1);
$list->append(2);
$list->append(3);

$list->display(); // Output: 1 -> 2 -> 3 -> null

echo "Is 2 in the list? " . ($list->search(2) ? "Yes" : "No") . "\n"; // Output: Is 2 in the list? Yes

$list->delete(2);
$list->display(); // Output after deletion: 1 -> 3 -> null
