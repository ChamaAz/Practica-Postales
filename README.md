# 📧 Aplicación de Envío Automático de Correos a Clientes

Aplicación web desarrollada en **PHP** para enviar correos electrónicos de manera automática a los clientes de una empresa.  
Permite **informar sobre novedades**, **felicitar cumpleaños** o **enviar mensajes de Navidad**, incluyendo imágenes y contenido HTML personalizado.

---

## 🎯 Objetivos del proyecto

1. Facilitar el envío de correos personalizados a clientes de manera automatizada.  
2. Permitir **incluir imágenes y contenido HTML** para mejorar la presentación del mensaje.  
3. Permitir seleccionar **uno o varios destinatarios**.  
4. Gestionar los envíos desde una **interfaz web sencilla e intuitiva**.  
5. Practicar **uso de formularios, PHP y correo electrónico (mail)** en aplicaciones web.  

---

## 🛠 Funcionalidades

### 1️⃣ Página de diseño del correo
- Selección de **tema** del correo (ej: novedades, cumpleaños, Navidad).  
- Visualización de **imágenes relacionadas** con el tema.  
- Lista desplegable de clientes (o selección múltiple de destinatarios).  
- Selección de **una o varias imágenes** para incluir en el correo.  
- Área de texto para el cuerpo del mensaje (opcional).  

### 2️⃣ Script de envío de correo
- Recoge la información del formulario.  
- Genera el **correo con formato HTML**, incluyendo texto e imágenes seleccionadas.  
- Envía el correo a los destinatarios seleccionados.  
- Muestra una **página de confirmación** con el resultado del envío y enlace a la página inicial.  

### 3️⃣ Funcionalidad avanzada
- Posibilidad de enviar el mismo correo a **varios destinatarios** seleccionados.  
- Verificación de que se ha seleccionado al menos un destinatario y opcionalmente imágenes o texto.  

---

## ⚡ Tecnologías usadas

- **Backend:** PHP  
- **Base de datos:** PHPMyAdmin  
- **Frontend:** HTML5, CSS3  
- **Servidor local:** XAMPP   
- **Correo electrónico:** Función `mail()` de PHP o librerías como PHPMailer  

---

## 🚀 Cómo ejecutar la aplicación

1. Clonar el repositorio:

```bash
git clone https://github.com/ChamaAz/Practica-Postales.git
