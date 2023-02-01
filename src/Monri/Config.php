<?php

namespace Monri;

use Monri\Exception\MonriException;

class Config
{

    private $merchantKey;
    private $authenticityToken;
    private $environment;

    /**
     * @return bool
     */
    public function isConfigured(): bool
    {
        return isset($this->merchantKey) && isset($this->authenticityToken) && isset($this->environment);
    }

    /**
     * @return mixed
     */
    public function getMerchantKey()
    {
        return $this->merchantKey;
    }

    /**
     * @return mixed
     */
    public function getAuthenticityToken()
    {
        return $this->authenticityToken;
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $merchantKey
     */
    public function setMerchantKey($merchantKey)
    {
        $this->merchantKey = $merchantKey;
    }

    /**
     * @param mixed $authenticityToken
     */
    public function setAuthenticityToken($authenticityToken)
    {
        $this->authenticityToken = $authenticityToken;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return string
     * @throws MonriException
     */
    public function getBaseApiUrl(): string
    {
        if ($this->environment == 'test') {
            return 'https://ipgtest.monri.com';
        } else if ($this->environment == 'production') {
            return 'https://ipg.monri.com';
        } else {
            throw new \Monri\Exception\MonriException("Environment=$this->environment not supported");
        }
    }


}