# The Panel

**In heavy development at the moment, do not use. I'm creating a Package of the functionality found in this repo: [The Panel](https://github.com/reinier/ThePanel).**

See The Panel in action on [Burrrst](http://burrrst.nl) (mostly dutch).

[The Panel](http://thepanel.io) is a [Laravel](http://laravel.com) package that allows you to curate links with a group of people with Laravel. The links only appear in public when a certain amount of votes are being given to a link. 

Visit [The Panel Trello Board](https://trello.com/b/BdRVX1XM/the-panel) for todos and issues.

## Setup (WIP)

(When this package is still in the workbench other actions are required: see [Laravel Docs Packages](http://laravel.com/docs/packages))

```
php artisan config:publish hidiyo/thepanel
php artisan asset:publish hidiyo/thepanel
```

**!important** After publishing the config and assets edit the following config to setup the first user: `app\config\packages\hidiyo\thepanel\setup.php`

Then you can run the database migration and seed:

```
php artisan migrate --package="hidiyo/thepanel"
php artisan db:seed --class="Hidiyo\Thepanel\Seeds\DatabaseSeeder"
```

## Known issues

- I'm learning a lot from [laravel-bootstrap](https://github.com/davzie/Laravel-Bootstrap), I hope I don't violate the [DBAD public license](https://github.com/davzie/laravel-bootstrap/blob/master/license.md).
- I'm ([@reinier](https://twitter.com/reinier)) pretty new to this open source stuff, so one of the main reasons to open source this is to get experience with it. 

For more issues and todos, visit [The Panel Trello Board](https://trello.com/b/BdRVX1XM/the-panel)