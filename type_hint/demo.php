<?php
declare(strict_types=1);

require_once 'I.php';
require_once 'C.php';
require_once 'A.php';
require_once 'B.php';

class Demo {
    public function typeAReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    
    public function typeAReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeAReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeAReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeAReturnNull(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeBReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    
    public function typeBReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeBReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeBReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeBReturnNull(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeCReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    
    public function typeCReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeCReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeCReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeCReturnNull(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeIReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    
    public function typeIReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeIReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeIReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeIReturnNull(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeNullReturnA(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    
    public function typeNullReturnB(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeNullReturnC(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeNullReturnI(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeNullReturnNull(): ?A
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
}

$demo = new Demo();

$methods = [
    'typeAReturnA',
    'typeAReturnB',
    'typeAReturnC',
    'typeAReturnI',
    'typeAReturnNull',
    'typeBReturnA',
    'typeBReturnB',
    'typeBReturnC',
    'typeBReturnI',
    'typeBReturnNull',
    'typeCReturnA',
    'typeCReturnB',
    'typeCReturnC',
    'typeCReturnI',
    'typeCReturnNull',
    'typeIReturnA',
    'typeIReturnB',
    'typeIReturnC',
    'typeIReturnI',
    'typeIReturnNull',
    'typeNullReturnA',
    'typeNullReturnB',
    'typeNullReturnC',
    'typeNullReturnI',
    'typeNullReturnNull',
];

foreach ($methods as $method) {
    $result = $demo->$method();

    $expectedType = '';
    if (strpos($method, 'AReturn') !== false) {
        $expectedType = 'A';
    } elseif (strpos($method, 'BReturn') !== false) {
        $expectedType = 'B';
    } elseif (strpos($method, 'CReturn') !== false) {
        $expectedType = 'C';
    } elseif (strpos($method, 'IReturn') !== false) {
        $expectedType = 'I';
    } elseif (strpos($method, 'Null') !== false) {
        $expectedType = 'null';
    }

    if (is_null($result)) {
        $actualType = 'null';
    } else {
        $actualType = get_class($result);
    }

    $isValid = ($expectedType === 'null' && is_null($result)) || ($expectedType === $actualType);
    
    echo "Phương thức: " . $method . " => Đối tượng trả về là: " . $actualType . " => " . ($isValid ? "True" : "False") . "<br>";
}