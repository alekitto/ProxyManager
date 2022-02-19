<?php

declare(strict_types=1);

namespace ProxyManagerTest\ProxyGenerator\AccessInterceptor\MethodGenerator;

use Closure;
use Laminas\Code\Generator\PropertyGenerator;
use Laminas\Code\Generator\TypeGenerator;
use Laminas\Code\Generator\ValueGenerator;
use PHPUnit\Framework\TestCase;
use ProxyManager\ProxyGenerator\AccessInterceptor\MethodGenerator\SetMethodPrefixInterceptor;

use function array_values;

/**
 * Tests for {@see \ProxyManager\ProxyGenerator\AccessInterceptor\MethodGenerator\SetMethodPrefixInterceptor}
 *
 * @group Coverage
 */
final class SetMethodPrefixInterceptorTest extends TestCase
{
    /**
     * @covers \ProxyManager\ProxyGenerator\AccessInterceptor\MethodGenerator\SetMethodPrefixInterceptor::__construct
     */
    public function testBodyStructure(): void
    {
        $suffix = $this->createMock(PropertyGenerator::class);

        $suffix->expects(self::once())->method('getName')->willReturn('foo');

        $setter = new SetMethodPrefixInterceptor($suffix);

        self::assertEquals(TypeGenerator::fromTypeString('void'), $setter->getReturnType());
        self::assertSame('setMethodPrefixInterceptor', $setter->getName());

        $parameters = array_values($setter->getParameters());
        self::assertCount(2, $parameters);
        self::assertSame('methodName', $parameters[0]->getName());
        self::assertSame('string', $parameters[0]->getType());
        self::assertSame('prefixInterceptor', $parameters[1]->getName());
        self::assertEquals(new ValueGenerator(null), $parameters[1]->getDefaultValue());
        self::assertSame(Closure::class, $parameters[1]->getType());

        self::assertSame('$this->foo[$methodName] = $prefixInterceptor;', $setter->getBody());
    }
}
