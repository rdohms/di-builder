<?php
declare(strict_types=1);

namespace Lcobucci\DependencyInjection\Generators;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

/**
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 */
final class DelegatingTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     *
     * @covers \Lcobucci\DependencyInjection\Generator::__construct
     * @covers \Lcobucci\DependencyInjection\Generators\Delegating::getLoader
     */
    public function getLoaderShouldReturnADelegatingLoaderWithTheOtherLoaders(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $generator = new Delegating();

        $loader = $generator->getLoader($container, []);

        self::assertInstanceOf(DelegatingLoader::class, $loader);
        self::assertInstanceOf(LoaderResolver::class, $loader->getResolver());
        self::assertAttributeCount(3, 'loaders', $loader->getResolver());
    }
}
