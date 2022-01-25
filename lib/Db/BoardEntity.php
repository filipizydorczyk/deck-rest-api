<?php

namespace OCA\DeckREST\Db;

use OCP\AppFramework\Db\Entity;

class BoardEntity extends Entity implements \JsonSerializable
{
    protected $title;
    protected $owner;
    protected $color;
    protected $archived = false;
    /** @var Label[]|null */
    protected $labels = null;
    /** @var Acl[]|null */
    protected $acl = null;
    protected $permissions = [];
    protected $users = [];
    protected $shared;
    protected $stacks = [];
    protected $deletedAt = 0;
    protected $lastModified = 0;

    protected $settings = [];

    public function jsonSerialize()
    {
        return $this->title;
    }
};
