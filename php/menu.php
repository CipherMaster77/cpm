<?php

class OrderSystem {
    private $menu = array(
        'coke' => 1.50,
        'sprite' => 1.50,
        'royal' => 1.75,
        'jack' => 5.00,
        'deniels' => 5.00,
        'c2' => 2.00,
        'tang' => 1.50,
        'rootbeer' => 2.00
    );
    private $order = array();

    public function displayMenu() {
        echo "Menu:\n";
        foreach ($this->menu as $item => $price) {
            echo ucfirst($item) . ": $" . number_format($price, 2) . "\n";
        }
    }

    public function takeOrder() {
        echo "\nPlease place your order (enter 'done' when finished):\n";
        while (true) {
            $item = strtolower(trim(readline("Item: ")));
            if ($item == 'done') {
                break;
            } elseif (array_key_exists($item, $this->menu)) {
                $quantity = intval(readline("Quantity: "));
                if (array_key_exists($item, $this->order)) {
                    $this->order[$item] += $quantity;
                } else {
                    $this->order[$item] = $quantity;
                }
            } else {
                echo "Invalid item! Please select from the menu.\n";
            }
        }
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->order as $item => $quantity) {
            $total += $this->menu[$item] * $quantity;
        }
        return $total;
    }

    public function displayOrder() {
        echo "\nYour Order:\n";
        foreach ($this->order as $item => $quantity) {
            echo ucfirst($item) . ": " . $quantity . "\n";
        }
        echo "Total: $" . number_format($this->calculateTotal(), 2) . "\n";
    }
}

function main() {
    $orderSystem = new OrderSystem();
    $orderSystem->displayMenu();
    $orderSystem->takeOrder();
    $orderSystem->displayOrder();
}

main();

?>
