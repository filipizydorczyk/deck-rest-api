# Boards endpoints

Collection of endpoints for labels.

**URL** : `/apps/deckrestapi/api/v1/labels`

**Method** : `GET`

**Auth required** : Basic auth (nextcloud user and password)

**Body** : No body

## Success Response

**Code** : `200 OK`

**Content example**

```json
[
    {
        "title": "Finished",
        "color": "31CC7C",
        "boardId": 1,
        "lastModified": 1644534480
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
