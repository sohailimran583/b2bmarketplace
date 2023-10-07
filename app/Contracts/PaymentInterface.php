<?php
namespace App\Contracts;

interface PaymentInterface
{
    public function createOrder(array $orderData);
    public function captureOrder(string $orderId);
}

?>