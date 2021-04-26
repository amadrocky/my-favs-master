<?php

namespace unit\api;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractApiTest
 * @package unit\api
 */
class AbstractApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * empty test
     */
    public function test()
    {
        $this->assertEquals(1, 1);
    }
    /**
     * @var ResponseInterface
     */
    protected ResponseInterface $response;
    /**
     * @var Client|null
     */
    protected $http = null;

    /**
     * setup Guzzle Client
     */
    public function createServiceAPI ()
    {
        $this->http = new Client(['base_uri' => 'http://localhost:8080']);
    }

    /**
     * Make a GET request
     *
     * @param $uri
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($uri)
    {
        if (is_null($this->http)) {
            $this->createServiceAPI();
        }

        $this->response = $this->http->request('GET', $uri, ['http_errors' => false]);
        return $this;
    }

    /**
     * Make a POST request
     *
     * @param $uri
     * @param $data
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($uri, $data)
    {
        if (is_null($this->http)) {
            $this->createServiceAPI();
        }

        $this->response = $this->http->request('POST', $uri, [
            'http_errors' => false,
            'form_params' => $data
        ]);
        return $this;
    }

    /**
     * Make a PUT request
     *
     * @param $uri
     * @param $data
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($uri, $data)
    {
        if (is_null($this->http)) {
            $this->createServiceAPI();
        }

        $this->response = $this->http->request('PUT', $uri, [
            'http_errors' => false,
            'form_params' => $data
        ]);
        return $this;
    }

    /**
     * Make a Delete request
     *
     * @param $uri
     * @param $data
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($uri, $data)
    {
        if (is_null($this->http)) {
            $this->createServiceAPI();
        }

        $this->response = $this->http->request('DELETE', $uri, [
            'http_errors' => false,
            'form_params' => $data
        ]);

        return $this;
    }

    /**
     * Decode json body
     *
     * @param $data
     */
    public function getBody(&$data)
    {
        if ($this->response) {
            $data = json_decode($this->response->getBody(), true);
        }
    }

    /**
     * Assert api error
     *
     * @param int $status_code
     * @param null $error_code
     * @param null $message
     */
    public function assertApiError($status_code = 400, $error_code = null, $message = null)
    {
        $this->getBody($data);
        $this->assertEquals($this->response->getStatusCode(), $status_code);

        if ($error_code) {
            $this->assertEquals($data['error']['id'], $error_code);
        }
        if ($message) {
            $this->assertEquals($data['error']['message'], $message);
        }
    }
}