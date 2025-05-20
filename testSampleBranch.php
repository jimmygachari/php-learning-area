<?php

echo "Testing ClassDefinition...\n";
require_once 'classDefinition.php';
$testClass = new ClassDefinition('TestClass');
$testClass->addProperty('name', 'string');
$testClass->addProperty('age', 'int');
$testClass->addMethod('getName', 'string');
$testClass->addMethod('getAge', 'int');
$generatedClassCode = $testClass->generateClass();
echo "Generated Class Code:\n";
echo $generatedClassCode;
// Save the generated class code to a file
file_put_contents('TestClass.php', $generatedClassCode);
// Check if the file was created successfully
if (file_exists('TestClass.php')) {
    echo "TestClass.php created successfully.\n";
} else {
    echo "Failed to create TestClass.php.\n";
}
// Test the generated class
require_once 'TestClass.php';
$testInstance = new TestClass();
$testInstance->name = 'John Doe';
$testInstance->age = 30;
echo "Name: " . $testInstance->name . "\n";
echo "Age: " . $testInstance->age . "\n";
// Test the methods
echo "Name from method: " . $testInstance->getName() . "\n";
echo "Age from method: " . $testInstance->getAge() . "\n";
// Clean up
unlink('TestClass.php');
echo "TestClass.php deleted successfully.\n";
