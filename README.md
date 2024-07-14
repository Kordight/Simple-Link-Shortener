# Simple Link Shortener

This is my own approach to create link shortener website, it will be avaliable on my [website](https://kordight.dev/tinyURL).

## Features

* Random short URL generation
* Uses SQL database
* Uses Rewrite engine
* Built for Apache server
* Easy to set up

### To do

* Stats
* Link removal on demand

## Setup

Download and import this repository. Then open `tinyURL/library.php` and change `$configFilePath = 'yourPath';` to your path to `config.ini`.

`config.ini` example

``` ini

[database]
servername = localhost
username = root
password = 
dbname = url_library

```

Next you have to create new data base you can do that with that command:

```sql
CREATE DATABASE url_library
```

and then import `url_library.sql`.

You should be able to use the website now `http://yourdomain.com/tinyURL/`.
