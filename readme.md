# Device Security Checker

Device Security Checker adalah library php untuk pengecekan berdasarkan physical device ID(ex: Mac Address), ID Akun Aplikasi(ex: Username) atau kombinasi antar physical dan akun apakah perangkat sudah terdaftar dan diperbolehkan untuk mengakses aplikasi lebih lanjut.

# Features!

  - Cek ID Perangkat, ID Akun, Akun dan Perangkat.
  - Support Beberapa vendor Database(menggunakan Doctrine ORM) : 
        - SQL Server (tested)
        - MySql (Untested)
        - Etc (Untested)


You can also (next):
  - Import Data from Excel( dengan pola template terstandard)
  - Export data to Excel
  - Session management : 
        - get expired token
        - auto update expired token

### Tech

Device Security Checker uses a number of open source projects to work properly:

* [doctrine/orm] - The Doctrine Project is the home to several PHP libraries primarily focused on database storage and object mapping.
* [symfony/validator] - The Symfony validator is a powerful tool that can be leveraged to guarantee that the data of any object is "valid".
* [doctrine/annotations] - Docblock Annotations Parser library (extracted from Doctrine Common).

### Installation

Device Security Checker requires [PHP](https://php.net/) 5.6.+ to run.
Composer Installed.

Install the dependencies and devDependencies and start the server.

```sh
$ cd yourproject
$ composer require onnysan/device-security 
```

### Todos

 - Session Management
 - Export Import

License
----

MIT
