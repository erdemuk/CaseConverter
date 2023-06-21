<?php

use PHPUnit\Framework\TestCase;
use CaseConverter\CaseConverter;
use CaseConverter\Case\CamelCase;
use CaseConverter\Case\KebabCase;
use CaseConverter\Case\PascalCase;
use CaseConverter\Case\SnakeCase;
use CaseConverter\Case\SpaceCase;

class CaseConverterTest extends TestCase
{
    public function testSnakeCaseToKebabCase()
    {
        $input = 'hello_world';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, new KebabCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToCamelCase()
    {
        $input = 'hello_world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, new CamelCase);
        
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToPascalCase()
    {
        $input = 'hello_world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, new PascalCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSnakeCaseToSpaceCase()
    {
        $input = 'hello_world';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, new SpaceCase);
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToSnakeCase()
    {
        $input = 'hello-world';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, new SnakeCase);
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToCamelCase()
    {
        $input = 'hello-world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, new CamelCase);
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToPascalCase()
    {
        $input = 'hello-world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, new PascalCase);
        $this->assertEquals($expected, $converted);
    }

    public function testKebabCaseToSpaceCase()
    {
        $input = 'hello-world';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, new SpaceCase);
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToSnakeCase()
    {
        $input = 'helloWorld';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, new SnakeCase);
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToKebabCase()
    {
        $input = 'helloWorld';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, new KebabCase);
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToPascalCase()
    {
        $input = 'helloWorld';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, new PascalCase);
        $this->assertEquals($expected, $converted);
    }

    public function testCamelCaseToSpaceCase()
    {
        $input = 'helloWorld';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, new SpaceCase);
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToSnakeCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, new SnakeCase);
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToKebabCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, new KebabCase);
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToCamelCase()
    {
        $input = 'HelloWorld';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, new CamelCase);
        $this->assertEquals($expected, $converted);
    }

    public function testPascalCaseToSpaceCase()
    {
        $input = 'HelloWorld';
        $expected = 'hello world';

        $converted = CaseConverter::convertCase($input, new SpaceCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToSnakeCase()
    {
        $input = 'hello world';
        $expected = 'hello_world';

        $converted = CaseConverter::convertCase($input, new SnakeCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToKebabCase()
    {
        $input = 'hello world';
        $expected = 'hello-world';

        $converted = CaseConverter::convertCase($input, new KebabCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToCamelCase()
    {
        $input = 'hello world';
        $expected = 'helloWorld';

        $converted = CaseConverter::convertCase($input, new CamelCase);
        $this->assertEquals($expected, $converted);
    }

    public function testSpaceCaseToPascalCase()
    {
        $input = 'hello world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase($input, new PascalCase);
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
            [
                'class' => new CamelCase,
                'firstName' => 'John',
                'lastName' => 'Doe',
                'emailAddress' => 'john.doe@example.com'
            ],
            [
                'class' => new KebabCase,
                'first-name' => 'John',
                'last-name' => 'Doe',
                'email-address' => 'john.doe@example.com'
            ],
            [
                'class' => new PascalCase,
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'EmailAddress' => 'john.doe@example.com'
            ],
            [
                'class' => new SpaceCase,
                'first name' => 'John',
                'last name' => 'Doe',
                'email address' => 'john.doe@example.com'
            ],
        ];

        foreach ($expected as $case => $result) {
            $converted = CaseConverter::convertCase($input, $result['class']);
            unset($converted['class']);
            unset($result['class']);
            $this->assertEquals($result, $converted);
        }
    }

    public function testRecursiveArrayConversions()
    {
        $input = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'emailAddress' => 'john.doe@example.com',
            'address' => [
                'streetAddress' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'NY',
                'zipCode' => '12345'
            ]
        ];

        $expected = [
            [
                'class' => new SnakeCase,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email_address' => 'john.doe@example.com',
                'address' => [
                    'street_address' => '123 Main St',
                    'city' => 'Anytown',
                    'state' => 'NY',
                    'zip_code' => '12345'
                ]
            ],
            [
                'class' => new KebabCase,
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
            [
                'class' => new PascalCase,
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
            [
                'class' => new SpaceCase,
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

        foreach ($expected as $result) {
            $converted = CaseConverter::convertCase($input, $result['class']);
            unset($converted['class']);
            unset($result['class']);
            $this->assertEquals($result, $converted);
        }
    }

    public function testSpaceCaseToPascalCaseWithoutDetection()
    {
        $input = 'hello world';
        $expected = 'HelloWorld';

        $converted = CaseConverter::convertCase(
            input: $input, 
            case: new PascalCase, 
            fromCase: new SpaceCase
        );
        $this->assertEquals($expected, $converted);
    }
}
