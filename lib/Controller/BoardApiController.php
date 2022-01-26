<?php

namespace OCA\DeckREST\Controller;

use OCA\DeckREST\Db\BoardMapper;
use OCP\App\IAppManager;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class BoardApiController extends ApiController
{
    private IAppManager $appManager;
    private BoardMapper $boardMapper;

    public function __construct($appName, IRequest $request, IAppManager $appManager, BoardMapper $boardMapper)
    {
        parent::__construct($appName, $request);
        $this->appManager = $appManager;
        $this->boardMapper = $boardMapper;
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
        return new DataResponse($this->boardMapper->findAll()->jsonSerialize(), HTTP::STATUS_OK);
    }
};
