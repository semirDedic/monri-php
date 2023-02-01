<?php

namespace Monri\Model;

class StatusResponse
{
    /**
     * @var PaymentResult
     */
    private $paymentResult;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $paymentStatus;
    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @param PaymentResult $paymentResult
     * @param string $status
     * @param string $paymentStatus
     * @param string $clientSecret
     */
    public function __construct(PaymentResult $paymentResult, string $status, string $paymentStatus, string $clientSecret)
    {
        $this->paymentResult = $paymentResult;
        $this->status = $status;
        $this->paymentStatus = $paymentStatus;
        $this->clientSecret = $clientSecret;
    }


    /**
     * @return PaymentResult
     */
    public function getPaymentResult(): PaymentResult
    {
        return $this->paymentResult;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
}