# Sistema Integrado de Registro y Consulta de Becas 🎓
### Práctica Final Integradora - Formularios + Bases de Datos (INDEL)

---

## 👤 Información del Estudiante
* **Nombre Completo:** Marjory Lizbeth Lima Lima
* **Código de Estudiante:** [10266464]
* **Especialidad:** Bachillerato Técnico Vocacional en Desarrollo de Software

---

## 📸 Capturas de Pantalla (Datos Reales)

### 1. Módulo de Registro (C# - Escritorio)
Interfaz de usuario en Windows Forms mostrando la inserción y validación de datos en tiempo real antes de guardarse en SQL Server.
![Formulario de Registro C#](c:\xampp\htdocs\img/formulario_csharp.png)

---

### 2. Módulo de Consulta (PHP - Web)
Búsqueda y despliegue dinámico de la información del aspirante mediante su número de DUI, consultando en la base de datos MySQL.
![Consulta de Becas en PHP](c:\xampp\htdocs\img/consulta_php.png)

### 3. Activación de Servicios Locales
Uso del panel de control de XAMPP para levantar los módulos de Apache (Servidor Web) y MySQL (Base de Datos) necesarios para el entorno PHP.
![Servicios de XAMPP Activos](c:\xampp\htdocs\img/xampp_activo.png)

---

### 4. Estructura de Archivos en el IDE
Organización del espacio de trabajo dentro de Visual Studio Code, mostrando una arquitectura limpia con los archivos de conexión y de búsqueda en la misma raíz del proyecto.
![Estructura del Proyecto en VS Code](c:\xampp\htdocs\img/conexion_vstudio.png)
---

## ⚙️ Guía de Instalación y Ejecución (Para el Docente)

Para ejecutar correctamente este proyecto en su entorno local, asegúrese de contar con los siguientes requisitos técnicos e instrucciones:

### Versiones del Entorno
* **.NET:** .NET 6.0 / 8.0 (Windows Forms) con el paquete NuGet `System.Data.SqlClient` instalado.
* **Microsoft SQL Server:** SQL Server 2022 / LocalDB.
* **PHP:** PHP 8.1 / 8.2 (vía XAMPP).
* **MySQL:** MySQL 8.0 / MariaDB (vía XAMPP/phpMyAdmin).

### Pasos para Configurar C# (Módulo de Registro)
1. Abra **SQL Server Management Studio (SSMS)** y conéctese a su servidor local.
2. Ejecute el script provisto en la práctica para crear la base de datos `BecasMunicipioDB` y sus respectivas tablas (`tipos_beca` y `aspirantes`).
3. Abra la solución en **Visual Studio**, verifique que el string de conexión (`conString`) en el archivo `Form1.cs` coincida con el nombre de su instancia local de SQL Server.
4. Presione **F5** para compilar y ejecutar la aplicación de escritorio.

### Pasos para Configurar PHP (Módulo de Consulta Web)
1. Abra el panel de control de **XAMPP** e inicie los servicios de **Apache** y **MySQL**.
2. Mueva la carpeta `becas_marjory` hacia la ruta raíz del servidor web: `C:\xampp\htdocs\`.
3. Acceda a `http://localhost/phpmyadmin/`, cree una base de datos llamada `AlcaldiaBecasDB` y ejecute el script SQL web correspondiente (creación de tablas e inserción de tipos de beca).
4. Abra su navegador e ingrese a la siguiente URL para ejecutar la aplicación:  
   `http://localhost/becas_marjory/buscar.php`

---

## 📝 Datos de Prueba Sugeridos

Para evaluar el funcionamiento y las validaciones de búsqueda en el portal web (PHP), puede utilizar cualquiera de los siguientes 3 registros ficticios pre-cargados en la base de datos de MySQL:

1. **Aspirante 1:**
   * **DUI:** `01234567-8`
   * **Nombre:** Marjory Alvarado
   * **Promedio:** 9.50
   * **Tipo de Beca:** Universitaria

2. **Aspirante 2:**
   * **DUI:** `02468135-7`
   * **Nombre:** Carlos Eduardo Mendoza
   * **Promedio:** 8.75
   * **Tipo de Beca:** Técnica

3. **Aspirante 3:**
   * **DUI:** `09876543-2`
   * **Nombre:** Ana Beatriz Portillo
   * **Promedio:** 9.90
   * **Tipo de Beca:** Excelencia

---

## 🧠 Lo que Aprendí (Comparativa de Enfoques)

El desarrollo de esta práctica final me permitió experimentar y comprender las diferencias fundamentales entre el desarrollo de aplicaciones de escritorio y aplicaciones web:

* **Enfoque de Escritorio (C# + SQL Server):** Aprendí que las aplicaciones WinForms son excelentes para entornos cerrados o administrativos donde se requiere un control estricto del hardware y validaciones locales robustas antes de impactar el servidor de base de datos. La persistencia con SQL Server mediante ADO.NET es sumamente estructurada, segura y eficiente para la manipulación de datos masivos dentro de una red empresarial.
* **Enfoque Web (PHP + MySQL):** Experimenté la versatilidad de la web. PHP me enseñó cómo estructurar consultas dinámicas basándome en peticiones HTTP (`POST`) y cómo interactuar con motores más ligeros como MySQL mediante sentencias preparadas para evitar inyecciones SQL. Este enfoque es ideal para la descentralización de la información, permitiendo que cualquier ciudadano o docente consulte los datos desde cualquier dispositivo con solo tener un navegador.

**Conclusión:** Ambos entornos no compiten, sino que se complementan. Mientras C# garantiza una interfaz robusta de digitación y seguridad local, PHP ofrece accesibilidad global y ligereza para el usuario final.