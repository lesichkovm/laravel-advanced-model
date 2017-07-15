# Laravel Advanced Model
An advanced model for Laravel, with out-of-the-box support for CamelCase field names, and enhanced primary key support - human friendly date based unique IDs, and UUIDs.

## Background ##
1. By default Laravel uses snake_case field names for tables, which are not as readable, and few characters larger compared to UpperCamelCase (more at https://en.wikipedia.org/wiki/Camel_case).

This class fixes this shortcoming, and the default is UpperCamelCase. This changes the default Laravel names to:

```
id - Id
created_at - CreatedAt
updated_at - UpdatedAt
deleted_at - DeletedAt
```

2. The default Laravel model uses only incremental primary keys. Though it works for basic use cases, this causes extra effort for deduping records on larger systems. A much better option is to use unique IDs. This class supports UUIDs, as well as more human friendly unique unique IDs (HUID).

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
  "crockford32":"HFV66FXCA1XHQ"
}
```

## Installation ##

Add the following to your composer file:

```json
   "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/lesichkovm/laravel-advanced-model.git"
        }
    ],
    "require": {
        "lesichkovm/laravel-advanced-model": "dev-master"
    },
```

## Usage ##

Extend your model classes

```php
class MyModel extends AdvancedModel {
    private $useUniqueIds = true;
}
```

## Create Model and Retrieve ID ##

```php
$instance = new MyModel;
$instance->save();

echo $instance->Id;
```
