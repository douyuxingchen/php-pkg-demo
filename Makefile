.PHONY:install
install: ## Composer依赖安装
	docker run -it --rm -v "$(pwd)":/www jefferyjob/douyu-php composer install

.PHONY:tests
tests: ## 单元测试
	./vendor/bin/phpunit --colors

.PHONY:help
.DEFAULT_GOAL:=help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
