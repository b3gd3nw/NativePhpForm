<?php

namespace app\core;

class Request {

    /**
     * Get the request uri.
     * @return string
     */
    public static function uri()
    {
      return trim(
          parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
      );
    }

    /**
     * Get the request method.
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}