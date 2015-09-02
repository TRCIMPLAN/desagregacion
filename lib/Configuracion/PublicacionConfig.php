<?php
/**
 * TrcIMPLAN Central - Publicacion Config
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

namespace Configuracion;

/**
 * Clase PublicacionConfig
 */
class PublicacionConfig {

    public $sitio_url                 = 'http://www.trcimplan.gob.mx/desagregacion'; // Sin diagonal al final
    public $fecha                     = '1980-01-01T08:00';                          // La fecha en forma de YYYY-MM-DDTHH:MM, siendo así se ordena cronológicamente
    public $autor                     = 'IMPLAN Torreón Staff';                      // El nombre o apodo a quien se le atribuye
    public $aparece_en_pagina_inicial = true;                                        // Si es verdadero va aparecer en la página de inicio
    public $para_compartir            = true;                                        // Si es verdadero pondrá los botones para compartir en Twitter/Facebook
    public $imagen                    = '../imagenes/imagen.jpg';                    // Ruta relativa a un archivo de imagen
    public $imagen_previa             = '../imagenes/imagen-previa.jpg';             // Ruta relativa a un archivo de imagen para la vista previa
    public $icono                     = '';                                          // Nombre del icono Font Awsome
    public $estado                    = 'publicar';                                  // El estado ordena a Imprenta e Índice si debe 'publicar', 'revisar' o 'ignorar'
    public $include_extra_directorio  = '';                                          // Ruta donde habrá archivos HTML para cargar como el extra de SchemaThing

} // Clase PublicacionConfig

?>
