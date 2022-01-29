<?php

namespace OCA\DeckREST\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class LabelMapper extends QBMapper
{
    public static $BOARD_TABLE = 'deck_labels';

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, LabelMapper::$BOARD_TABLE, LabelEntity::class);
    }

    public function findAll(): array
    {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')
            ->from(LabelMapper::$BOARD_TABLE)
            ->orderBy('id');
        return $this->findEntities($qb);
    }
};
