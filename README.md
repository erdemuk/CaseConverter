# CaseConverter

CaseConverter is a powerful PHP library that provides a convenient way to convert text between different case formats. It supports popular case formats such as snake_case, kebab-case, camelCase, PascalCase, and space case.

## Installation

You can install CaseConverter to your project using Composer:

```shell
composer require case-converter
```

## Usage

```php
use CaseConverter\CaseConverter;

$input = 'hello_world';
$converted = CaseConverter::convertCase($input, 'kebab-case');

echo $converted; // hello-world
```

In the above example, the convertCase method is used to convert the text hello_world to kebab-case format.

## Supported Letter Case Formats

- **snake_case**: Example: `hello_world`
- **kebab-case**: Example: `hello-world`
- **camelCase**: Example: `helloWorld`
- **PascalCase**: Example: `HelloWorld`
- **space case**: Example: `Hello World`

## Text Conversion

CaseConverter can convert a single text or texts within an array. Below are some usage examples:

### Converting a Single Text

```php
use CaseConverter\CaseConverter;

$input = 'hello_world';
$converted = CaseConverter::convertCase($input, 'kebab-case');

echo $converted; // hello-world
```

### Converting Texts within an Array

```php
use CaseConverter\CaseConverter;

$input = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email_address' => 'john.doe@example.com'
];

$converted = CaseConverter::convertCase($input, 'PascalCase');

print_r($converted);
/*
Array
(
    [FirstName] => John
    [LastName] => Doe
    [EmailAddress] => john.doe@example.com
)
*/
```
In the above example, the texts within the array are converted to the 'PascalCase' format.

### Converting Multidimensional Arrays

CaseConverter can also handle multidimensional arrays. Here's an example:

```php
use CaseConverter\CaseConverter;

$input = [
    'user' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email_address' => 'john.doe@example.com'
    ],
    'address' => [
        'street' => '123 Main St',
        'city' => 'New York',
        'country' => 'USA'
    ]
];

$converted = CaseConverter::convertCase($input, 'snake_case');

print_r($converted);
/*
Array
(
    [user] => Array
        (
            [first_name] => John
            [last_name] => Doe
            [email_address] => john.doe@example.com
        )

    [address] => Array
        (
            [street] => 123 Main St
            [city] => New York
            [country] => USA
        )

)
*/
```
In the above example, the texts within a multidimensional array are converted to the 'snake_case' format.

## Contribution

Contributions to CaseConverter are always welcome! If you find any bugs, issues, or have suggestions for improvement, please feel free to open an issue or submit a pull request on the GitHub repository.