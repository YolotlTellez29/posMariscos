# POS Mariscos

Este proyecto es un sistema de Punto de Venta (POS) para un restaurante de mariscos. Incluye un frontend web para la gestión de mesas, órdenes y productos, y un backend en PHP con conexión a base de datos MySQL.

## Estructura del Proyecto

- `frontend/`: Archivos del cliente web (HTML, CSS, imágenes).
- `backend/`: API en PHP, configuración y scripts de base de datos.
- `vendor/`: Dependencias PHP instaladas con Composer.

## Requisitos

- **PHP >= 7.2.5**
- **MySQL/MariaDB**
- **Composer** (para gestionar dependencias PHP)
- Navegador web moderno

### En Linux

Instala los requisitos con:

```sh
sudo apt update
sudo apt install php php-mysql mysql-server composer
```

### En Windows

- Instala [XAMPP](https://www.apachefriends.org/es/index.html) o [WAMP](https://www.wampserver.com/).
- Instala [Composer](https://getcomposer.org/).

## Configuración Inicial

1. **Clona el repositorio:**

   ```sh
   git clone https://github.com/YolotlTellez29/posMariscos.git
   cd posMariscos
   ```

2. **Instala las dependencias PHP:**

   ```sh
   composer install
   ```

3. **Crea tu archivo `.env` en la carpeta `backend/`:**

   Copia el ejemplo y edítalo con tus datos de conexión:

   ```
   DB_HOST=localhost
   DB_NAME=mariscos_db
   DB_USER=usuario
   DB_PASS=contraseña
   ```

   > **Nota:** El archivo `.env` está en `.gitignore` y no debe subirse al repositorio.

4. **Crea la base de datos:**

   - Ingresa a MySQL y ejecuta el script `init.sql`:

     ```sh
     mysql -u tu_usuario -p < backend/init.sql
     ```

   - O usa phpMyAdmin para importar el archivo.

## Uso del Proyecto

- El frontend se encuentra en `frontend/Mesas y ordenes.html`.
- El backend expone endpoints en `backend/api/`.
- Para desarrollo local, puedes usar XAMPP/WAMP o el servidor embebido de PHP:

  ```sh
  cd backend
  php -S localhost:8000
  ```

  Luego abre el frontend en tu navegador.

## Colaboración

1. **Haz un fork** del repositorio y clónalo en tu máquina.
2. **Crea una rama** para tus cambios:

   ```sh
   git checkout -b mi-nueva-funcionalidad
   ```

3. **Haz tus cambios y súbelos**:

   ```sh
   git add .
   git commit -m "Descripción de los cambios"
   git push origin mi-nueva-funcionalidad
   ```

4. **Haz un Pull Request** para revisión.

## Buenas Prácticas

- No subas archivos sensibles como `.env`.
- Documenta tus funciones y cambios.
- Usa ramas para nuevas funcionalidades o correcciones.
- Haz pruebas antes de subir cambios.

## Contacto

Para dudas o soporte, contacta al administrador del repositorio o usa el sistema de issues de GitHub.

---

¡Bienvenido al sistema POS Mariscos!