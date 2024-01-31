# Simple Link Shortener

This is my own approach to create link shortener website, it will be avaliable on my [website](https://sebaprojects.online/tinyURL).

## Setup

Download and export this respository to your www root server directory. Then open `tinyURL/library.php` and then change `$configFilePath = 'yourPath';` to your path to `config.ini`.

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

and then inport `url_library.sql`.

You should be able to use website now under `http://yourdomain.com/tinyURL/`.
