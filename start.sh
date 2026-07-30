#!/bin/bash

# Ejecutar las migraciones y sembrar la base de datos
echo "Ejecutando migraciones..."
php artisan migrate:fresh --seed --force

# Iniciar el servidor Apache
echo "Iniciando servidor web..."
apache2-foreground