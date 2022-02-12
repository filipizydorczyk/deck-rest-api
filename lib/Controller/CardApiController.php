<?php

namespace OCA\DeckREST\Controller;

use OCA\DeckREST\Response\JsonArrayResponse;
use OCA\DeckREST\Service\CardService;
use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class CardApiController extends ApiController
{
    private IAppManager $appManager;
    private CardService $cardService;

    public function __construct($appName, IRequest $request, IAppManager $appManager, CardService $cardService)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
        $this->cardService = $cardService;
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
        return new JsonArrayResponse($this->cardService->findAll(), HTTP::STATUS_OK);
    }
};
