# 🚀 Guía para Crear una Cuenta en Oracle Cloud y Configuración de Servidores

---

## 📖 Creación de Cuenta en Oracle Cloud
Si ya te has registrado exitosamente en Oracle Cloud como estudiante, puedes omitir esta sección.

1. Ve a [Oracle Cloud](https://www.oracle.com/cloud/).
2. Haz clic en **Empieza Gratis** y selecciona la opción de registro para estudiantes, si es el caso.
3. Completa el formulario de inscripción con tus datos personales.
4. Verifica tu correo electrónico y confirma tu cuenta.
5. Accede al **Panel de Oracle Cloud** para gestionar tus servicios.

---

## 🗄️ Bases de Datos y Configuración en Servidores



### 📌 Hestia Control Panel
Para configurar tu nombre de dominio (`luisreylara.tech`) en **Hestia**, ejecuta los siguientes comandos como `root`:
```sh
cd /usr/local/hestia/bin/
v-change-sys-hostname luisreylara.tech
v-add-letsencrypt-host
```

### 📌 Hostinger
1. **Realizar el pago**.
2. **Cambiar el nombre del dominio**.

### 📌 Instalar Apache y PHP en una instancia de Ubuntu
(Pendiente de configuración adicional).

### 📌 DNS Propagator Checker
Herramienta para verificar la propagación de DNS.

### 📌 PHP
Para comprobar la creación de **phpMyAdmin**, ejecuta:
```sh
sed -i "/127.0.0.1/c\bind-address = 0.0.0.0" /etc/mysql/mysql.conf.d/mysqld.cnf
systemctl restart mysql.service
ss -tulpn | grep 0.0.0.0:3306 | wc -l
```

---



##### 💡 Autor: [Juan Pablo Gonzalez Gasca]
##### 📆 Última actualización: [28/Marzo/2025]
