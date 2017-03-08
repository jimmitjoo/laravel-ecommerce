<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAddToCart()
    {
        $order = $this->setUpOrder();

        $this->post('/api/addtocart', $order)
            ->assertJson(
                [
                    'product_id' => $order['product_id'],
                    'amount' => $order['amount']
                ]
            );
    }

    public function testGetCart()
    {
        $order = $this->setUpOrder();

        $response = $this->post('/api/addtocart', $order)->json();

        $this->get('/api/orders/' . $response['order_id'] . '/items')
            ->assertJsonFragment(['id' => $response['order_id']])
            ->assertJsonFragment(['product_id' => $order['product_id']])
            ->assertJsonFragment(['amount' => $order['amount']])
            ->assertJsonFragment(['order_id' => $response['order_id']]);

    }

    public function testAddMultipleItemsToOrder()
    {
        $orders = $this->setUpMultiItemOrder();

        // Conditions if there are same products chosen
        $data = $this->get('/api/orders/' . $orders['id'] . '/items');
        if ($orders[0]['product_id'] == $orders[1]['product_id']) {
            $data->assertJsonFragment(['product_id' => $orders[0]['product_id']])
                ->assertJsonFragment(['amount' => $orders[0]['amount'] + $orders[1]['amount']]);
        } elseif ($orders[0]['product_id'] == $orders[2]['product_id']) {
            $data->assertJsonFragment(['product_id' => $orders[0]['product_id']])
                ->assertJsonFragment(['amount' => $orders[0]['amount'] + $orders[2]['amount']]);
        } elseif ($orders[1]['product_id'] == $orders[2]['product_id']) {
            $data->assertJsonFragment(['product_id' => $orders[1]['product_id']])
                ->assertJsonFragment(['amount' => $orders[1]['amount'] + $orders[2]['amount']]);
        } else {
            $this->get('/api/orders/' . $orders['id'] . '/items')
                ->assertJsonFragment(['product_id' => $orders[0]['product_id']])
                ->assertJsonFragment(['amount' => $orders[0]['amount']])
                ->assertJsonFragment(['order_id' => $orders['id']])
                ->assertJsonFragment(['product_id' => $orders[1]['product_id']])
                ->assertJsonFragment(['amount' => $orders[1]['amount']])
                ->assertJsonFragment(['order_id' => $orders['id']])
                ->assertJsonFragment(['product_id' => $orders[2]['product_id']])
                ->assertJsonFragment(['amount' => $orders[2]['amount']])
                ->assertJsonFragment(['order_id' => $orders['id']]);
        }

    }

    protected function setUpOrder($orderId = null)
    {
        $product = Product::orderByRaw('RAND()')->first();
        $quantity = rand(1, 5);
        $order = [
            'product_id' => $product->id,
            'amount' => $quantity
        ];

        if ($orderId != null) {
            $order['order_id'] = $orderId;
        }

        return $order;
    }

    protected function setUpMultiItemOrder()
    {
        $order = $this->setUpOrder();
        $myOrder = $this->post('/api/addtocart', $order)->json();

        $order2 = $this->setUpOrder($myOrder['order_id']);
        $order3 = $this->setUpOrder($myOrder['order_id']);

        $this->post('/api/addtocart', $order2)->json();
        $this->post('/api/addtocart', $order3)->json();

        return ['id' => $myOrder['order_id'], $order, $order2, $order3];
    }
}
