<?php

use PHPUnit\Framework\TestCase;
use CaseConverter\CaseConverter;

class CaseConverterTest extends TestCase
{
    public function testSnakeCaseToKebabCase()
    {
        $input = 'hello_world';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, 'kebab-case');
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToCamelCase()
    {
        $input = 'hello_world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, 'camelCase');
        
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToPascalCase()
    {
        $input = 'hello_world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, 'PascalCase');
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToSpaceCase()
    {
        $input = 'hello_world';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, 'space case');
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToSnakeCase()
    {
        $input = 'hello-world';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, 'snake_case');
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToCamelCase()
    {
        $input = 'hello-world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, 'camelCase');
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToPascalCase()
    {
        $input = 'hello-world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, 'PascalCase');
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToSpaceCase()
    {
        $input = 'hello-world';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, 'space case');
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToSnakeCase()
    {
        $input = 'helloWorld';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, 'snake_case');
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToKebabCase()
    {
        $input = 'helloWorld';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, 'kebab-case');
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToPascalCase()
    {
        $input = 'helloWorld';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, 'PascalCase');
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToSpaceCase()
    {
        $input = 'helloWorld';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, 'space case');
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToSnakeCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, 'snake_case');
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToKebabCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, 'kebab-case');
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToCamelCase()
    {
        $input = 'HelloWorld';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, 'camelCase');
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToSpaceCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, 'space case');
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToSnakeCase()
    {
        $input = 'hello world';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, 'snake_case');
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToKebabCase()
    {
        $input = 'hello world';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, 'kebab-case');
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToCamelCase()
    {
        $input = 'hello world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, 'camelCase');
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToPascalCase()
    {
        $input = 'hello world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, 'PascalCase');
        $this->assertEquals($expected, $converted);
    }
    
    public function testArrayConversions()
    {
        $input = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com'
        ];

        $expected = [
            'camelCase' => [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'emailAddress' => 'john.doe@example.com'
            ],
            'kebab-case' => [
                'first-name' => 'John',
                'last-name' => 'Doe',
                'email-address' => 'john.doe@example.com'
            ],
            'PascalCase' => [
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'EmailAddress' => 'john.doe@example.com'
            ],
            'space case' => [
                'first name' => 'John',
                'last name' => 'Doe',
                'email address' => 'john.doe@example.com'
            ],
        ];

        foreach ($expected as $case => $result) {
            $converted = CaseConverter::convertCase($input, $case);
            $this->assertEquals($result, $converted);
        }
    }

    public function testRecursiveArrayConversions()
    {
        $input = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'address' => [
                'street_address' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'NY',
                'zip_code' => '12345'
            ]
        ];

        $expected = [
            'camelCase' => [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'emailAddress' => 'john.doe@example.com',
                'address' => [
                    'streetAddress' => '123 Main St',
                    'city' => 'Anytown',
                    'state' => 'NY',
                    'zipCode' => '12345'
                ]
            ],
            'kebab-case' => [
                'first-name' => 'John',
                'last-name' => 'Doe',
                'email-address' => 'john.doe@example.com',
                'address' => [
                    'street-address' => '123 Main St',
                    'city' => 'Anytown',
                    'state' => 'NY',
                    'zip-code' => '12345'
                ]
            ],
            'PascalCase' => [
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'EmailAddress' => 'john.doe@example.com',
                'Address' => [
                    'StreetAddress' => '123 Main St',
                    'City' => 'Anytown',
                    'State' => 'NY',
                    'ZipCode' => '12345'
                ]
            ],
            'space case' => [
                'first name' => 'John',
                'last name' => 'Doe',
                'email address' => 'john.doe@example.com',
                'address' => [
                    'street address' => '123 Main St',
                    'city' => 'Anytown',
                    'state' => 'NY',
                    'zip code' => '12345'
                ]
            ],
        ];

        foreach ($expected as $case => $result) {
            $converted = CaseConverter::convertCase($input, $case);
            $this->assertEquals($result, $converted);
        }
    }
}
