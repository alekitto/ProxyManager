<?php

declare(strict_types=1);

namespace ProxyManagerTest\Generator\Util;

use PHPUnit\Framework\TestCase;
use ProxyManager\Generator\Util\ProxiedMethodReturnExpression;
use ProxyManagerTestAsset\NeverCounter;
use ProxyManagerTestAsset\VoidMethodTypeHintedClass;
use ReflectionMethod;

use const PHP_VERSION_ID;

/**
 * Test to {@see ProxyManager\Generator\Util\ProxiedMethodReturnExpression}
 *
 * @covers \ProxyManager\Generator\Util\ProxiedMethodReturnExpression
 * @group Coverage
 */
final class ProxiedMethodReturnExpressionTest extends TestCase
{
    /**
     * @dataProvider returnExpressionsProvider
     */
    public function testGeneratedReturnExpression(
        string $expression,
        ?ReflectionMethod $originalMethod,
        string $expectedGeneratedCode
    ): void {
        self::assertSame($expectedGeneratedCode, ProxiedMethodReturnExpression::generate($expression, $originalMethod));
    }

    /**
     * @psalm-return iterable<string, array{0: string, 1: ReflectionMethod|null, 2: string}>
     */
    public function returnExpressionsProvider(): iterable
    {
        yield 'variable, no original method' => [
            '$foo',
            null,
            'return $foo;',
        ];

        yield 'variable, given non-void original method' => [
            '$foo',
            new ReflectionMethod(self::class, 'returnExpressionsProvider'),
            'return $foo;',
        ];

        yield 'variable, given void original method' => [
            '$foo',
            new ReflectionMethod(VoidMethodTypeHintedClass::class, 'returnVoid'),
            "\$foo;\nreturn;",
        ];

        yield 'expression, no original method' => [
            '(1 + 1)',
            null,
            'return (1 + 1);',
        ];

        yield 'expression, given non-void original method' => [
            '(1 + 1)',
            new ReflectionMethod(self::class, 'returnExpressionsProvider'),
            'return (1 + 1);',
        ];

        yield 'expression, given void original method' => [
            '(1 + 1)',
            new ReflectionMethod(VoidMethodTypeHintedClass::class, 'returnVoid'),
            "(1 + 1);\nreturn;",
        ];

        if (PHP_VERSION_ID < 80100) {
            return;
        }

        yield 'variable, given never original method' => [
            '$foo',
            new ReflectionMethod(NeverCounter::class, 'increment'),
            '$foo;',
        ];

        yield 'expression, given never original method' => [
            '(1 + 1)',
            new ReflectionMethod(NeverCounter::class, 'increment'),
            '(1 + 1);',
        ];
    }
}
