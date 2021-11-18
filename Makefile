serve:
	php -S localhost:8080 -t public/

test:
	./vendor/bin/pest

console:
	php bin/app.php --ansi $(command)
