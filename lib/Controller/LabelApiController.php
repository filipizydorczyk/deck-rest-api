<?php

namespace OCA\DeckREST\Controller;

use OCA\DeckREST\Service\LabelService;
use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class LabelApiController extends ApiController
{
    private IAppManager $appManager;
    private LabelService $labelService;

    public function __construct($appName, IRequest $request, IAppManager $appManager, LabelService $labelService)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
        $this->labelService = $labelService;
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
        return new DataResponse($this->labelService->findAll(), HTTP::STATUS_OK);
    }
};
