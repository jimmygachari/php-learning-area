<?php

public class ClassDefinition
{
    private $className;
    private $properties = [];
    private $methods = [];

    public function __construct($className)
    {
        $this->className = $className;
    }

    public function addProperty($name, $type)
    {
        $this->properties[$name] = $type;
    }

    public function addMethod($name, $returnType)
    {
        $this->methods[$name] = $returnType;
    }

    public function generateClass()
    {
        $classCode = "class {$this->className} {\n";

        foreach ($this->properties as $name => $type) {
            $classCode .= "    private \${$name}; // type: {$type}\n";
        }

        foreach ($this->methods as $name => $returnType) {
            $classCode .= "    public function {$name}() : {$returnType} {\n";
            $classCode .= "        // method implementation\n";
            $classCode .= "    }\n";
        }

        $classCode .= "}\n";

        return $classCode;
    }
}