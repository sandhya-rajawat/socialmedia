<?php
it('adds two numbers', function () {
    function addTwoNumber($a, $b) {
        return $a + $b;
    }
    $result = addTwoNumber(3, 5);
    expect($result)->toBe(8);
});
