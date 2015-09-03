<?php
/**
 * TrcIMPLAN Desagregación - Funciones
 *
 * Copyright (C) 2015 Guillermo Valdes Lozano
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package TrcIMPLAN
 */

// TODOS LOS CARACTERES SERAN UTF-8
mb_internal_encoding('utf-8');

// AUTOCARGADOR DE CLASES
spl_autoload_register(
    /**
     * Auto-cargador de Clases
     *
     * @param string Creación de la instancia
     */
    function ($className) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';
        require 'lib/'.$fileName;
    } // auto-cargador de clases
);

/*
        $fileName  = '';
        $namespace = '';
        // Si la ruta tiene ..\ al inicio
        if (strpos($className, '..\\') === 0) {
            // Se toma lo que está después del ..\
            $className = substr($className, 3);
            // Si hay un \ se separan los directorios del nombre del archivo
            if ($lastNsPos = strrpos($className, '\\')) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
            }
        } else {
            // No hay ..\ al inicio, se retira el \ al inicio si lo hubiera
            $className = ltrim($className, '\\');
            // Si hay un \ se separan los directorios del nombre del archivo
            if ($lastNsPos = strrpos($className, '\\')) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
            }
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';
        require 'lib/'.$fileName;
*/

?>
