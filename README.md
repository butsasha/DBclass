# MySQLi simple class

##Initialization:
```
DataBase::connect('localhost','Login','Password','dbname');
```

##DataBase::SINGLE:
```
DataBase::query('SELECT name FROM table WHERE id='.$id, DataBase::SINGLE);
```
Return value of first column of first row as text

##DataBase::ROW:
```
DataBase::query('SELECT * FROM table', DataBase::ROW);
```
Return first row as associative array

##DataBase::ALL:
```
DataBase::query('SELECT * FROM table', DataBase::ALL);
```
Return all rows as list of associative arrays

##DataBase::AFFECTED:
```
DataBase::query('SELECT * FROM table', DataBase::AFFECTED);
```
Return amount of rows affected by INSERT, UPDATE and DELETE queries

##DataBase::IDENTIFIER:
```
DataBase::query('INSERT INTO table (`row`) VALUES ("value")', DataBase::IDENTIFIER)
```
Return identifier of inserted row (AUTO_INCREMENT field)

## Authors

* AUTHOR **BUT OLEKSANDR** - (https://butalex.com)
* IDEA **Michal Dutkiewicz** - (http://emdek.pl)