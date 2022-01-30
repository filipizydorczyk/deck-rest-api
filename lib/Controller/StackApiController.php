<?php

namespace OCA\DeckREST\Controller;

use OCA\DeckREST\Service\StackService;
use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class StackApiController extends ApiController
{
    private IAppManager $appManager;
    private StackService $stackService;

    public function __construct($appName, IRequest $request, IAppManager $appManager, StackService $stackService)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
        $this->stackService = $stackService;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index()
    {
        // @CORS
        if (!$this->appManager->isEnabledForUser("deck")) {
            return new DataResponse(['message' => "Deck app is required to be installed for this API to work"], HTTP::STATUS_FAILED_DEPENDENCY);
        }
        return new DataResponse($this->stackService->findAll(), HTTP::STATUS_OK);
    }
};
