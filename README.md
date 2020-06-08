# Laravel Advanced Model

An advanced model for Laravel. Has out-of-the-box support for SnakeCase (Laravel's default), as well as for CamelCase field names, and enhanced primary key support - human friendly date based unique IDs, and UUIDs.

## Background ##

1. Snake case (snake_case) advanced model. This is the default Laravel's model. This model uses the foillowing fields:

```
id - Identity field
created_at - When was the record created
updated_at - When was the record last modified
deleted_at - When was the record deleted (soft delete)
```

2. Camel case (CamelCase). Camel case is more readable and a bit shorter than snake case (more at https://en.wikipedia.org/wiki/Camel_case). This model changes the default Laravel names to:

```
Id - Identity field
CreatedAt - When was the record created
UpdatedAt - When was the record last modified
DeletedAt - When was the record deleted (soft delete)
```

3. The default Laravel model uses only incremental primary keys. Though it works for basic use cases, this causes extra effort for deduping records on larger systems. A much better option is to use unique IDs. This class supports UUIDs, as well as more human friendly unique unique IDs (HUID).

## Human-friendly Unique IDs (HUIDs) ##
The Human-friendly unique IDs (HUIDs) are numeric strings consisting of the date and time with a random variable length postfix. The usual length is 20, but can be increased, if more uniqueness is required. Example: 20170715081335698999

The HUIDs are less unique than UUIDs, but have more value for everyday usage:
- They do provide enough information to uniquely identify a record in 99.99% of the user cases.
- Being date based provides answer when the record was created.
- Can be ordered in ascending/descending order as they are numeric
- Unlike UUIDs are easy for humans to read, especially when separated with dashes
- Can be further transferred to other numeric bases

```json
{
  "human-readable-form":"20170715-081335-698999",
  "base10":"20170715081335698999",
  "base16":"117ECC67F58A0F637",
  "base32":"MDC4D43APZUIJ",
  "base36":"498WXQXN91ET3",
  "base62":"O225WNTn5DL",
  "base64":"HVindzOeFOt",
  "base75":"3hl}S8,t*rO",
  "base100":"kh7f8dz/Y8"
  "crockford32":"HFV66FXCA1XHQ",  
}
```

## Installation ##

- Using composer

```sh
composer require lesichkovm/laravel-advanced-model
```

## Usage ##

Extend your model classes


- Using AdvancedSnakeCaseModel

```php
class MyModel extends \AdvancedCamelCaseModel {
    private $useUniqueId = true;
}
```

- Using AdvancedCamelCaseModel

```php
class MyModel extends \AdvancedCamelCaseModel {
    private $useUniqueId = true;
}
```


- Human-friendly Unique ID (HUID)

```php
class MyModel extends \AdvancedSnakeCaseModel {
    private $useUniqueId = true;
}
```

- Universally Unique ID (UUID)

```php
class MyModel extends \AdvancedSnakeCaseModel {
    private $useUuid = true;
}
```

- Autoincrements

```php
class MyModel extends \AdvancedSnakeCaseModel {
    private $incrementing = true;
}
```


## Create Model and Retrieve ID ##

- Create snake case model instance and retrieve ID
```php
$instance = new MyModel;
$instance->save();

echo $instance->id;
```

- Create new camel case model instance and retrieve ID
```php
$instance = new MyModel;
$instance->save();

echo $instance->Id;
```
