# ToyDB #

ToyDB is a PHP based DataBase.Please Do not Use for Production Environment. I have Created this App for FUN.

## Basic Usage

```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
```

## Insert Data In To DataBase Table

```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
//Data Array
$product=array(
    "name"=>"Product One ",
    "price"=>3.75
);
//Insert Data to my_products table , no need to create table
$db->save('my_products',$product);
```

## Select All Records From a Database Table


```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
$rows=$db->select->all('my_products');
echo '<pre>';
print_r($rows);
echo'</pre>';
```

## Select All Records From a Database Table By IDS


```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
$my_product_ids=array(122,182,162,192,125,1255,3569);
$rows=$db->select->byId('users2','id,fname,email',$my_product_ids);
echo '<pre>';
print_r($rows);
echo'</pre>';
```

## How to Use where Condition


```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
//Select user whose username='biswarup' and Password='mypass'
$db->select->where("`username`=='biswarup' && `password`=='mypass'");
$rows=$db->select->all('users2','id,fname,email');
echo '<pre>';
print_r($rows);
echo'</pre>';
//Clear Previous used Filters
$db->select->clear();
//Select Users whose id greate than 15
$db->select->where("`id`>15");
$rows=$db->select->all('users2','id,fname,email');
echo '<pre>';
print_r($rows);
echo'</pre>';
//Clear Previous used Filters
$db->select->clear();
//Select Users whose id greate than 15 and status equal to 2 or 1
$db->select->where("`id`>15 && (`status`==2 || `status`==1)");
$rows=$db->select->all('users2','id,fname,email');
echo '<pre>';
print_r($rows);
echo'</pre>';
```

## Select Record Using Limit and Offset

```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
//Starting position
$db->select->start=6;
//How many record you want
$db->select->limit=10;
$rows=$db->select->all('my_products');
echo '<pre>';
print_r($rows);
echo'</pre>';
```

## Sort Record Using OrderBy And Order Direction


```php
<?php
// require the ToyDB autoloader
require_once '/path/to/autoload.php'; 
use BiswarupAdhikari\ToyDB\DataBase;
//Create a ToyDB Instance 
$db=new DataBase("root",123456);
//Select DataBase if not exist it will create automatically
$db->selectDB("mydb");
//Order By ASC or DESC
$db->select->orderBy="id DESC";
//Starting position
$db->select->start=6;
//How many record you want
$db->select->limit=10;
$rows=$db->select->all('my_products');
echo '<pre>';
print_r($rows);
echo'</pre>';
```

## License

ToyDB is released under the MIT Licence. See the bundled LICENSE file for details.
