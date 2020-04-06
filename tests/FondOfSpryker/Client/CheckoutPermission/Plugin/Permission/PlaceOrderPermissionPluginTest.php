<?php

namespace FondOfSpryker\Client\CheckoutPermission\Plugin\Permission;

use Codeception\Test\Unit;

class PlaceOrderPermissionPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CheckoutPermission\Plugin\Permission\PlaceOrderPermissionPlugin
     */
    protected $placeOrderPermissionPlugin;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var int
     */
    protected $context;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->configuration = [
            'id_companies' => [1],
        ];

        $this->context = 1;

        $this->placeOrderPermissionPlugin = new PlaceOrderPermissionPlugin();
    }

    /**
     * @return void
     */
    public function testCanTrue(): void
    {
        $this->assertTrue($this->placeOrderPermissionPlugin->can($this->configuration, $this->context));
    }

    /**
     * @return void
     */
    public function testCanEmptyConfiguration(): void
    {
        $this->assertFalse($this->placeOrderPermissionPlugin->can([], $this->context));
    }

    /**
     * @return void
     */
    public function testCanContextNull(): void
    {
        $this->assertFalse($this->placeOrderPermissionPlugin->can($this->configuration));
    }

    /**
     * @return void
     */
    public function testGetConfigurationSignature(): void
    {
        $this->assertIsArray($this->placeOrderPermissionPlugin->getConfigurationSignature());
    }

    /**
     * @return void
     */
    public function testGetKey(): void
    {
        $this->assertSame('PlaceOrderPermissionPlugin', $this->placeOrderPermissionPlugin->getKey());
    }
}
