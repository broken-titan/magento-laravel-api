<?php

namespace Grayloon\Magento\Tests;

use Grayloon\Magento\Api\Products;
use Grayloon\Magento\Magento;
use Illuminate\Support\Facades\Http;

class ProductTest extends TestCase
{
    public function test_can_call_magento_api_products()
    {
        $magento = new Magento();

        $this->assertInstanceOf(Products::class, $magento->api('products'));
    }

    public function test_can_call_magento_api_products_all()
    {
        Http::fake();

        $magento = new Magento();
        $api = $magento->api('products')->all();

        $this->assertTrue($api->ok());
    }

    public function test_can_call_magento_api_products_show()
    {
        Http::fake();

        $magento = new Magento();
        $api = $magento->api('products')->show('foo');

        $this->assertTrue($api->ok());
    }
}
