=== Mata HOYGAN ===

Contributors: Miguel Mariano
Donate link: http://www.ciberwolf.com
Tags: comments, HOYGAN, censure, Censurar, Malas Palabras, Comentarios, Ortografia, SEO Comentarios
Requires at least: 2.6.3
Tested up to: 3.3.1
Stable tag: trunk

Transforma los comentarios tipo HOYGAN, Censura las malas palabras, Corrige la ortografia y Resalta las palabras claves en los comentarios

== Description ==

Este plugin intenta eliminar varias de las caracteristicas del lenguaje HOYGAN, como repeticion de letras, alternacion de mayusculas y minusculas, abreviaturas de sms, etc. Tambien censura las malas palabras en los comentarios, gracias a la API de Google corrige la ortografia de las palabras automaticamente y tambien resalta las palabras claves en los comentarios

* Elimina repeticiones de letras (holaaaaa -> hola)

* Transforma K en C (k -> c). Ademas transforma ki en qui. Tambien reconoce palabras en Ingles que usan la K las cuales no seran transformadas

* Elimina abreviaturas SMS (xq -> por que, dsp -> despues)

* Transforma (toi -> estoy, i -> y, lemdo -> lindo)

* Convierte palabras con mezcla de mayusculas y minusculas a minuscula (LeTrA dE uNa CaNcIoN -> letra de una cancion)

* Elimina las eses finales en palabras que terminan en istes (lo vistes y me dijistes -> lo viste y me dijiste)

* Convierte a letra los numeros que se usan como letra (3s7o e5 un 73x70 f30 -> esto es un texto feo)

* Agrega vocales omitidas al final de las palabras (va a fallar en palabras en inglés, porque se supone que en español muy pocas palabras finalizan por ejemplo en 't', entonces se asume que se le debe agregar una e) (stamos -> estamos, spero -> espero, dcile -> decile, nterado -> enterado, vrdad -> verdad, comprart, comprarte) 

* Censura las malas palabras transformandolas en ******

* Corrige la ortografia de las palabras gracias al API de Google

* Resalta las palabras claves en los comentarios, para que funcione debes tener instalado All in ONE SEO ya que las palabras claves las saca de los campos Keywords de cada Post

* El Plugin contiene un enlace hacia http://wordpress.org/extend/plugins/mata-hoygan/ para ayudarlo a promover

== Installation ==

1. Subir el archivo 'mata_HOYGAN.zip' al directorio '/wp-content/plugins'
2. Activarlo desde el Panel de Administracion de Wordpress (menu Plugins)
3. Ir al menú "Ajustes - Mata-HOYGAN" para configurar el Plugin

== Changelog ==

* 5.5 Mas mejoras en el codigo para corregir la ortografia y se elimino la funcion que transforma las "Z" en "S" ya que no daba muy buenos resultados.

* 5.4 Mejorado el codigo para corregir la ortografia y se agrego la imagen del Plugin en el repositorio de WP

* 5.3 Agregadas algunas reglas para no transformar las "Z" que esten bien usadas en las palabras, tambien se agrego reconocimiento de palabras en Ingles (No es 100% efectivo), se mejoro la velocidad para transformar todos los comentarios viejos

* 5.2 Agregada la opcion para resaltar las palabras claves en los comentarios usando Negritas e Italicas, para evitar que Google lo tome como SobreOptimizacion: Solo resaltara comentarios de mas de 50 caracteres ya que los mas cortos no aportan mucho valor, No todos los comentarios seran resaltados hay un 33% de probabilidad que no resalte 1 de cada 3 comentarios, Solo resaltara 1 Palabra Clave en cada comentario.

* 5.1 Se mejoro la velocidad al transformar los comentarios y se agrego una lista con las palabras mas usadas del español para no tener que usarlas al corregir la ortografia, con esto se envian menos palabras al API de Google y se mejora la velocidad

* 5.0 Mejorado el corrector del Lenguaje HOYGAN, se agrego el corrector ortografico de Google, los comentarios de los usuarios logeados no seran corregidos, tambien se agrego un boton para transformar los comentarios del Blog

* 4.9 Agregadas mas abreviaturas SMS para transformarlas.

* 4.8 Reconoce palabras en Ingles con K para no transformar la K en C, Reconoce las palabras con numeros para no transformarlas ejemplos: Xbox360, PS3, Windows7, MP10. Mejorados varios aspectos del Censurador de Palabras y del Eliminador del Lenguaje HOYGAN.

* 4.7 Mejorado el codigo del censurador de palabras.

* 4.6 Corregido un pequeño Bug cuando alguien deja una URL o un Email en el comentario.

* 4.5 Corregidos varios Bugs: Elimina repetición de caracteres como los Puntos y Comas, no destruye las URL dejadas en los comentarios antes las dañaba y ahora si censura las malas palabras con tilde, lo mejor es que en el campo "Censurar las siguientes Palabras" podemos ingresar la palabra que queremos censurar sin la tilde y el Plugin la censura si la encuentra con tilde o no.

* 4.4 Corregido un pequeño Bug

* 4.3 Des-HOYGANIZA y Censura los comentarios viejos que tenga tu Blog

* 4.2 Agregados mas campos para las exepciones, ahora hay un campo para cada tipo de exepcion: Repeticion de letras, palabras con K, palabras que terminan con T y empiezan con SP o ST

* 4.1 Agregado el campo excepciones

* 4.0 Mejoras en el corrector de lenguaje HOYGAN y en la censura de palabras

* 3.0 Agregada la pagina de opciones del Plugin y mejoras en la censura de palabras

* 2.0 Agregada la censura de malas palabras en Español

* 1.0 Lanzamiento inicial
