<?php

namespace Omnipay\Tpay\_class_tpay\Notifications;

use Omnipay\Tpay\_class_tpay\PaymentCard;
use Omnipay\Tpay\_class_tpay\Utilities\TException;
use Omnipay\Tpay\_class_tpay\Utilities\Util;
use Omnipay\Tpay\_class_tpay\Validators\PaymentTypes\PaymentTypeCard;
use Omnipay\Tpay\_class_tpay\Validators\PaymentTypes\PaymentTypeCardDeregister;
use Omnipay\Tpay\Dictionaries\CardDictionary;

class CardNotificationHandler extends PaymentCard
{
    /**
     * @param string $apiKey
     * @param string $apiPassword
     * @param string $verificationCode
     * @param string $hashType
     */
    public function __construct($apiKey, $apiPassword, $verificationCode, $hashType)
    {
        $this->cardApiKey = $apiKey;
        $this->cardApiPass = $apiPassword;
        $this->cardVerificationCode = $verificationCode;
        $this->cardHashAlg = $hashType;
        parent::__construct();
    }

    /**
     * Check cURL request from tpay server after payment.
     * This method check server ip, required fields and md5 checksum sent by payment server.
     * Display information to prevent sending repeated notifications.
     *
     * @throws TException
     *
     * @return array
     */
    public function handleNotification()
    {
        Util::log('Card notification', "POST params: \n".print_r($_POST, true));

        /** @var string $notificationType */
        $notificationType = Util::post('type', CardDictionary::STRING);

        if (CardDictionary::SALE === $notificationType) {
            $response = $this->getResponse(new PaymentTypeCard());
        } elseif (CardDictionary::DEREGISTER === $notificationType) {
            $response = $this->getResponse(new PaymentTypeCardDeregister());
        } else {
            throw new TException('Unknown notification type');
        }

        if (true === $this->validateServerIP && false === $this->isTpayServer()) {
            throw new TException('Request is not from secure server');
        }

        echo json_encode([CardDictionary::RESULT => '1']);

        if (CardDictionary::SALE === $notificationType && 'correct' === $response['status']) {
            $resp = [
                CardDictionary::ORDERID => $response[CardDictionary::ORDERID],
                CardDictionary::SIGN => $response[CardDictionary::SIGN],
                CardDictionary::SALE_AUTH => $response[CardDictionary::SALE_AUTH],
                'date' => $response['date'],
                'card' => $response['card'],
            ];
            if (isset($response[CardDictionary::TEST_MODE])) {
                $resp[CardDictionary::TEST_MODE] = $response[CardDictionary::TEST_MODE];
            }
            if (isset($response[CardDictionary::CLIAUTH])) {
                $resp[CardDictionary::CLIAUTH] = $response[CardDictionary::CLIAUTH];
                $this->setClientToken($resp[CardDictionary::CLIAUTH]);
            }
            return $resp;
        }
        if (CardDictionary::DEREGISTER === $notificationType) {
            return $response;
        }
        throw new TException('Incorrect payment');
    }
}
