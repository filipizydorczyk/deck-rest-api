<?php

namespace OCA\DeckREST\Controller;

use OCA\DeckREST\Response\JsonArrayResponse;
use OCA\DeckREST\Service\BoardService;
use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class BoardApiController extends ApiController
{
    private IAppManager $appManager;
    private BoardService $boardService;

    public function __construct($appName, IRequest $request, IAppManager $appManager, BoardService $boardService)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
        $this->boardService = $boardService;
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

        return new JsonArrayResponse($this->boardService->findAll(), HTTP::STATUS_OK);
    }
};
