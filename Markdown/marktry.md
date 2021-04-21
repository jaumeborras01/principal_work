Guia de Markdown
=
## Jaume Borras

#### Indice

* Encabezados 
  * Subrayado
* Citas (o recuadro de texto)
  * Citas anidadas
* Listas
  * Listas ordenadas
* Codigos de Bloque
* Reglas Horizontales
* Elementos de Linia
* Links o Enlaces
  * Links en Linea
  * Links Referenciados
* Código
* Imagenes
* Tablas
* Omitir Caracteres


#### Encabezados
>Los encabezados son equivalente al estilo de titulo de un gestor de archivos de texto (como Word, GoogleDocs o OpenOffice).
Las # marcan el estilo que queremos, si ponemos solo un # tendremos el de primer nivel (el más grande) y a medida que añadiendo bajaremos de nivel haciendo los encabezados más pequeños hasta llegar a 6 seguidos.

##### Encabezados subrayados
>Para generar encabezados subrayados puedes utilizar el signo de igual (para nivel 1) o signo guion (para nivel 2) que deberás colocar en la línea que hay debajo del texto correspondiente.

###  Citas o recuadro de texto
~~~
Las citas se generar utilizando el carácter mayor que '>' al comienzo del bloque de texto. Para separarlos basta un salto de linea y el '>' de nuevo.
Podemos modificar el formato del texto poniendolo en cursiva, negrita o tachado. Podemos encerrar el texto con \* o \_ para transformarlo en *cursiva*, con \** o \__ para **negrita**, combinar los formatos és \*** o \___ y si queremos ~~tacharlo~~ encerramos con \~~. 
~~~
#### Citas anidadas
>Las citas anidadas se generan concatenando dos '>'.
>>Bugs le llamo calmo a Elmer.

### Listas
>Se pueden generar de dos maneras desordenadas o ordenadas, para generar listas desordenadas se colocan los items a la misma altura y con los siguientes signos  *, - o +. Puede variar la altura dejando 4 espacios o tabulación respecto al nivel anterior.

#### Listas ordenadas
>Se generan como las listas pero en vez de poner el signo, añadades el numero y un punto (1., 2., etc...). Ahora puedes combinar las ordenadas con las anidadas y a diferente nivel.

### Codigo de Bloque
>Sirve para escribrir multiples lineas en un mismo párrafo encerrandolo entre tres virguillas (\~~~).

### Reglas Horizontales
>Se utilizan para separar secciones de manera visual. Se realiza con tres guiones, guiones bajos o asteriscos.

### Links o Enlaces
>Los enlaces se encuentran en línea con el texto. Para generar links simples (se visualizala url completa) encerramos la url entre /<> <https://github.com/>

#### Links en Linea
>Son enlaces dipositados en el texto que la url se encubre con un texto dipositado entre corchetes /[] y el valor de la url entre paréntesis /(). 
>[GitHub](https://github.com/)

#### Links con Referencia
>Solucionan una desventaja del anterior de la dificultad de lectura si añades demasiados links complejos entonces los almacenas dentro de una 'variable'.
>Lo declaras de la siguiente manera: \[mote\]: url.com. Asi cuando lo necesites le referencias con el mote seleccionado pudiendo combinar con el link de linea de la siguiente manera:
* Declaracion: 
  * \[git\]: https://github.com/
* Uso: 
  * \[Link para GitHub\]\[git\]
  [git]: https://github.com/ |
  [Link para GitHub][git]

### Código
>Se utiliza para mostrar lineas de codigo de otro lenguaje de programación.
>La manera más sencilla de escribir el codigo es encerando el texto entre las comillas simples \`. 


```private ArrayList<int> rFactorial = new ArrayList<int>();```



### Imágenes 
>Se asemeja mucho a los links pero añadiendo una exclamación al principio que nos marcará el texto en caso de error y la url.
>\!\[Insertar texto de error\] \(ruta/a/elegir.jpg\)

### Tablas
~~~
Para generar tablas se utilizan los siguientes 3 caracteres:
\|, y \- 

Como toda tabla primero declaramos los titulos de las columnas de la siguiente manera:
\| ID \|Nombre \| CP
y en la siguiente subtituimos los nombres con ---
\| --- \| --- \| ---
ya las siguientes lineas añadimos la información de la misma manera que el titulo:
\| 1 \| Alfonso \| 07003
\| 2 \| Bernat \| 07014
\| 3 \| Rafael \| 07012
~~~
| ID |Nombre | CP
| --- | --- | ---
| 1 | Alfonso | 07003
| 2 | Bernat | 07014
| 3 | Rafael | 07012

### Omitir Caracteres
>Para escape de caracteres en Markdown se utiliza \\ para que haga su función.