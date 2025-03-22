<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/cartesianProduct.php';; // Adjust path if needed

class CartesianProductTest extends TestCase
{
    public function testBasicFunctionality()
    {
        $result = cartesianProduct([1, 2], ['A', 'B']);
        $expected = [
            [1, 'A'],
            [1, 'B'],
            [2, 'A'],
            [2, 'B']
        ];
        $this->assertEquals($expected, $result);
    }

    public function testEdgeCases()
    {
        $this->assertEquals([], cartesianProduct([1, 2], [])); // Empty array case
        $this->assertEquals([[1], [2]], cartesianProduct([1, 2])); // Single array case
        $this->assertEquals([[]], cartesianProduct([])); // No input case
    }

    public function testWithCallback()
    {
        $result = cartesianProductWithCallback(fn($combination) => implode('-', $combination), [1, 2], ['A', 'B']);
        $expected = ['1-A', '1-B', '2-A', '2-B'];
        $this->assertEquals($expected, $result);
    }

    public function testGenerator()
    {
        $generator = cartesianProductGenerator([1, 2], ['A', 'B']);
        $expected = [
            [1, 'A'],
            [1, 'B'],
            [2, 'A'],
            [2, 'B']
        ];

        $generatedResults = [];
        foreach ($generator as $combination) {
            $generatedResults[] = $combination;
        }

        $this->assertEquals($expected, $generatedResults);
    }
}
