# Lara Todo

Lara todo is a simple todo application that allows you to add todos, edit todos, delete todos and also mark todo as completed.

In v2.0 there has some new features. Such as a sorting system between completed and non completed todos and User can able to add notes on each todo. 

> Lara Todo is built using Laravel 5.2.* and Bootstrap 3.3.6

### Version
master

### Live Demo
http://url.ohidul.com/cXzWb8f

### Installation

Clone this repository first-
```sh
$ git clone https://github.com/ohid/lara-todo.git
```

Now cd into lara-todo-
```sh
$ cd lara-todo
```

Install composer-
```sh
$ install composer
```

Duplicate `.env.example` file to `.env` file to create a environment file-
```sh
$ cp .env.example .env
```

Edit `.env` file with with your database credential

Now create database tables by running this command-
```
php artisan migrate
```

Generate a application key
```
php artisan key:generate
```

## Run on server
```
php artisan serve
```


Now you are all setup to go. Thanks

## Have any  question?
ask me at ohidul.islam951@gmail.com


# Screenshots

Todo listing page with todo sorting 
![Todo listing page with todo sorting ](https://72e9e1110dca2d23e264c428db25b60873639337.googledrive.com/host/0B6SVI7iK7bjjdlRHV1pPenI5ZHc)
![Todo listing page with todo sorting ](https://71fcd73f21c0a98d2ae4b75f80d7b5500b600f3e.googledrive.com/host/0B6SVI7iK7bjjeWxNZU9sR2JDYzQ)

Create a new todo
![Create a new todo](https://09de996736e7126b0872c4a468344180be4ab89b.googledrive.com/host/0B6SVI7iK7bjjU0xabTZGSDhOOGs)

Create note on todo
![Create a new todo](https://79cce12ea7e45b831275b225e4536ede8757fa3d.googledrive.com/host/0B6SVI7iK7bjjY0lWY0lRR0o0Slk)

Editing todo
![Editing todo](https://6d3770be80cc47354cd32e64eedcf0dd3de7318f.googledrive.com/host/0B6SVI7iK7bjjT0wwcTZLbzhMdVk)

Viewing a todo
![Viewing a todo](https://0bf17f592b75cbd9e998637e40b62f1ff721bb72.googledrive.com/host/0B6SVI7iK7bjjcFd2TVVvSHZldVk)

Deleting a todo
![Deleting a todo](https://5d1db76b31435268460ddc67094adf9ee1c9551e.googledrive.com/host/0B6SVI7iK7bjjb0c4Nm5qSC13WTQ)

Todo deleting flash message
![Todo deleting flash message](https://0b015cd356b71362575b1715256a351410337c92.googledrive.com/host/0B6SVI7iK7bjjQWJPTk54aFhYY28)

