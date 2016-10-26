# Dentistware

Dentistware is a software for managing several issues common in a dentistry, which includes control for current appointments, centralization of the data as we can retrieve it from a database reliabily and controle all the roles in this specific business.

Due to the arrangments of certain appointments, we're also able to distribute the time of each member of the dentistry, this leads to a general improvement of all possible services in a dentristry.

## Status

In development.

## Installation

Install XAMPP [here](https://www.apachefriends.org/es/download.html) and configure it in port 9090 for Apache module see [here](http://stackoverflow.com/questions/11294812/how-to-change-xampp-apache-server-port) how. 

Git clone the repositor and enter to the generated folder.

```sh
$ cd "xamppPath"/htdocs
$ git clone git://github.com/JulianSalomon/Dentistware.git  
$ cd Dentistware
```

Checkout to development.

```sh
$ git checkout development
```
In XAMPP execute Start for Apache and MySQL modules.

Enter to [phpMyAdmin](http://localhost:9090/phpmyadmin) and make a new database, name it as "dentistware_db". Get in to [import tab](http://localhost:9090/phpmyadmin/db_import.php?db=dentistware_db) and select the file inside "xamppPath"/htdocs/Dentistware/DentistwareD/ that name is "dentistware_db.sql", import.

Access to [Dentistware](http://localhost:9090/Dentistware/DentistwareD/).

## Developers

* Alex Jose Alberto Barreto Cajicá
* Cristian David González Carrillo
* Nicolás Restrepo Torres
* Julián Esteban Salomón Torres