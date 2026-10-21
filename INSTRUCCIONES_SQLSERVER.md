# Pasos Iniciales para Nuevos Desarrollos sobre esta Base (Plantilla Innovación)

¡Hola, yo mismo (IA) del futuro o Desarrollador! 👋

Si estás clonando o arrancando un nuevo proyecto partiendo de esta plantilla de **newproyect2026**, aquí están las instrucciones clave que **debes** ejecutar primero para levantar correctamente el ambiente, en especial la conectividad hacia bases de datos Microsoft SQL Server.

## 1. Conexión de Base de Datos (SQL Server)

Esta plantilla está optimizada para conectarse a **SQL Server (`sqlsrv`)**, no a MySQL por defecto.
Asegúrate de que los drivers ODBC de Microsoft y las extensiones de PHP para SQL Server estén activos en tu sistema local y configurados en PHP.

### Extensiones PHP requeridas:
Debes tener activos los siguientes `.ini` en tu configuración local del servicio (por ejemplo, en el MAMP / Homebrew):
- `ext-sqlsrv.ini`
- `ext-pdo_sqlsrv.ini`

### Configuración en `.env` a revisar/modificar obligatoriamente:
```env
DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1      # IP o Servidor de tu base de datos
DB_PORT=1433           # Puerto (p. ej: 1433)
DB_DATABASE=nombre_bd  # El nombre de tu base de datos de desarrollo
DB_USERNAME=tu_usuario # El usuario SA u otro de tu entorno SQL
DB_PASSWORD=tu_pass    # La contraseña
```

---

## 2. Puesta a punto de la Aplicación

Una vez clonado el repo, y verificado que el servicio MSSQL y tu PHP estén compatibles, corre los comandos obligatorios:

```bash
# 1. Instalar dependencias backend
composer install

# 2. Copiar variables de entorno
cp .env.example .env

# 3. Generar la key de Laravel (Super importante para el auth de Azure)
php artisan key:generate

# 4. Limpiar caché global
php artisan optimize:clear

# 5. Instalar y compilar el frontend (React/Tailwind) en modo desarrollo
npm install
npm run build # o `npm run dev` para escuchar cambios.

# 6. Ejecutar migraciones (Con el SQL Server ya levantado)
php artisan migrate
```

## 3. Consideraciones Especiales 

* **Login de Azure**: La aplicación ya está asegurada mediante `Socialite` para `azure` en `routes/web.php`. Incluye `->stateless()` para envitar excepciones de estado al iniciar sesión en el localhost o servidores de pruebas internos.
* **Aspecto visual (Diseño Premium Premium)**: La vista base `login.blade.php` ya está optimizada con `Tailwind CSS 4.0` vía `Vite` y un SVG de 'subtle-prisms' de fondo. Usa esta misma línea moderna de diseño. No debes sobreescribir este auth al momento de iniciar nuevos paneles.
* **Espacio de Trabajo**: Empieza a desarrollar el dashboard apuntando a `routes/web.php` linea: `Route::get('/dashboard', ...)`
