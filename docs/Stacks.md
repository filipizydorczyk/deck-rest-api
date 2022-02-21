# Boards endpoints

Collection of endpoints for stacks.

**URL** : `/apps/deckrestapi/api/v1/stacks`

**Method** : `GET`

**Auth required** : Basic auth (nextcloud user and password)

**Body** : No body

## Success Response

**Code** : `200 OK`

**Content example**

```json
[
    {
        "title": "To do",
        "boardId": 1,
        "deletedAt": 0,
        "lastModified": 1644534535,
        "cards": [
            {
                "title": "Example Task 3",
                "description": "",
                "descriptionPrev": null,
                "stackId": 1,
                "type": "text",
                "lastModified": 1644534535,
                "createdAt": 1644534480,
                "labels": [],
                "order": 0,
                "archived": false,
                "duedate": null,
                "deletedAt": 0
            }
        ],
        "order": 1
    },
    ...
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
