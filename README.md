# Proyecto-Final-ASIR

# Sistema de Copias de Seguridad Web para Bases de Datos

**Una herramienta sencilla para gestionar tus backups sin usar comandos.**

## Descripción
[cite_start]Este proyecto es un sistema que realiza copias de seguridad (backups) automáticas de tus bases de datos y te permite restaurarlas cuando lo necesites[cite: 5]. [cite_start]Todo se maneja desde una página web fácil de usar, diseñada para facilitar la administración y evitar la pérdida de datos por errores manuales[cite: 6, 7].

[cite_start]El sistema está empaquetado en contenedores Docker, lo que hace que sea muy fácil de instalar y ejecutar en cualquier servidor[cite: 27].

## Funcionalidades
* [cite_start]**Compatible con varias bases de datos:** Funciona con PostgreSQL y MySQL/MariaDB[cite: 18, 19].
* [cite_start]**Panel Web:** Interfaz gráfica para ver el estado de las copias, programar tareas y restaurar datos[cite: 6, 20].
* [cite_start]**Seguridad:** Las copias se guardan cifradas para proteger la información[cite: 22].
* [cite_start]**Restauración fácil:** Puedes elegir una copia antigua y restaurarla con pocos clics[cite: 21, 46].
* [cite_start]**Monitorización:** Incluye gráficas (Grafana) para ver si las copias se hicieron bien o si hubo fallos[cite: 26].

## Cómo usarlo

### Instalación rápida
[cite_start]Como el proyecto usa Docker, solo necesitas tener Docker y Docker Compose instalados[cite: 29, 61].

1.  **Descarga el proyecto:**
    ```bash
    git clone [https://github.com/tu-usuario/tu-repositorio.git](https://github.com/tu-usuario/tu-repositorio.git)
    ```
2.  **Arranca el sistema:**
    ```bash
    docker-compose up -d
    ```
3.  **Accede a la web:**
    [cite_start]Abre tu navegador (Chrome o Firefox) y entra en `http://localhost`[cite: 59].

### Pasos básicos
1.  [cite_start]Inicia sesión con tu usuario y contraseña[cite: 41].
2.  En el panel principal verás tus bases de datos registradas.
3.  [cite_start]Ve a la sección de **Backups** para programar cada cuánto quieres que se haga una copia[cite: 44].
4.  [cite_start]Si necesitas recuperar datos, ve a **Historial**, elige la copia y pulsa "Restaurar"[cite: 45, 46].

## ¿Necesitas ayuda?
Si tienes problemas para instalarlo o encuentras un error:
* Revisa la documentación incluida en la carpeta `docs/` del proyecto.
* Abre un **Issue** en este repositorio explicando qué falla.

## Autor
* **Pablo Oliva** - *Creador y desarrollador del proyecto*
