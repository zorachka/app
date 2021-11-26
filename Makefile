serve:
	php -S localhost:8080 -t public/

test:
	./vendor/bin/pest --colors=always

test.ci:
	./vendor/bin/pest --colors=always --ci

console:
	php bin/app.php --ansi $(command)
