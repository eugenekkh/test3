<?php

use PHPUnit\Framework\TestCase;

class BigSumTest extends TestCase
{
    public static function operationProvider(): array
    {
        return [
            [100, 199, '299'],
            [9999, 99, '10098'],
            ['554998568852366888426555555553666', 999, '554998568852366888426555555554665'],
            ['554998568852366888426555555553666', '0', '554998568852366888426555555553666']
        ];
    }

    /**
     * @param $validWord
     *
     * @dataProvider operationProvider
     */
    public function testOperations($a, $b, $expected): void
    {
        $this->assertEquals($expected, bigsum($a, $b));
    }

    public function testInvalidArgument(): void
    {
        $this->expectException(\RuntimeException::class);
        bigsum('abc', 'def');
    }
}
