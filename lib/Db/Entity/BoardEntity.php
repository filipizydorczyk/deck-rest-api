<?php

namespace OCA\DeckREST\Db\Entity;

use OCP\AppFramework\Db\Entity;
use OCP\IUser;

class BoardEntity extends Entity implements \JsonSerializable
{
    protected $title;
    protected $owner;
    protected $color;
    protected bool $archived = FALSE;
    /** @var Label[]|null */
    protected $labels = [];
    /** @var Acl[]|null */
    protected $acl = [];
    protected $permissions = [];
    protected $users = [];
    protected $shared = 0;
    protected $stacks = [];
    protected $deletedAt = 0;
    protected $lastModified = 0;

    // public function __construct(IUser $user)
    // {
    //     $this->owner = $user;
    //     $this->getter('owner');
    // }

    protected $settings = [];

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'owner' =>  $this->owner,
            // [
            //     'uid' => $this->owner->getUID(),
            //     'displayname' => $this->owner->getDisplayName(),
            //     'type' => 0
            // ],
            'color' => $this->color,
            'archived' => $this->archived,
            'labels' => $this->labels,
            'permissions' => $this->permissions,
            'users' => $this->users,
            'shared' => $this->shared,
            'stacks' => $this->stacks,
            'deletedAt' => $this->deletedAt,
            'lastModified' => $this->lastModified,
        ];
    }
};
