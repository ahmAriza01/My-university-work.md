# 🔎 Github
----------------
## Guía para Crear una Cuenta en GitHub y tu Primer Repositorio

#### 1. Crear una Cuenta en GitHub

Sigue estos pasos para registrarte en GitHub:

1. **Visita el sitio web**: Ve a [GitHub](https://github.com).
2. **Registrarte**: Haz clic en **"Sign up"** en la parte superior derecha.
3. **Completa la información**: Rellena tu nombre de usuario, correo electrónico y una contraseña segura.
4. **Verificación**: GitHub te pedirá verificar tu cuenta. Realiza el proceso de verificación, ya sea a través de un correo electrónico o captchas.
5. **Selecciona tu plan**: Escoge el plan que prefieras, ya sea gratuito o de pago (el plan gratuito es suficiente para empezar).
6. **Confirmación por correo**: GitHub enviará un correo de confirmación. Haz clic en el enlace para verificar tu dirección de correo electrónico.
7. **Configuración adicional**: Completa las opciones adicionales según prefieras (personalización de tu perfil, intereses, etc.).
8. **Listo**: Ahora ya tienes una cuenta en GitHub.

#### 2. Crear tu Primer Repositorio

Sigue estos pasos para crear un repositorio en GitHub:

1. **Iniciar sesión**: Inicia sesión con tu cuenta de GitHub.
2. **Crear repositorio**:
   - En la parte superior derecha, haz clic en el icono de tu perfil y selecciona **"Your repositories"**.
   - Haz clic en **"New"** para crear un nuevo repositorio.

   ![creator-new](./imgs/createnew.png)

3. **Configura el repositorio**:
   - **Nombre del repositorio**: Elige un nombre para tu repositorio.
   - **Descripción (opcional)**: Escribe una breve descripción de lo que contiene tu repositorio.
   - **Visibilidad**: Puedes seleccionar entre **"Public"** (público) o **"Private"** (privado).
   - **Inicializar el repositorio**: Puedes seleccionar **"Initialize this repository with a README"** si deseas agregar un archivo README automáticamente.

![Repositorio](./imgs/reapositoriocreate.png)

4. **Crear repositorio**: Haz clic en **"Create repository"**.

![Create](./imgs/image.png)

### Desde la Web

1. En la página de tu repositorio, haz clic en **"Add file"** y selecciona **"Upload files"**.
2. Arrastra y suelta los archivos o selecciona los archivos desde tu computadora.
3. Después de subir los archivos, haz clic en **"Commit changes"** para guardarlos.

### Desde la Terminal (usando Git)

1. Abre una terminal en tu computadora.
2. Navega a la carpeta de tu proyecto usando el comando `cd`.
3. Ejecuta estos comandos para subir tus archivos:

   ```bash
   git init
   git remote add origin https://github.com/TuUsuario/TuRepositorio.git
   git add .
   git commit -m "Mi primer commit"
   git push -u origin master
   ```
---------

## 📄 Guía para Crear y Publicar una Página Web en GitHub Pages

### 1️⃣ Crear un Repositorio en GitHub

1. Inicia sesión en [GitHub](https://github.com).
2. Haz clic en el ícono de tu perfil y selecciona **"Your repositories"**.
3. Haz clic en **"New"** para crear un nuevo repositorio.
4. Configura tu repositorio:
   - **Nombre del repositorio**: Debe ser **único** y sin espacios, por ejemplo: `mi-pagina-web`.
   - **Descripción** (opcional): Agrega una breve descripción del proyecto.
   - **Visibilidad**: Puedes elegir **Público** o **Privado** (si es privado, solo tú podrás verlo).
   - Marca la casilla **"Initialize this repository with a README"**.
5. Haz clic en **"Create repository"**.

---

### 2️⃣ Crear los Archivos de tu Página Web

Para que GitHub Pages funcione, necesitas al menos un archivo `index.html`.

1. En tu repositorio de GitHub, haz clic en **"Add file"** y selecciona **"Create new file"**.
2. Nombra el archivo como `index.html`.
3. Agrega el siguiente código HTML básico:

   ```html
   <!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Mi Página Web</title>
   </head>
   <body>
       <h1>¡Hola, mundo!</h1>
       <p>Esta es mi primera página web publicada con GitHub Pages.</p>
   </body>
   </html>

4. Desplázate hacia abajo y escribe un mensaje en Commit new file, luego haz clic en "Commit changes".

------
### 3️⃣ Activar GitHub Pages
Ve a la sección "Settings" de tu repositorio.

En el menú lateral izquierdo, selecciona "Pages".

En la sección "Branch", selecciona main o la rama donde subiste tu código.

Haz clic en "Save".

GitHub generará un enlace donde podrás acceder a tu sitio web. La URL será algo como:

    https://tu-usuario.github.io/mi-pagina-web/

### 4️⃣  Opcional: Subir Archivos desde la Computadora con Git
 Si prefieres subir los archivos desde tu PC usando Git, sigue estos pasos:

1. Asegúrate de tener Git instalado. Puedes descargarlo desde git-scm.com.

2. Abre la terminal y navega a la carpeta de tu proyecto:

        cd ruta/de/tu/proyecto

3. Inicializa Git y vincula tu repositorio:

        git init
        git remote add origin https://github.com/TuUsuario/mi-pagina-web.git

4. Agrega y sube los archivos:

        git add .
        git commit -m "Subiendo mi página web"
        git push -u origin main

---------

## Pagina creada para Portafolio de proyectos.

[Portafolio de proyectos](https://akeno075.github.io) : En este repositorio se creo un portafolio en donde se subiran los trabajos y creaciones para vista del publico interesado en los temas de prgramacion, microcontroladores y temas de redes y telecomunicaciones.

##### 💡 Autor: [Juan Pablo Gonzalez Gasca]
##### 📆 Última actualización: [28/Marzo/2025]

