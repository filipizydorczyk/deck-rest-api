<?php

namespace OCA\DeckREST\Db\Mapper;

use OCA\DeckREST\Db\Entity\CardEntity;
use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class CardMapper extends QBMapper
{
    public static $BOARD_TABLE = 'deck_cards';

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, CardMapper::$BOARD_TABLE, CardEntity::class);
    }

    public function findAll(): array
    {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')
            ->from(CardMapper::$BOARD_TABLE)
            ->orderBy('id');
        return $this->findEntities($qb);
    }
};
