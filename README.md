# Proyecto-Final-ASIR

# Sistema de Copias de Seguridad Web para Bases de Datos

**Una herramienta sencilla para gestionar tus backups sin usar comandos.**

## Descripción
Este proyecto es un sistema que realiza copias de seguridad (backups) automáticas de tus bases de datos y te permite restaurarlas cuando lo necesites[cite: 5]. [cite_start]Todo se maneja desde una página web fácil de usar, diseñada para facilitar la administración y evitar la pérdida de datos por errores manuales.

El sistema está empaquetado en contenedores Docker, lo que hace que sea muy fácil de instalar y ejecutar en cualquier servidor.

## Funcionalidades
**Compatible con varias bases de datos:** Funciona con PostgreSQL y MySQL/MariaDB.
**Panel Web:** Interfaz gráfica para ver el estado de las copias, programar tareas y restaurar datos.
**Seguridad:** Las copias se guardan cifradas para proteger la información.
**Restauración fácil:** Puedes elegir una copia antigua y restaurarla con pocos clics.
**Monitorización:** Incluye gráficas (Grafana) para ver si las copias se hicieron bien o si hubo fallos.

## Cómo usarlo

### Instalación rápida
Como el proyecto usa Docker, solo necesitas tener Docker y Docker Compose instalados.

1.  **Descarga el proyecto:**
    ```bash
    git clone [https://github.com/Pablo-Oliva/Proyecto-Final-ASIR](https://github.com/Pablo-Oliva/Proyecto-Final-ASIR)
    ```
2.  **Arranca el sistema:**
    ```bash
    docker-compose up -d
    ```
3.  **Accede a la web:**
    Abre tu navegador (Chrome o Firefox) y entra en `http://localhost`.

### Pasos básicos
1.  Inicia sesión con tu usuario y contraseña[cite: 41].
2.  En el panel principal verás tus bases de datos registradas.
3.  Ve a la sección de **Backups** para programar cada cuánto quieres que se haga una copia.
4.  Si necesitas recuperar datos, ve a **Historial**, elige la copia y pulsa "Restaurar".

## ¿Necesitas ayuda?
Si tienes problemas para instalarlo o encuentras un error:
* Revisa la documentación incluida en la carpeta `docs/` del proyecto.
* Abre un **Issue** en este repositorio explicando qué falla.

## Autor
* **Pablo Oliva** - *Creador y desarrollador del proyecto*
