<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Exception;
use Illuminate\Support\Facades\Http;

trait RequestApi
{


    /**
     * @param string $host
     * @param array $params
     * @param bool $isBody
     * @param bool $withoutVerifying
     * @return array
     * @throws Exception
     */
    public function post(string $host,
        array $params =[],
        bool $isBody=false,
        bool $withoutVerifying = false) :array
    {
        try {
            $http = Http::withToken($this->config->token);
            $withoutVerifying && $http->withoutVerifying();
            $isBody && $http = $http->acceptJson();
            $response = $http->post($host,$params);
            return $response->json();
        }catch (Exception $e) {
            throw new $e;
        }
    }

    /**
     * @param string $host
     * @param array $params
     * @param bool $isBody
     * @param bool $withoutVerifying
     * @return array
     * @throws Exception
     */
    public function delete(string $host, array $params = [], bool $isBody = false, bool $withoutVerifying = false) :array
    {
        try {
            $http = Http::withToken($this->config->token);
            $withoutVerifying && $http->withoutVerifying();
            $isBody && $http = $http->acceptJson();
            $response = $http->delete($host,$params);
            return $response->json();
        }catch (Exception $e) {
            throw new $e;
        }
    }

    /**
     * @param string $host
     * @param array $params
     * @param bool $isBody
     * @param bool $withoutVerifying
     * @param bool $asForm
     * @return array
     * @throws Exception
     */
    public function put(
        string $host,
        array $params =[],
        bool $isBody=false,
        bool $withoutVerifying = false,
        bool $asForm = false
    ) :array
    {
        try {
            $http = Http::withToken($this->config->token);
            $withoutVerifying && $http->withoutVerifying();
            $asForm && $http->asForm();
            $isBody && $http->acceptJson();
            $response = $http->put($host,$params);
            return $response->json();
        }catch (Exception $e) {
            throw new $e;
        }
    }

    /**
     * @param string $host
     * @param array $params
     * @param bool $withoutVerifying
     * @return array|mixed
     * @throws Exception
     */
    public function get(string $host,array $params = [], bool $withoutVerifying = false): mixed
    {
        try {
            $http = Http::withToken($this->config->token);
            $withoutVerifying && $http->withoutVerifying();
            $response = $http->get($host.'?'.http_build_query($params));
            return $response->json();
        }catch (Exception $e) {
            throw new $e;
        }
    }
}
