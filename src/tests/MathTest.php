<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class MathTest extends TestCase
{
    public function testGetSquared(): void
    {
        require_once __DIR__ . '/../src/Math.php';
        $result = getSquared(10);
        $this->assertSame(100, $result);
    }
}
