<?php
/**
 * TrcIMPLAN Desagregación - Imprenta
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

namespace Desagregacion;

/**
 * Clase Imprenta
 */
class Imprenta extends \Base\ImprentaPublicaciones {

    /**
     * Constructor
     */
    public function __construct() {
        // Nombre del directorio dentro de /lib que contiene los archivos con las publicaciones
        $this->publicaciones_directorio = 'Desagregacion';
        // Los siguientes parámetros dan datos para el índice/galería que será creado
        $this->titulo                   = 'Desagregación';
        $this->descripcion              = 'Datos a nivel sector de la Ciudad de Torreón.';
        $this->claves                   = 'IMPLAN, Torreon';
        $this->encabezado_color         = '#646464';
        // Etiqueta de Navegación a poner activa
        $this->nombre_menu              = 'Desagregación';
        // Clase que concentrará a las publicaciones para hacer su propia página
        $this->concentrador             = 'Indice'; // Puede ser Indice (por defecto), Galeria o Tarjetas
        // La ruta al archivo con el índice/galería/tarjetas que será creado
        $this->directorio               = 'desagregacion';
        $this->archivo_ruta             = 'desagregacion/index.html';
    } // constructor

} // Clase Imprenta

?>
