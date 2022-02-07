<?php

namespace OCA\DeckREST\Response;

use OCP\AppFramework\Http\DataResponse;

class BoardResponse extends DataResponse
{

    public function __construct(array $boardsList)
    {
        parent::__construct($this->convertToJson($boardsList));
    }

    private function convertToJson(array $boardsList): array
    {
        $result = array();
        foreach ($boardsList as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
}
