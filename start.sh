#!/bin/bash

# 1. Limpiar cualquier caché atascada
echo "Limpiando caché de configuración..."
php artisan config:clear
php artisan cache:clear

# 2. Ejecutar las migraciones y sembrar la base de datos
echo "Ejecutando migraciones..."
php artisan migrate:fresh --seed --force

# 3. Iniciar el servidor Apache
echo "Iniciando servidor web..."
apache2-foreground