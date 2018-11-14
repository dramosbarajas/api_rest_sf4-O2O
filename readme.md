# Api Rest Symfony4, Guzzle.
## Introducción 
Creación de un Api Rest en Symfony 4 que realiza llamadas a un servicio web externo, procesa la respuesta de la llamada y devuelve los datos en formato **JSON** para que sean pintados en una vista bajo el motor de plantillas **TWIG**. 
### Tecnología
* PHP (Symfony 4.1) 
* Bootstrap 4
## Desarrollo 
### Rutas 

**/app | GET** -> Carga la plantilla de inicio de la app para seleccionar entre búsqueda por receta o por ingredientes. 

![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/app.png)

**/recipes/keyword/| GET** -> Retorna la vista para la búsqueda de recetas por palabra clave.

![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/recetas.png)

**/recipes/ingredients/| GET** -> Retorna la vista para la búsqueda de recetas por una cadena de ingredientes separados por comas.

![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/ingredientes.png)

**/recipes/keyword/| POST** -> Recibe un parámetro, en este caso un string con el nombre de la receta que deseamos buscar, compone la llamada a un API externo, procesa la respuesta y la devuelve en una vista.

![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/responseReci.png)
![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/recipesPostman.png)
**/recipes/ingredients /| POST** -> Recibe un parámetro, en este caso una cadena de ingredientes, cada ingrediente separado por una coma, compone la llamada a un API externo, procesa la respuesta y la devuelve en una vista.

![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/responseIngre.png)
![alt text](https://raw.githubusercontent.com/dramosbarajas/api_rest_sf4-O2O/master/images/ingredientsPostman.png)

David Ramos

