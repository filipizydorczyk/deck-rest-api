<?php

namespace OCA\DeckREST\Db\Mapper;

use OCA\DeckREST\Db\Entity\StackEntity;
use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class StackMapper extends QBMapper
{
    public static $BOARD_TABLE = 'deck_stacks';

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, StackMapper::$BOARD_TABLE, StackEntity::class);
    }

    public function findAll(): array
    {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')
            ->from(StackMapper::$BOARD_TABLE)
            ->orderBy('id');
        return $this->findEntities($qb);
    }
};
