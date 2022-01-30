<?php

namespace OCA\DeckREST\Db;

use OCP\AppFramework\Db\Entity;

class CardEntity extends Entity implements \JsonSerializable
{

    protected $title;
    protected $description;
    protected $descriptionPrev;
    protected $stackId;
    protected $type;
    protected $lastModified;
    protected $lastEditor;
    protected $createdAt;
    protected $labels;
    protected $assignedUsers;
    protected $attachments;
    protected $attachmentCount;
    protected $owner;
    protected $order;
    protected $archived = false;
    protected $duedate;
    protected $notified = false;
    protected $deletedAt = 0;
    protected $commentsUnread = 0;
    protected $commentsCount = 0;

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'descriptionPrev' => $this->descriptionPrev,
            'stackId' => $this->stackId,
            'type' => $this->type,
            'lastModified' => $this->lastModified,
            'lastEditor' => $this->lastEditor,
            'createdAt' => $this->createdAt,
            'labels' => $this->labels,
            'assignedUsers' => $this->assignedUsers,
            'attachments' => $this->attachments,
            'attachmentCount' => $this->attachmentCount,
            'owner' => $this->owner,
            'order' => $this->order,
            'archived' => $this->archived,
            'duedate' => $this->duedate,
            'notified' => $this->notified,
            'deletedAt' => $this->deletedAt,
            'commentsUnread' => $this->commentsUnread,
            'commentsCount' => $this->commentsCount,
        ];
    }
}
