This plugin is providing REST API for another nextcloud plugin called [deck](https://github.com/nextcloud/deck). The original REST API provides some endpoint but you cannot for example backup all boards with single requests and this is example of functionality that this API is going to provide. More in readme when development will start.

# 📲 Testing app

For development u are going to need `composer` and `docker` installed. To test app run docker compose `docker-compose up -d` in porject root directory to set up test nextcloud instance. App should be available under `http://localhost:4325/`, Once u are done with coding u can use copmoser scripts to send changes to this instacne for testing.

-   `composer clean` - will delete previous app build from test instance
-   `composer build` - will delete previous build and push new one
-   `composer test` - will run unit tests (need to run `composer update` first to have unit tests dependencies)

Watch that you have to have [deck](https://github.com/nextcloud/deck) app installed and enabled in order to get this api working. Otherwise any request will return **424 Failed Dependency** error.

To tests endpoints with postman you can download [postman collection file](./docs/deck-rest-api.postman_collection.json)

# Code conduct

1. Define types whenever possible

```php
private IAppManager $appManager;
```

2. Define imports wihout `\` prefix

```php
use OCP\App\IAppManager; # Correct
use \OCP\IRequest; # Incorect
```

# 👩🏾‍🔧 Trouble shooting

If you are using NTFS harddrive you can ran into `Your data directory is readable by other users. Please change the permissions to 0770 so that the directory cannot be listed by other users.` error. In that case edit nextcloud config file (`./nextcloud/config/config.php`) and add this line

```php
'check_data_directory_permissions' => false,
```
