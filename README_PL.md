# Omnipay: Tpay

[Omnipay](https://github.com/thephpleague/omnipay) to niezależna od żadnego frameworku wielo-bramkowa
biblioteka przetwarzania płatności dla PHP 5.3+. Ta Paczka implementuje obsługę [Tpay](https://tpay.com) dla Omnipay.
Wymaga ona PHP 5.6+.

[![Licencja](https://img.shields.io/github/license/tpay-com/omnipay-tpay.svg?label=licencja)](LICENSE)
[![CI status](https://github.com/tpay-com/omnipay-tpay/actions/workflows/ci.yaml/badge.svg?branch=master)](https://github.com/tpay-com/omnipay-tpay/actions)

[English version :gb: wersja angielska](./README.md)

## Instalacja

Tpay jest instalowany przez [Composer](http://getcomposer.org/)a. Aby go zainstalować, po prostu go dodaj
do swojego pliku `composer.json`:

```json
{
    "require": {
        "omnipay/tpay": "~1.0"
    }
}
```

I uruchom Composera, aby zaktualizować swoje zależności:
```console
    curl -s https://getcomposer.org/installer | php
    php composer.phar update
```

## Podstawowe użycie

Ogólne instrukcje użytkowania można znaleźć w głównym repozytorium [Omnipay](https://github.com/thephpleague/omnipay).

## Wsparcie

Jeśli masz ogólny problemy z Omnipay, sugerujemy opublikowanie go na
[Stack Overflow](http://stackoverflow.com/). Pamiętaj, aby dodać
[tag `omnipay`](http://stackoverflow.com/questions/tagged/omnipay), dzięki czemu będzie można go łatwo znaleźć.

Jeśli chcesz być na bieżąco z zapowiedziami wersji, przedyskutować pomysły dla projektu
lub zadać bardziej szczegółowe pytania, dostępna jest również [lista mailingowa](https://groups.google.com/forum/#!forum/omnipay), którą
możesz subskrybować.

Jeśli znalazłeś błąd, zgłoś go za pomocą [narzędzia do śledzenia problemów GitHuba](https://github.com/tpay-com/omnipay-tpay/issues),
lub utwórz [fork](https://docs.github.com/en/get-started/quickstart/fork-a-repo) biblioteki i utwórz pull request.
