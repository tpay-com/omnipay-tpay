<?php

namespace Omnipay\Tpay\_class_tpay\Validators;

interface PaymentTypesInterface
{
    /**
     * @return array<string, array<string, mixed>>
     */
    public function getRequestFields();

    /**
     * @return null|array<string, array<string, mixed>>
     */
    public function getResponseFields();
}
