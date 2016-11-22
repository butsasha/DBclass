# DBclass

##Initialization:
```
PanelDatabase::connect('localhost','Login','Password','table');
```

##PanelDatabase::SINGLE:
```
PanelDatabase::query('SELECT name FROM table WHERE id='.$id, PanelDatabase::SINGLE);
```
Return value of first column of first row as text

##PanelDatabase::ROW:
```
PanelDatabase::query('SELECT * FROM table', PanelDatabase::ROW);
```
Return first row as associative array

##PanelDatabase::ALL:
```
PanelDatabase::query('SELECT * FROM table', PanelDatabase::ALL);
```
Return all rows as list of associative arrays

##PanelDatabase::AFFECTED:
```
PanelDatabase::query('SELECT * FROM table', PanelDatabase::AFFECTED);
```
Return amount of rows affected by INSERT, UPDATE and DELETE queries

##PanelDatabase::IDENTIFIER:
```
PanelDatabase::query('INSERT INTO table (`row`) VALUES ("value")', PanelDatabase::IDENTIFIER)
```
Return identifier of inserted row (AUTO_INCREMENT field)

## Authors

* AUTHOR **BUT OLEKSANDR** - (https://butalex.com)
* IDEA **Michal Dutkiewicz** - (http://emdek.pl)