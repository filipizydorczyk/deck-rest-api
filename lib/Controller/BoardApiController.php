<?php

namespace OCA\DeckREST\Controller;

use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class BoardApiController extends ApiController
{
    private IAppManager $appManager;

    public function __construct($appName, IRequest $request, IAppManager $appManager)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index()
    {
        // @CORS
        if (!$this->appManager->isEnabledForUser("deck")) {
            return new DataResponse("Deck app is required to be installed for this API to work", HTTP::STATUS_FAILED_DEPENDENCY);
        }
        return new DataResponse("Hello World", HTTP::STATUS_OK);
    }
}
