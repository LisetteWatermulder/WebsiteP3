## When opening the website for the first time
**Error**:
```php
Warning: Undefined array key "currentPage" in C:\xampp\htdocs\website-components\head.php on line 52
```

**Solution**:
```php
$currentPage = $_GET['currentPage'] ?? 'home';
```

## importing the DDL
**Current**:
```sql
CONSTRAINT PK_OrderProduct PRIMARY KEY (`ProductName`, `ReferenceNumber`),
```

**Error**:
```sql
Warning: #1280 Name 'PK_OrderProduct' ignored for PRIMARY key.
```

**Solution**:
```sql
PRIMARY KEY (`ProductName`, `ReferenceNumber`),
```

## Notes
Formatting has been applied to several documents, ddl.sql and dml.sql have there errors corrected.