# Boards endpoints

Collection of endpoints for boards.

**URL** : `/apps/deckrestapi/api/v1/cards`

**Method** : `GET`

**Auth required** : Basic auth (nextcloud user and password)

**Body** : No body

## Success Response

**Code** : `200 OK`

**Content example**

```json
[
    {
        "title": "Example Task 3",
        "description": "",
        "descriptionPrev": null,
        "stackId": 1,
        "type": "text",
        "lastModified": 1644534535,
        "createdAt": 1644534480,
        "labels": [
            {
                "title": "Finished",
                "color": "31CC7C",
                "boardId": 1,
                "lastModified": 1644534480
            }
        ],
        "order": 0,
        "archived": false,
        "duedate": null,
        "deletedAt": 0
    }
]
```

## Error Response

**Condition** : If 'username' and 'password' combination is wrong.

**Code** : `400 BAD REQUEST`

**Content** :

```json
{
    "message": "Current user is not logged in"
}
```

---

**Condition** : If 'deck' app is not installed.

**Code** : `424 STATUS FAILED DEPENDENCY`

**Content** :

```json
{
    "message": "Deck app is required to be installed for this API to work"
}
```
