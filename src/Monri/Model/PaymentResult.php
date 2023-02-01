<?php

namespace Monri\Model;

class PaymentResult
{
    /**
     * @var string
     */
    private $currency;
    /**
     * @var string
     */
    private $amount;
    /**
     * @var string
     */
    private $orderNumber;
    /**
     * @var string
     */
    private $createdAt;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $transactionType;
    /**
     * @var string
     */
    private $paymentMethod;
    /**
     * @var string
     */
    private $responseMessage;

    /**
     * @param string|null $currency
     * @param string|null $amount
     * @param string|null $orderNumber
     * @param string|null $createdAt
     * @param string|null $status
     * @param string|null $transactionType
     * @param string|null $paymentMethod
     * @param string|null $responseMessage
     */
    public function __construct(
        ?string $currency,
        ?string $amount,
        ?string $orderNumber,
        ?string $createdAt,
        ?string $status,
        ?string $transactionType,
        ?string $paymentMethod,
        ?string $responseMessage
    ) {
        $this->currency = $currency;
        $this->amount = $amount;
        $this->orderNumber = $orderNumber;
        $this->createdAt = $createdAt;
        $this->status = $status;
        $this->transactionType = $transactionType;
        $this->paymentMethod = $paymentMethod;
        $this->responseMessage = $responseMessage;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
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
    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }
}
