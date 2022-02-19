<?php

declare(strict_types=1);

namespace ProxyManagerTest\ProxyGenerator\NullObject\MethodGenerator;

use Laminas\Code\Reflection\MethodReflection;
use PHPUnit\Framework\TestCase;
use ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor;
use ProxyManagerTestAsset\BaseClass;
use ProxyManagerTestAsset\NeverCounter;

use const PHP_VERSION_ID;

/**
 * Tests for {@see \ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor}
 *
 * @group Coverage
 */
final class NullObjectMethodInterceptorTest extends TestCase
{
    /**
     * @covers \ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor
     */
    public function testBodyStructure(): void
    {
        $reflection = new MethodReflection(BaseClass::class, 'publicByReferenceParameterMethod');
        $method     = NullObjectMethodInterceptor::generateMethod($reflection);

        self::assertSame('publicByReferenceParameterMethod', $method->getName());
        self::assertCount(2, $method->getParameters());
        self::assertSame('', $method->getBody());
    }

    /**
     * @covers \ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor
     */
    public function testBodyStructureWithoutParameters(): void
    {
        $reflectionMethod = new MethodReflection(self::class, 'testBodyStructureWithoutParameters');

        $method = NullObjectMethodInterceptor::generateMethod($reflectionMethod);

        self::assertSame('testBodyStructureWithoutParameters', $method->getName());
        self::assertCount(0, $method->getParameters());
        self::assertSame('', $method->getBody());
    }

    /**
     * @covers \ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor
     */
    public function testBodyStructureWithoutByRefReturn(): void
    {
        $reflectionMethod = new MethodReflection(BaseClass::class, 'publicByReferenceMethod');

        $method = NullObjectMethodInterceptor::generateMethod($reflectionMethod);

        self::assertSame('publicByReferenceMethod', $method->getName());
        self::assertCount(0, $method->getParameters());
        self::assertStringMatchesFormat("\$ref%s = null;\nreturn \$ref%s;", $method->getBody());
    }

    /**
     * @covers \ProxyManager\ProxyGenerator\NullObject\MethodGenerator\NullObjectMethodInterceptor
     */
    public function testBodyStructureWithNeverReturnType(): void
    {
        if (PHP_VERSION_ID < 80100) {
            self::markTestSkipped('Needs PHP 8.1');
        }

        $reflectionMethod = new MethodReflection(NeverCounter::class, 'increment');

        $method = NullObjectMethodInterceptor::generateMethod($reflectionMethod);

        self::assertSame('increment', $method->getName());
        self::assertCount(1, $method->getParameters());
        self::assertSame('throw new \Exception();', $method->getBody());
    }
}
