<?php
/**
 * This PHP class represents an HTTP request and provides a convenient
 * interface to access various elements of the request, such as method,
 * URI, query parameters, POST data, and headers.
 */
namespace app\http;

class Request{
    private $method; // Represents the HTTP method used in the request (GET, POST, etc.).
    private $uri; // Represents the URI (Uniform Resource Identifier) of the request.
    private $queryParams = []; // An array containing query parameters extracted from the URI.
    private $post = []; // An array containing POST data sent with the request.
    private $headers = []; // An array containing HTTP headers of the request.

    /**
     * The constructor initializes the Request object. It sets the query parameters,
     * POST data, headers, HTTP method, and URI based on the current request.
     */
    public function __construct(){
        $this->setQueryParams($_GET ? $_GET : []);
        $this->post = $_POST ? $_POST: [];
        $this->headers = getallheaders();
        $this->method = $_SERVER['REQUEST_METHOD'] ? $_SERVER['REQUEST_METHOD'] : '';
        $this->setUri($_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : '');

    }

    /**
     * Returns the HTTP method used in the request (GET, POST, etc.).
     * @return mixed|string
     */
    public function getMethod(){ return $this->method; }

    /**
     * Returns an array of query parameters extracted from the request URI.
     * @return array
     */
    public function getQueryParams(){ return $this->queryParams; }

    /**
     * Returns an array of HTTP headers sent with the request.
     * @return array|false
     */
    public function getHeaders(){ return $this->headers; }

    /**
     * Returns the URI of the request after stripping any leading slashes.
     * @return false|string
     */
    public function getUri(){
        if(preg_match("/^\/.+/", $this->uri)){
            $this->uri = substr($this->uri, 1);
        }
        return $this->uri;
    }

    /**
     * Returns POST data. If a specific field is provided, it returns
     * the value of that field; otherwise, it returns the entire POST data array.
     * Optionally, you can provide a default value if the field does not exist.
     * @param null $field
     * @param null $default
     * @return array|mixed|null
     */
    public function getPost($field=null, $default=null){
        if(is_null($field)) return $this->post;
        else return $this->post[$field]? $this->post[$field] : $default;
    }

    /**
     * Sets the URI of the request. It extracts query parameters from the URI
     * and updates the $uri and $queryParams properties accordingly.
     * @param $uri
     */
    public function setUri($uri){
        $exUri = explode('?', $uri);
        $uri = $exUri[0];
        $params = isset($exUri[1])? $exUri[1] : [];

        $this->uri = $uri;
        $this->setQueryParams($params);
    }

    /**
     * Sets query parameters.
     * @param $params
     */
    public function setQueryParams($params){
        if(is_string($params)){
            $params = explode('&', $params);
            foreach ($params as $param){
                $exParam = explode('=', $param);
                $key = $exParam[0];
                $value = $exParam[1] ? $exParam:  null;
                if(!empty($key)){
                    $this->queryParams[$key] = $value;
                }
            }
        }else {
            $this->queryParams = array_merge($this->queryParams, $params);
        }
    }

    /**
     *  Checks if the request method is POST and returns true if it is, false otherwise.
     * @return bool
     */
    public function isPost(){ return $this->getMethod() === 'POST'; }

    /**
     * Checks if the request method is GET and returns true if it is, false otherwise.
     * @return bool
     */
    public function isGet(){ return $this->getMethod() === 'GET'; }

}