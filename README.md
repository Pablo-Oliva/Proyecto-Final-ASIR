# Proyecto-Final-ASIR

### Infraestructura Web Escalable en AWS con Repositorio de Scripts

> Un entorno cloud de alta disponibilidad y tolerante a fallos para guardar, clasificar y compartir tus comandos de administración de sistemas.

## Descripción

Este proyecto es el resultado de mi Trabajo Final del ciclo de Administración de Sistemas Informáticos en Red (ASIR). Consiste en el diseño y despliegue de una arquitectura de red completa y segura en Amazon Web Services (AWS), simulando un entorno empresarial real que necesita estar disponible 24/7.

Sobre esta infraestructura se ejecuta una aplicación web dinámica (un repositorio de comandos) donde los usuarios pueden registrarse y guardar sus scripts favoritos. Toda la aplicación está empaquetada en contenedores Docker, y el tráfico es gestionado por un balanceador de carga inteligente que crea o destruye servidores automáticamente según la cantidad de usuarios que entren a la web.

## Funcionalidades

* **Alta Disponibilidad y Autoescalado:** Gracias al uso de Application Load Balancer (ALB) y Auto Scaling Groups en AWS, el sistema aguanta picos masivos de tráfico creando nuevos servidores web de forma automática.
* **Seguridad Perimetral (VPC):** El corazón del proyecto (la base de datos) está totalmente aislado en una subred privada. Es imposible acceder a los datos directamente desde internet.
* **Aplicación Contenerizada:** La web (programada en PHP) funciona dentro de contenedores Docker, lo que garantiza que la aplicación se ejecute igual en cualquier máquina sin problemas de compatibilidad.
* **Gestor de Scripts:** Interfaz web sencilla para registrar usuarios, guardar comandos de terminal, asignarlos a categorías (Linux, AWS, Redes) y decidir si son privados o públicos.
* **Auditoría de Balanceo:** La aplicación incluye un sistema interno de logs que registra la IP privada del servidor que atiende cada petición, demostrando gráficamente cómo el balanceador reparte el tráfico de red.

## Tecnologías Utilizadas

* **Cloud:** Amazon Web Services (VPC, EC2, NAT Gateway, ALB, Auto Scaling).
* **Sistemas y Virtualización:** Ubuntu Server 24.04 LTS, Docker Engine.
* **Desarrollo:** PHP, HTML/CSS.
* **Base de Datos:** MySQL (Relacional).

## Autor
* **Pablo Oliva Fernández** - *Creador y desarrollador del proyecto*
