<?php

namespace Omnipay\Tpay\_class_tpay\Validators;

interface PaymentTypesInterface
{
    public function getRequestFields();

    public function getResponseFields();
}
