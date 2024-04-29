<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Exception;
use GuzzleHttp\Client;

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
        bool $isFormData=false,
        bool $withoutVerifying = false) :array
    {
        try {

            $response = (new Client([
                'base_uri' => $host,
                'timeout'  => 20,
                'headers' => [
                    'Authorization' =>  "Bearer {$this->config->token}",
                    'Content-Type'  => !$isFormData ? 'application/json' : 'multipart/form-data',
                ],
                'verify'   => !$withoutVerifying
            ]))
                ->post($host,[
                    !$isFormData ? 'json' :'form_params' => $params
                ]);

            $contents=  $response->getBody()->getContents();

            return json_decode($contents,true);
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
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
    public function delete(string $host, array $params = [], bool $isFormData = false, bool $withoutVerifying = false) :array
    {
        try {
            $response = (new Client([
                'base_uri' => $host,
                'timeout'  => 20,
                'headers' => [
                    'Authorization' =>  "Bearer {$this->config->token}",
                    'Content-Type'  => !$isFormData ? 'application/json' : 'multipart/form-data',
                ],
                'verify'   => !$withoutVerifying
            ]))
                ->delete($host,[
                    !$isFormData ? 'json' :'form_params' => $params
                ]);
            $contents=  $response->getBody()->getContents();
            return json_decode($contents,true);
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
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
        bool $isFormData=false,
        bool $withoutVerifying = false,
        bool $asForm = false
    ) :array
    {
        try {
            $contentType =   !$isFormData ? 'application/json' : 'multipart/form-data';
            $asForm && $contentType = 'application/x-www-form-urlencoded';
            $response = (new Client([
                'base_uri' => $host,
                'timeout'  => 20,
                'headers' => [
                    'Authorization' => "Bearer {$this->config->token}",
                    'Content-Type'  => $contentType,
                ],
                'verify'   => !$withoutVerifying
            ]))
                ->put($host,[
                    !$isFormData ? 'json' :'form_params' => $params
                ]);
            $contents=  $response->getBody()->getContents();
            return json_decode($contents,true);
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
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
            if(!empty($params)) {
                $host = $host.'?'.http_build_query($params);
            }
            $response = (new Client())
                ->request('GET',$host,[
                    'timeout'  => 20,
                    'headers' => [
                        'Authorization' =>  "Bearer {$this->config->token}"
                    ],
                    'verify'   => !$withoutVerifying
                ]);
            $contents=  $response->getBody()->getContents();
            return json_decode($contents,true);
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
