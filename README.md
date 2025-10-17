# Laravel-repaso

Mini proyecto en Laravel para repasar conceptos básicos (modelo, migración, controlador, rutas y vistas).

## Requisitos
- PHP >= 8.0
- Composer
- MySQL (o MariaDB)
- Node.js / npm (opcional para assets)

## Instalación rápida
1. Crear el proyecto Laravel (si no se creó con Composer aún):
   - composer create-project laravel/laravel nombre_proyecto
2. Copiar el archivo de entorno y configurar la base de datos:
   - cp .env.example .env
   - Editar `.env` y ajustar DB_DATABASE, DB_USERNAME, DB_PASSWORD
3. Instalar dependencias y generar clave:
   - composer install
   - php artisan key:generate

## Flujo de trabajo del mini proyecto (Boletas)
1. Crear modelo, controlador y migración:
   - php artisan make:model Boleta -mcr
2. Editar la migración en `database/migrations/...`:
   - Modificar la función `up()` para añadir los campos necesarios a la tabla `boletas`.
3. Ejecutar migraciones:
   - php artisan migrate
4. Configurar el modelo `Boleta`:
   - Añadir `protected $fillable = ['campo1','campo2', ...];`
5. Implementar el CRUD en el controlador generado (`BoletaController`):
   - Completar métodos: `index`, `create`, `store`, `edit`, `update`, `destroy`.
   - En `store` y `update` usar validación: `$request->validate([...])`.
   - Usar `$request->only(['campo1','campo2', ...])` para asignar solo los campos permitidos.
6. Rutas:
   - Ajustar la ruta por defecto en `routes/web.php` si se desea cambiar la página de inicio.
   - Añadir la ruta resource para el CRUD:
     - Route::resource('boletas', BoletaController::class);
7. Vistas:
   - Crear las vistas necesarias en `resources/views/boletas` (`index.blade.php`, `create.blade.php`, `edit.blade.php`, etc.).
8. Levantar el servidor de desarrollo:
   - php artisan serve

## Ejemplo breve de validación (en el controlador)
- En `store` o `update`:
```php
$request->validate([
    'titulo' => 'required|string|max:255',
    'monto'  => 'required|numeric',
    // ...
]);

$data = $request->only(['titulo','monto' /*, ... */]);
Boleta::create($data);
```

## Notas finales
- Revisar logs si aparecen errores: `storage/logs/laravel.log`.
- Probar las rutas con el navegador o herramientas como Postman.
- Ajustar permisos si hay problemas con migraciones o almacenamiento.