<?php

namespace OCA\DeckREST\Controller;

use \OCP\AppFramework\ApiController;
use \OCP\IRequest;

class BoardApiController extends ApiController
{

    public function __construct($appName, IRequest $request)
    {
        parent::__construct($appName, $request);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index()
    {
        // @CORS
        return "Hello World";
    }
}
