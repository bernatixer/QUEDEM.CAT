# QUEDEM.CAT

###La web actualment es troba en funcionament a: [QUEDEM.CAT](http://quedem.cat/)

# Català

## Que és QUEDEM.CAT?
QUEDEM.CAT és una plataforma per a estudiants i professors particulars, en especial pels estudiants de secundària i batxillerat. Aquesta plataforma deriva del treball de recerca de 2n de Batxillerat.

QUEDEM.CAT dona la possibilitat als estudiants de poder crear grups d’estudi o inscriure’s a ja creats. Llavors, amb el grup d’estudi  poden quedar amb els participants en un espai per a estudiar, per exemple, una biblioteca, i estudiar entre tots el que s’hagi planejat.

També hi ha un espai per professors particulars, aquests es poden anunciar a la web i els alumnes o pares contactar amb ells.

La web també aporta informació i enllaços d’interès pels estudiants, amb informació, exàmens resolts de les PAU i exercicis per practicar de diferents matèries i cursos.

## Instalació
Per a què QUEDEM.CAT funcioni correctament, necessita un servidor que allotji fitxers (amb suport per a PHP i MySQL) i un domini.
> [Hostinger](http://www.hostinger.es/) és una empresa d'allotjament que proporciona un servidor i domini gratuits.

QUEDEM.CAT treballa amb bases de dades, exactament MySQL. Per tal que la web funcioni corretament, s'ha d'importar la base de dades, en un manager com PHPMYAdmin es fa des del seguent apartat: 
![Importar Base de Dades](http://bernatixer.com/TDR/img/importar.png)

Després cal editar la connexió a la base de dades, que es troba al fitxer **config.php**
```php
<?php
session_start();
mysql_connect('IP', 'USUARI', 'CONTRASENYA');
mysql_select_db('BASE_DE_DADES');
?>
```
Un cop fets tots aquests pasos la web es pot posar en marxa.

# Español

## Que es QUEDEM.CAT?
QUEDEM.CAT es una plataforma para estudiantes i profesores particulares, en especial para estudiantes de secundaria y bachillerato. 

QUEDEM.CAT da la posibilidad a los estudiantes de poder crear grupos de estudio o inscribirse a ya creados. Entonces, con el grupo de estudio pueden quedar con los participantes en un espaio para estudiar, por ejemplo, una biblioteca, y estudiar ente todos el que se haya planteado.

También hay un espacio para profesores particulares, estos se pueden anunciar a la web y los alumnos o padres contactar con ellos.

La web también facilita información y links de interés para los estudiantes, con información, examenes resueltos de la selectividad y ejercicios para practicar de distintas materias y cursos.

## Instalación
Para que QUEDEM.CAT funcione correctamente, se necesita un servidor que aloje los archivos (con soporte para PHP y MySQL) y un dominio.
> [Hostinger](http://www.hostinger.es/) es una empresa de alojamiento que proporciona un servidor y un dominio gratuitos.

QUEDEM.CAT trabaja con bases de datos, exactamente MySQL. Así que para que la web funcione correctamente, se ha de importar la base de datos, en un manager como PHPMyAdmin se hace des del siguiente apartado:

![Importar Base de Datos](http://bernatixer.com/TDR/img/importar.png)

Después hace falta editar la conexión a la base de datos, que se encuentra en el archivo **config.php**
```php
<?php
session_start();
mysql_connect('IP', 'USUARIO', 'CONTRASEÑA');
mysql_select_db('BASE_DE_DATOS');
?>
```
Una vez hechos todos estos pasos la web ya se puede poner en marcha.

# Español

