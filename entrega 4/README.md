# Entrega 4
Los archivos json se encuentran enla carpeta **json_data**
La base de datos está en la carpeta **mongodb_database**, cuando usen mongo córranlo sobre esa carpeta.

Si se desea implementar la API localmente, seguir las instrucciones.

1. En mongo se debe realizar lo siguiente:

`> use data`

`> db.createCollection("messages")`

`> db.createCollection("users")`

2. Una vez cargados los .json (ver actividad mongo)

`> db.messages.createIndex({"message": "text"})`

3. Ahora podemos ejecutar nuestro main.py
Luego accedemos a los path mediante:
url: http://localhost:8080/#function#/#input#

Donde:
+ **#function#**: es la función de la API.
+ **#input#**: los parametros que recibe la función.


## Desarrollo de la API
|  | quien | lista? | comentario |
|:----------:|:-------:|:------:|:----------:|
| consulta 1 | javier | si | - |
| consulta 2 | javier | si | - |
| consulta 3 | octavio | si | - |
| búsqueda 1/2/3 | javier y octavio | si | - |

## Dessarrollo de las variables de entorno
| install | quien | listo? | comentario |
|:-------:|:--------:|:----:|:--------------------------:|
| python | octavio | si | ejecutar codigo: `> python3 file` |
| mongo | octavio | si | poblado con jsons y index |
| flask | octavio | ? |	- |


