<?php

namespace Omnipay\Tpay\_class_tpay\Validators;

interface VariableTypesInterface
{
    /**
     * @param mixed  $value
     * @param string $name
     */
    public function validateType($value, $name);
}
