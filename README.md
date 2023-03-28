# Object Oriented PHP, PDO and MySQL - Scandiweb Code for implementing a CRUD with object-oriented PHP and MySQL.

## Database
Create a database and execute the SQL instructions above to create the table `products`:

```sql
  CREATE TABLE `products`(
  	`id` int(30) NOT NULL,
  	`sku` varchar(255) NOT NULL,
  	`name` varchar(255) NOT NULL,
  	`price` float NOT NULL,
  	`measure` varchar(255) NOT NULL,
  	PRIMARY KEY (`id`) USING BTREE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

## table struct `product_specific`

```sql
CREATE TABLE `product_specific` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
## Extracting data from the table `product_specific`

```sql
INSERT INTO `product_specific` (`id`, `name`) VALUES
(1, 'DVD'),
(2, 'Book'),
(3, 'Furniture');
```

## Settings
The database credentials are in the `./app/Db/Database.php` file and you must change it to your environment settings (HOST, NAME, USER and PASS).

## Composer
For the application to work, it is necessary to run Composer so that the files responsible for autoloading the classes are created.

To run composer, just access the project folder and run the command below in your terminal:
```shell
 composer install
```
After this execution, a folder with the name `vendor` will be created in the root of the project and you will be able to access it through your browser.