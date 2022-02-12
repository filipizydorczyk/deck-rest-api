<?php

namespace OCA\DeckREST\Response;

use OCP\AppFramework\Http\DataResponse;

class JsonArrayResponse extends DataResponse
{

    public function __construct(array $list)
    {
        parent::__construct($this->convertToJson($list));
    }

    private function convertToJson(array $list): array
    {
        $result = array();
        foreach ($list as $entity) {
            array_push($result, $entity->jsonSerialize());
        }

        return $result;
    }
}
