# DinamicArray
Criação de Array Dinâmicos em PHP

**set_sub**

Setar uma array dinâmico com mútiplos Índices

Sintaxe:

set_sub(&var, 'index', 'value');

Exemplo:
```php
$var = array();
set_sub($var, 'personal name', 'João');
set_sub($var, 'personal lastname', 'da Silva');
set_sub($var, 'personal gender', 'Masculino');
set_sub($var, 'personal birthdate', '03-07-1989');
set_sub($var, 'personal age', 30);
print_r($var);
```

**get_var**

Obter uma valor dinâmico com múltiplos Índices

Sintaxe:

get_sub(var, 'index', 'default value');

Exemplo:
```php
$var = array();
set_sub($var, 'personal name', 'João');
set_sub($var, 'personal lastname', 'da Silva');
set_sub($var, 'personal gender', 'Masculino');
set_sub($var, 'personal birthdate', '03-07-1989');
set_sub($var, 'personal age', 30);

$all = get_sub($var, 'personal', '');
$name = get_sub($var, 'personal name', '');
$lastname = get_sub($var, 'personal lastname', '');
$gender = get_sub($var, 'personal gender', '');
$birthdate = get_sub($var, 'personal birthdate', '');
$age = get_sub($var, 'personal age', '');

print_r($all);

echo sprintf("Value: %s, %s, %s, %s, %s", $name, $lastname, $gender, $birthdate, $age);
```
