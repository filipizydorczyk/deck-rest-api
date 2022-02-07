# Boards endpoints

Collection of endpoints for boards.

**URL** : `/apps/deckrestapi/api/v1/boards`

**Method** : `GET`

**Auth required** : Basic auth (nextcloud user and password)

**Body** : No body

## Success Response

**Code** : `200 OK`

**Content example**

```json
[
    {
        "title": "Personal",
        "color": "0087C5",
        "archived": false,
        "labels": [],
        "stacks": [],
        "deletedAt": "0",
        "lastModified": "1644266184"
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
