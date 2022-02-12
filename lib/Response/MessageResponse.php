<?php

namespace OCA\DeckREST\Response;

use OCP\AppFramework\Http\DataResponse;

class MessageResponse extends DataResponse
{

    /**
     * @param string $message message to return in http response
     * @param OCP\AppFramework\Http $code code of the response
     */
    public function __construct(string $message, int $code)
    {
        parent::__construct(['message' => $message], $code);
    }
}
