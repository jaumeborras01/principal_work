---
# Título
## subtitulo
```php
 <?php 
    echo "hola"
```
**negrita**
*cursiva*
***ambas***
Enumerados:
* item 1
* item 2

[Documentación php](http://php.net)
---

# Intro PHP 💻 

Para agregar archivos PHP podemos usar las anotaciones ``include``, ``require`` o ``require_once``.


### Constantes

Se pueden declarar de dos formas:

```php
define('nombre', "valor");
```

```php
const NOMBRE = "valor";
```

# Tipos de datos

En PHP se permite forzar tipados o transformar datos de la siguiente manera:

```php
$foo = 10;   // $foo es un integer
$bar = (boolean) $foo;   // $bar es un boolean
```
## String 
***

En PHP podemos usar single quotes **' '** y double quotes **" "** de manera indiferente. La diferencia es que con las comillas dobles se realiza una evaluación. Supuestamente las simples se ejecutan más rápido.

Podemos concatenar strings mediante puntos:
```php
$user = "Silvia";
echo "hola " . $user . "!";
```
o mediante llaves (*template strings*). Debemos ir con cuidado en este caso, ya que si nos dejamos algún espacio puede generar un error:
```php
$user = "Silvia";
echo "hola ${user}!";
```
Otra forma de asignar valores a un string:

`` $str .= 'valor' `` Aquí se concatenaría al valor de $str.

En el siguiente enlace podemos encontrar más ejemplos sintácticos de **expresiones complejas**:

[Documentación php: expresiones complejas](https://www.php.net/manual/es/language.types.string.php)


### Funciones comunes con Strings
* `strlen(string)` - Para conocer el valor longitudinal de un string.
* `str_repeat(string, int)` - Repite el string n veces
* `strtoupper(string)` / `strtolower(string)` - Transforma el string.
* `str_replace($strToReplace, $strReplacement, $string)` - Para reemplazar caracteres en un string.
* `strpos(string $haystack , mixed $needle , int $offset = 0)` - Para conocer la posición de un carácter (o 1er carácter de un string) en un string.
* `substr(string $string , int $start , int $length = ?)` - Para obtener una porción del string. Devuelve un string.
* `implode() / explode()` - Se usan para unir elementos de un array en un string y dividir un string en varios respectivamente.
## Integer
***
Pueden ser positivos y negativos y pueden especificarse mediante notación decimal (base 10), hexadecimal (base 16), octal (base 8) o binaria (base 2).

Si PHP encuentra un número fuera de los límites de un integer, se interpretará en su lugar como un valor de tipo *float*.

En el caso de int también se puede asignar valores con **+=** o **-=**.

## Boolean
***
Los valores 0 siempre darán false; al contrario que -1 y 1 que son true.

## Array
***
Se pueden declarar de varias formas:

```php
$clientes = []
``` 
```php
$clientes = array()
``` 
Si queremos visualizar mejor el contenido de un array:

```php
<pre>

var_dump($clientes);

</pre>
```
### Funciones comunes con Arrays

* `array_push()` / `array_unshift()` - Para agregar valores al array al principio o al final.
* `array_sum(int)` - Suma los valores del array.
* `in_array()` - Revisa si existe la propiedad en el array y devuelve un boolean.
* `sort()` - Ordena de menor a mayor.
* `rsort(int)` - Ordena de mayor a menor (reverse).

## Arrays asociativos
***

Son como hashmaps o mapas. Arrays con clave y valor.

```php
$cliente = ["nombre" => "Juan"];
```
Las propiedades pueden añadirse a posteriori. En caso de no existir se crean y si existen se sobreescriben:

```php
$cliente["apellido"] = "López"; // Como no se ha creado aún, se añadiría.
```

Podemos comprobar si existe o si está vacío con las siguientes funciones:

* ``empty(array)``

* ``isset(array)``

### Otras funciones con arrays asociativos

* `ksort()` - Ordena por las keys. También se puede usar reverse: `krsort()`.
* `asort()` - Ordena por los valores.

# Operadores

### Incrementar y decrementar:

Ejemplos:

```php
$num = 30;
echo ++$num; //31
echo --$num; //29
echo $num++; //30
echo $num;   //31
```
### Operadores de comparación:

Aquí tenemos además de los comunes otros como ``<=>`` llamado Nave espacial.
Compara dos valores y de vuelve -1, 0 o 1 en función de si A es menor , igual, o mayor a B.

También tenemos el de Fusión ``$a ?? $b ?? $c El primer operando de izquierda a derecha que exista y no sea null. null si no hay valores definidos y no son null.

### Operadores Lógicos:
Además de los comunes hay diferentes or:
``or`` que es inclusivo (``||``) (cualquiera de los dos que cumpla la condición o ambos) y ``xor`` que es exclusivo (uno u otro).

# Estructuras de control

## If, else y elseif
***
Sintácticamente además de utilizar las llaves, podemos utilizar los dos puntos acabando con *endif*:

```php
    if($a == $b):
    ...
    endif;
```
Sin embargo no pueden mezclarse con las llaves {}.
Además, debemos tener cuidado usando la sintáxis anterior, ya que **podría generar un error si usamos *else if* por separado**.

*Else if* y *elseif* se consideran igual usando curly braces (llaves) {}.

## Switch
***
Para cuando tenemos múltiples valores que comparar. Podemos comparar strings y otros tipos.

Estructura de común de switch:
```php
switch ($valor) {
    case "":
    ...
    break;
    case "": 
    ...
    break;
    default:
    ...;
}
```
## For
***
Ejemplo de estructura con for:
```php
for ($i = 0; $i <= count($a); $i++) {
      $result = $result + ($a[$i]);
}
```

## Foreach
***
Se realizan tantas iteraciones como ocupe el array. Siempre podemos acabar la secuencia con un ***continue*** (si queremos pasar a la siguiente iteración) o ***break*** (si queremos detener el bucle).

``foreach($array as $value){};``

En el caso de un array asociativo, se recorren los valores; pero si queremos recorrer por keys:

``foreach($array as $key => value){};``

## While
***
Se realiza la acción hasta que la sentencia del while es falsa.
Una opción sintáctica es:

``while(condición) {... endwhile;}``

La estructura anterior se puede aplicar también a for loops (*endfor*).

## Do-while
***
Se realiza la acción dentro del Do hasta que la sentencia del while es falsa.

``do {...} while(condición);``


# Funciones
## Funciones anónimas (lambda o closures)
***

Estas funciones no tienen nombre:

```php
$saludo = function($param) {...};
```
También se pueden usar como parámetro en una función. Generalmente se implementan cuando no se van a reutilizar. Son equivalentes a *callbacks* en javascript.


## Parámetros y paso de argumentos por referencia 
***
Por defecto, los argumentos de las funciones son pasados por valor; es decir, que los cambios sólo afectan dentro de la función:

```php
function tomar_array($entrada) {
    echo "$entrada[0] + $entrada[1] = ".$entrada[0]+$entrada[1];
}
```
Si queremos que se modifiquen fuera lo pasamos por **referencia**  de la siguiente manera añadiendo el signo **&** cuando definimos la función:

```php
function añadir_algo(&$cadena) {
    $cadena .= 'y algo más.';
}
$cad = 'Esto es una cadena, ';
añadir_algo($cad);
echo $cad;    // imprime 'Esto es una cadena, y algo más.'
```


## Parámetros por defecto
***
Podemos asignar valores a los parámetros de las funciones (inluyendo arrays y null) de manera que si llamamos a una función y no le pasamos el parámetro, utilizará el valor que le hayamos asignado en la declaración:

```php
function hacer_café($tipo = "capuchino")
{
    return "Hacer una taza de $tipo.\n";
}
echo hacer_café();               // Hacer una taza de capuchino.
echo hacer_café(null);           // Hacer una taza de .
echo hacer_café("espresso");     // Hacer una taza de espresso.
```

**A partir de PHP 5, los argumentos pasados por referencia pueden tener un valor predeterminado.**


## Declaraciones de tipo
***
En php es posible añadirle tipado a los parámetros de una función:

``function hacer_café(int $option){}``


# POO

Ejemplo de una clase en PHP:

```php
class Coche {
/*
Los nombres de propiedades se añaden en CamelCase y pueden o no 
tener un valor por defecto.
*/
  public $modelo; 
  public $color = 'beige';
  public $nPuertas = 4;
  public $depósito;

  public function hello() 
  {
    return "beep";
  }
}
```
Para instanciar un objeto usamos  ``new``:
```php
$bmw = new Coche ();
```
Para obtener las propiedades usamos la flecha ``->``:

```php
$bmw -> color = 'azul';
```
Lo mismo para setearlas:
```php
$bmw -> marca = "BMW";
```
Y para usar sus métodos:
```php
echo $bmw -> hello();
```

Dentro de las clases usamos ``$this`` para referirnos al objeto:

```php
$this -> color;
```

Podemos encadenar funciones y propiedades en el objeto:
```php
$depósito = $coche -> llenarDepósito(10) -> consumo(40) -> depósito;
```

Al igual que en java podemos agragar propiedades privadas y acceder mediante 
***getters*** y ***setters***.

## Métodos mágicos
***
Empiezan con dos guiones bajos ``__construct()`` y ya están predefinidos en PHP. Los métodos mágicos son invocados de manera automática al instanciar el objeto.
El constructor, por ejemplo, es un método mágico y como tal se precede de los guiones también.
También tenemos ``__destruct``, ``__toString()``, ``__set()`` y ``__get()``;

Otros ejemplos de métodos mágicos en la [documentación de php](https://www.php.net/manual/es/language.oop5.magic.php).

Además de los métodos mágicos también existen las constantes mágicas. Con ellas podemos acceder diréctamente a los nombre como:
``__CLASS__`` para obtener el nombre de la clase.

## Visibilidad
***
La visibilidad de una propiedad, un método o (a partir de PHP 7.1.0) una constante se puede definir anteponiendo a su declaración una de las palabras reservadas public, protected o private.

A los miembros de clase declarados como 'public' se puede acceder desde donde sea; a los miembros declarados como 'protected', solo desde la misma clase, mediante clases heredadas o desde la clase padre. A los miembros declarados como 'private' únicamente se puede acceder desde la clase que los definió. Para acceder a las propiedades de las clases aunque sean privadas se crean métodos para sonsacar el valor de dicho objeto mencionado previamente en POO.

```php
$obj = new MyClass();
echo $obj->public;    // Funciona bien
echo $obj->protected; // Error Fatal
echo $obj->private;   // Error Fatal
$obj->printHello();   // Muestra Public, Protected y Private
```

## Herencia 
***
La herencia es un principo de programación bien establecido y PHP hace uso de él en su modelado de objetos. 

Cuando se extiende una clase, la subclase hereda todos los métodos públicos y protegidos de la clase padre. A menos que una clase sobrescriba esos métodos, mantendrán su funcionalidad original.

La definición y abstracción de la funcionalidad permite la implementación de ella en objetos similares sin la necesidad de reimplementar toda la funcionalidad compartida.

```php
class Foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }
    
    public function printZombie()
    {
        echo 'Grrrr' . PHP_EOL;
    }
}

class bar extends Foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz');     // Salida: 'Foo: baz'
$foo->printZombie();        // Salida: 'Grrrr' 
$bar->printItem('baz');     // Salida: 'Bar: baz'
$bar->printZombie();        // Salida: 'Grrrr'
```
(PHP_EOL representa el final de linea según el sistema).
## Estáticos
***
### Variables estaticas
La variable estática existe solo dentro del ámbito de la funcion o clase pero no pierde el valor cuando se le abandona.

``` php
class Pruebastatic
{
    static private $count = 0;

    static public function sumTen()
    {
        for($i = 0; 10 > $i; $i++){
            self::$count++;
        }
        echo self::$count . PHP_EOL;
    }
}    

Pruebastatic::countTen(); //imprime 10
Pruebastatic::countTen(); //imprime 20
```
### Métodos estáticos
Los métodos estáticos los puedes invocar sin instanciar un objeto de la clase, entonces ``$this`` no está disponible dentro de los métodos declarados como estáticos.

La manera de llamar métodos estáticos se invocan con ``::`` de la misma manera del ejemplo anterior ``Pruebastatic::countTen();``.

### Propiedades estáticas

No se puede acceder a las propiedades éstaticas a través del objeto con ``->``. En el ejemplo si la variable éstatica fuese pública se accedería de la siguiente manera: \
(También sirve para las constantes)
```php
echo Pruebastatic::$count; //imprime el valor de $count
```
Dentro de la clase al no ser propiedad de la instancia no nos podemos referir a el con  ``$this``, sin embargo existe la palabra clave ``self`` para referirse al valor.
```php
echo self::$count; //imprime el valor de $count dentro de la clase
```

# Namespaces
Los espacios de nombre nos permite agrupar nuestro código para su posterior uso. 
En pocas palabras un espacio de nombre o Namespace es un contenedor que nos permite agrupar nuestro código para darle un uso posterior de esta manera evitamos conflictos de nombre.

Un SO tiene sus sistema de archivos, dentro de un directorio si existe el archivo ``helloworld.txt`` en la misma localización no puede existir otro con el mismo nombre. Este principio se extiende a los espacios de nombres.

# Errores
PHP notifica errores en respuesta a varias condiciones de error internas. Estas se pueden utilizar para señalar varias condiciones diferentes, mostrándose y/o registrándose si fuera necesario.

La mayoría de los errores ahora son notificados lanzando excepciones Error (PHP 7.x). Al igual que las excepciones normales, las excepciones Error se propagarán hasta alcanzar el primer bloque catch coincidente. Si no hay bloques coincidentes, será invocado cualquier manejador de excepciones predeterminado instalado con set_exception_handler(), en caso de no haber se produce un error tradicional.

## Tratar errores
***
Para atrapar las excepciones y errores utilizaremos un try-catch para manejarlas. Utilizaremos ``try{}`` para añadir dentro el codigo que queremos salvar en caso de error segido de un ``catch(Throwable $t)`` en caso de PHP 7.x o un ``catch(Exceptoion $e)`` en PHP 5.x para las ordenes a realizar en caso de error.

```php
try{ //el siguiente codigo da un error

    $a = 432;
    $b = 0;
    $x = $a / $b;

}catch(Throwable $t){ //aquí manejamos la excepcion generada

    echo 'No se puede dividir un valor entre 0';

}finally{ //este bloque sirve para realizar funciones aunque el codigo funcione o se lance la excepción (ejemplo cerrar conexiones).

}
```
En caso de saber que és posible que ocurra el error podemos crear nuestros propias excepciones para una mejor gestión y poder controlarlos.

```php
function div($num1, $num2){

    if($num2 == 0){
        throw new Exception('No se puede dividir entre 0')
    }else {
        return $num1 / $num2;
    }
}

try{ //el siguiente codigo da un error

    $a = 432;
    $b = 0;
    div($a, $b);

}catch(Throwable $t){ //aquí manejamos la excepcion generada

    echo $t->getMessage(); //imprimirá 'No se puede dividir entre 0'

}
```
