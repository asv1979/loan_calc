<?php
namespace app\repositories;

use app\models\Payment;

/**
 * Class PaymentRepository
 * @package app\repositories
 */
class PaymentRepository
{
    /**
     * @param Payment $payment
     */
    public function save(Payment $payment): void
    {
        if (!$payment->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}
