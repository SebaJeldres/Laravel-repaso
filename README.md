# Laravel-repaso
mini proyecto laravel para repasar contenido

1- instalamos composer y creamos en proyecto en laravel
2- cree una copia del .env, además de crear la base de datos en PhpMyAdmin
3- conecte la base de datos con mi proyecto en el .env
4- use "php artisan make:model Boleta -mcr" para crear el modelo, migracion y controlador
5- en la migración que esta en la carpeta "database", modique la función up() para añadir campos a las boletas
6- use php artisan migrate para subir la migración a la BD
7- Configure el modelo de la boleta, añadiendo los campos y usando protected $fillable
8- Modifique en controlador del crud de las boletas editando index, create, store, edit, update y destroy. En las funciones de 
   store, update use $request->validate para validar los campos y $request->only([]) con los campos del modelo, principalmente para solo añadir, editar los datos que seleccione
9- modifique la ruta default de laravel en web.php para dirigir a mi index principal
10- añadi la ruta a mi controlador 'Route::resource('boletas', BoletaController::class);'
11- Cree las vistas del proyecto 
12- inicie el proyecto con php artisan serve
13- corregi los errores.