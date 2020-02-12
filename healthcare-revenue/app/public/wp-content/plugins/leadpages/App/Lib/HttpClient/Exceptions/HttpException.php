<?php

namespace LeadpagesWP\Lib\HttpClient\Exceptions;

class HttpException extends \RuntimeException
{
    public $response;

    public function __construct($response, Exception $previous = null)
    {
        if (is_wp_error($response)) {
            // get_error_code can return strings.
            $code = filter_var($response->get_error_code(), FILTER_VALIDATE_INT) || null;
            $message = $response->get_error_message();
            lpAddAdminToast($message, "error");
        } else {
            // wp_remote_retrieve_response_code can return empty strings.
            $code = wp_remote_retrieve_response_code($response) || null;
            $message = 'Request failed';
            lpAddAdminToast($message, "error");
        }
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
