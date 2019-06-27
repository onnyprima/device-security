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
$ composer dump-autoload -o
```

### Basic Usage

use `Security\Lib\Services\Security` untuk menginisialisasi class `Security` didalam class ada beberapa fungsi untuk mengecek ID Perangkat dan ID akun.
- Cek perangkat
```php
<?php
use Security\Lib\Services\Security;
class MyClass
{
    protected $sc;
    public function __construct()
    {
        $this->sc =  new Security();
    }
    public function MyFunction()
    {
        /* Contoh penerapan : 
         * apakah perangkat diijinkan masuk
         * jika data tersedia di db maka akan allow(return true)
         * jika error akan return error message(array dengan key error)
         */
        $result = $this->sc->isPerangkatAllowed("00:A0:C9:14:C8:29");
        if(isset($result['error'])){
            echo json_encode($result);
            exit();
        }
    }
```
- Cek Akun
```php
<?php
use Security\Lib\Services\Security;
class MyClass
{
    protected $sc;
    public function __construct()
    {
        $this->sc =  new Security();
    }
    public function MyFunction()
    {
        /* Contoh penerapan : 
         * apakah perangkat diijinkan masuk
         * jika data tersedia di db maka akan allow(return true)
         * jika error akan return error message(array dengan key error)
         */
        $result = $this->sc->isAkunAllowed("myakunname");
        if(isset($result['error'])){
            echo json_encode($result);
            exit();
        }
    }
```
- Cek Akun dan Perangkat
```php
<?php
use Security\Lib\Services\Security;
class MyClass
{
    protected $sc;
    public function __construct()
    {
        $this->sc =  new Security();
    }
    public function MyFunction()
    {
        /* Contoh penerapan : 
         * apakah perangkat diijinkan masuk
         * jika data tersedia di db maka akan allow(return true)
         * jika error akan return error message(array dengan key error)
         */
        $result = $this->sc->isAkunDanPerangkatAllowed("idAkun", "idPerangkat");
        if(isset($result['error'])){
            echo json_encode($result);
            exit();
        }
    }
```
- Tambah Perangkat
```php
<?php
use Security\Lib\Services\SecurityCreator;
class Example extends CI_Controller
{
    protected $sc;
    public function __construct()
    {
        parent::__construct();
        $this->sc = new SecurityCreator();
    }
    public function tambahPerangkat()
    {
        $data = [];
        $result =  $this->sc->addPerangkat($data);
        if(isset($result['error'])){
            echo '<pre>';
            print_r($result);
            return;
        }
    }
}
```
- Remove Perangkat
```php
<?php

use Security\Lib\Services\SecurityCreator;
use Security\Lib\Services\SecurityRemover;

class Example extends CI_Controller
{

    protected $sc;

    public function __construct()
    {
        parent::__construct();
        $this->sc = new SecurityCreator();
    }

    public function removePerangkat()
    {
        $scr = new SecurityRemover();
        $id = "bot";
        $result = $scr->removePerangkat($id);
        if (isset($result['error'])) {
            echo '<pre>';
            print_r($result);
            return;
        }
    }
```

- Untuk selebihnya silahkan cek method di class folder `vendor\onnysan\device-security\src\Lib\Services`
        - SecurityReader.php
        - SecurityUpdater.php
        - SecurityRemover.php

### Todos

 - Session Management
 - Export Import

License
----

MIT
