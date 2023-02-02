<?php

namespace Monri\Api;

use Monri\ApiHttpResponse;
use Monri\Exception\MonriException;
use Monri\Model\CustomerResponse;
use Monri\Model\PaymentMethod;
use Monri\Model\PaymentMethodsResponse;

class Customers extends AuthenticationApi
{
    /**
     * @throws \Exception
     */
    public function create($params): CustomerResponse
    {
        $accessToken = $this->accessTokens->create(['scopes' => ['customers']])->getAccessToken();
        $response = $this->httpClient->post('/v2/customers', $params, ['oauth' => $accessToken]);
        if ($response->isFailed()) {
            throw $response->getException();
        } else {
            return $this->createCustomer($response);
        }
    }

    /**
     * @throws MonriException
     * @throws \Exception
     */
    public function find($id): CustomerResponse
    {
        if (!is_string($id)) {
            throw new MonriException('Id should be a string');
        }

        $accessToken = $this->accessTokens->create(['scopes' => ['customers']])->getAccessToken();
        $response = $this->httpClient->get("/v2/customers/$id", ['oauth' => $accessToken]);
        if ($response->isFailed()) {
            throw $response->getException();
        } else {
            return $this->createCustomer($response);
        }
    }

    /**
     * @throws MonriException
     * @throws \Exception
     */
    public function findByMerchantId($id): CustomerResponse
    {
        if (!is_string($id)) {
            throw new MonriException('Id should be a string');
        }

        $accessToken = $this->accessTokens->create(['scopes' => ['customers']])->getAccessToken();
        $response = $this->httpClient->get("/v2/merchants/customers/$id", ['oauth' => $accessToken]);
        if ($response->isFailed()) {
            throw $response->getException();
        } else {
            return $this->createCustomer($response);
        }
    }

    /**
     * @throws MonriException
     * @throws \Exception
     */
    public function paymentMethods($id): PaymentMethodsResponse
    {
        if (!is_string($id)) {
            throw new MonriException('Id should be a string');
        }

        $accessToken = $this->accessTokens->create(['scopes' => ['customers', 'payment-methods']])->getAccessToken();
        $response = $this->httpClient->get("/v2/customers/$id/payment-methods", ['oauth' => $accessToken]);
        if ($response->isFailed()) {
            throw $response->getException();
        } else {
            $body = $response->getBody();
            $data = $body['data'] ?? [];
            $mapped = array_map('Monri\Api\Customers::mapPaymentMethod', $data);
            return new PaymentMethodsResponse($mapped, $body['status'] ?? 'invalid-request');
        }
    }

    private static function mapPaymentMethod($pm): PaymentMethod
    {
        return new PaymentMethod(
            $pm['status'] ?? null,
            $pm['id'] ?? null,
            $pm['masked_pan'] ?? null,
            $pm['expiration_date'] ?? null,
            $pm['keep_until'] ?? null,
            $pm['created_at'] ?? null,
            $pm['updated_at'] ?? null,
            $pm['customer_uuid'] ?? null,
            $pm['token'] ?? null,
            $pm['expired'] ?? null
        );
    }

    /**
     * @param ApiHttpResponse $response
     * @return CustomerResponse
     */
    private function createCustomer(ApiHttpResponse $response): CustomerResponse
    {
        $body = $response->getBody();
        return new CustomerResponse(
            $body['uuid'] ?? null,
            $body['merchant_customer_id'] ?? null,
            $body['description'] ?? null,
            $body['email'] ?? null,
            $body['name'] ?? null,
            $body['phone'] ?? null,
            $body['status'] ?? null,
            $body['deleted'] ?? null,
            $body['city'] ?? null,
            $body['country'] ?? null,
            $body['zip_code'] ?? null,
            $body['address'] ?? null,
            $body['metadata'] ?? null,
            $body['created_at'] ?? null,
            $body['updated_at'] ?? null,
            $body['deleted_at'] ?? null,
        );
    }
}
