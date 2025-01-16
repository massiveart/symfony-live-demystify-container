.PHONY : help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: start
start: ## Start the docker environment
	docker compose up -d

.PHONY: stop
stop: ## Stop the docker environment
	docker compose stop

.PHONY: cli
cli: ## Enter PHP container
	docker compose exec dev bash