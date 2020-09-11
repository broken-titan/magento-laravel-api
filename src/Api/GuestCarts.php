<?php

namespace Grayloon\Magento\Api;

class GuestCarts extends AbstractApi
{
    /**
     * Enable an customer or guest user to create an empty cart and quote for an anonymous customer.
     *
     * @return string
     */
    public function create()
    {
        return $this->post('/guest-carts');
    }

    /**
     * Enable a guest user to return information for a specified cart.
     *
     * @return array
     */
    public function cart($cartId)
    {
        return $this->get('/guest-carts/'.$cartId);
    }

    /**
     * List items that are assigned to a specified cart.
     *
     * @return array
     */
    public function items($cartId)
    {
        return $this->get('/guest-carts/'.$cartId.'/items');
    }

    /**
     * Add/update the specified cart item.
     *
     * @param  string  $cartId
     * @param  string  $sku
     * @param  string  $quantity
     * @return array
     */
    public function addItem($cartId, $sku, $quantity)
    {
        return $this->post('/guest-carts/'.$cartId.'/items', [
            'cartItem' => [
                'quote_id' => $cartId,
                'sku'      => $sku,
                'qty'      => $quantity,
            ],
        ]);
    }

    /**
     * Estimate the shipping methods for a specified cart.
     *
     * @param  string  $cartId
     * @param  array   $address
     * @return array
     */
    public function estimateShippingMethods($cartId, $address)
    {
        return $this->post('/guest-carts/'.$cartId.'/estimate-shipping-methods', [
            'address' => $address
        ]);
    }

    /**
     * Add shipping information for a specified cart.
     *
     * @param  string  $cartId
     * @param  array   $addressInformation
     * @return array
     */
    public function addShippingInformation($cartId, $addressInformation)
    {
        return $this->post('/guest-carts/'.$cartId.'/shipping-information', [
            'addressInformation' => $addressInformation
        ]);
    }

    /**
     * Return quote totals data for a specified cart.
     *
     * @return array
     */
    public function totals($cartId)
    {
        return $this->get('/guest-carts/'.$cartId.'/totals');
    }
}
