APP_PATH=./nextcloud/apps/deckrestapi

test:
	rm -rf $(APP_PATH)
	cp -r ./appinfo $(APP_PATH)
	cp -r ./lib $(APP_PATH)
	cp -r ./appinfo $(APP_PATH)

clean:
	rm -rf $(APP_PATH)