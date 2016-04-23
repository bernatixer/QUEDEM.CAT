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


