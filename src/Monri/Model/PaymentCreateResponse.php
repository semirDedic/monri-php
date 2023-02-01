<?php

namespace Monri\Model;

class PaymentCreateResponse
{

    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $clientSecret;
    /**
     * @var string
     */
    private $status;

    /**
     * @param string $id
     * @param string $clientSecret
     * @param string $status
     */
    public function __construct(string $id, string $clientSecret, string $status)
    {
        $this->id = $id;
        $this->clientSecret = $clientSecret;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}