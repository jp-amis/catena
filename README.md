# Catena (Laravel 5 Package)

Catena was created so it was possible to create some sort of flow based programming in **Laravel 5**.

## Contents

- [Installation](#installation)

## Installation

    The instruction below about the composer.json will only work when we reach 1.0 and this code is in the master branch and submited to packgist.
    Until the code is not stable you can add this repository in your composer.json and add the package with "dev-develop" instead of "*"

In order to install Laravel 5 Catena, just add 

    "amis/catena": "*"

to your composer.json. Then run `composer install` or `composer update`.

Then in your `config/app.php` add 

    'Amis\Catena\CatenaServiceProvider'
    
in the `providers` array and

    'Catena' => 'Amis\Catena\CatenaFacade'
    
to the `aliases` array.
