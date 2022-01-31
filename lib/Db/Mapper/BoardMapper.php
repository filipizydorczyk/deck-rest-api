<?php

namespace OCA\DeckREST\Db\Mapper;

use OCA\DeckREST\Db\Entity\BoardEntity;
use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class BoardMapper extends QBMapper
{
    public static $BOARD_TABLE = 'deck_boards';

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, BoardMapper::$BOARD_TABLE, BoardEntity::class);
    }

    public function findAll(): array
    {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')
            ->from(BoardMapper::$BOARD_TABLE)
            ->orderBy('id');
        return $this->findEntities($qb);
    }
};
