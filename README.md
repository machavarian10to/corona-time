
<div style="display:flex; align-items: center">
  <h1 style="position:relative; top: -6px">Coronatime</h1>
</div>

---
Coronatime - is a platform where user can register, go through authorization (as well as restore the password if he has forgotten it) and see
covid19 situation in the world.


### Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Resources](#resources)


### Prerequisites

* PHP @8.1
* MYSQL @8 and up
* npm @6 and up
* composer @2 and up



### Tech Stack

*  [Laravel](https://laravel.com/docs/9.x) - back-end framework
*  [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
*  [Tailwind UI](https://tailwindcss.com/docs/installation) - CSS framework for rapidly building custom UI components.
*  [Covid API](https://devtest.ge/api) - countries statistic


### Getting Started
1. First of all you need to clone Coronatime repository from github:
```sh
git clone https://github.com/RedberryInternship/otar-machavariani-corona-time.git
```

2. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

and also:
```sh
npm run dev
```
in order to build your Tailwind resources.

4. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:


**MYSQL:**
>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****


after setting up **.env** file, execute:
```sh
php artisan config:cache
```
in order to cache environment variables.



4. Now execute in the root of you project following:
```sh
  php artisan key:generate
```
Which generates auth key.

##### Now, you should be good to go!


#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```


#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

when working on JS you may run:

```sh
  npm run dev
```
it builds your js files into executable scripts.
If you want to watch files during development, execute instead:



### Resources
* Database diagram in [Drawsql](https://drawsql.app/teams/otar-matchavarianis-team/diagrams/coronatime)

![Drawsql Diagram](https://res.cloudinary.com/dt5wsfrex/image/upload/v1663595948/coronatime_diagram.png)
