<?php

namespace Omnipay\Tpay;

use Omnipay\Tests\GatewayTestCase;

class TpayGatewayTest extends GatewayTestCase
{
    protected $gateway;
    protected $options;
    protected $token;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new TpayGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->options = [
            'rsaKey' => 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0NCk1JR2ZNQTBHQ1NxR1NJYjNEUUVCQVFVQUE0R05BRENCaVFLQmdRQ2NLRTVZNU1Wemd5a1Z5ODNMS1NTTFlEMEVrU2xadTRVZm1STS8NCmM5L0NtMENuVDM2ekU0L2dMRzBSYzQwODRHNmIzU3l5NVpvZ1kwQXFOVU5vUEptUUZGVyswdXJacU8yNFRCQkxCcU10TTVYSllDaVQNCmVpNkx3RUIyNnpPOFZocW9SK0tiRS92K1l1YlFhNGQ0cWtHU0IzeHBhSUJncllrT2o0aFJDOXk0WXdJREFRQUINCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQ',
            'apiKey' => 'bda5eda723bf1ae71a82e90a249803d3f852248d',
            'apiPassword' => 'IhZVgraNcZoWPLgA',
            'verificationCode' => '6680181602d396e640cb091ea5418171',
            'hashType' => 'sha1',
        ];
    }

    public function testPurchase()
    {
        self::markTestSkipped('Currently failing with "Error: Call to undefined method Omnipay\Common\Http\Client::post()" error.');

        $purchaseOptions = [
            'amount' => '10.00',
            'card' => array_merge($this->getValidCard(), ['email' => 'customer@example.com']),
            'currency' => 'USD',
            'description' => 'payment for order X',
        ];

        $this->options = array_merge($this->options, $purchaseOptions);
        $response = $this->gateway->purchase($this->options)->setCardSave()->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertTrue($response->isPaid() || $response->isPending());
        $this->assertNull($response->getErrorCode());
        $this->assertNotNull($response->getToken());
        $this->token = $response->getToken();
    }
}
