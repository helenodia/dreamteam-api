# dreamteam-api
Laravel API for dreamteam (random team generator app)

This was the solo project set in our final week on the [DevelopMe_ coding fellowship](https://developme.training/fellowship/).

<!-- http://localhost:3000/ -->

<!-- ec2-35-178-26-8.eu-west-2.compute.amazonaws.com/api/ -->

<!-- The live app can be viewed [here](). -->

The front end repo can be viewed [here](https://github.com/helenodia/dreamteam-client).

## Backend Setup
### Prerequisites

Make sure you have the following installed:

* [Composer](https://getcomposer.org/) - run:

```composer install```

* [Laravel](https://laravel.com/docs/5.8/installation) - run:

```composer global require laravel/installer```

* Homestead - run:

```composer require laravel/homestead --dev``` to install

```php vendor/bin/homestead make``` to generate the Vagrantfile and Homestead.yaml file in your project root

* A virtualizer software package such as [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

### Running

Clone the git repository and run vagrant up to launch the Vagrant box:

```git clone git@github.com:helenodia/dreamteam-api.git```

```vagrant up```
