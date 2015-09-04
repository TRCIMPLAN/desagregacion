<?php
/**
 * TrcIMPLAN Desagregación - Página Inicial
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

namespace PaginaInicial;
use Base\Plantilla;
use Base\Navegacion;

/**
 * Clase PaginaInicial
 */
class PaginaInicial extends Plantilla {

    // public $sitio_titulo;
    // public $sitio_url;
    // public $rss;
    // public $favicon;
    // public $propio_css;
    // public $en_raiz;
    // public $para_compartir;
    // public $autor;
    // public $mensaje_oculto;
    // public $pie;
    // public $titulo;
    // public $descripcion;
    // public $claves;
    // public $directorio;
    // public $archivo_ruta;
    // public $imagen_previa_ruta;
    // public $icono;
    // public $navegacion;
    // public $contenido;
    // public $mapa_inferior;
    // public $javascript;
    // public $contenido_en_renglon;
    // public $google_site_verification;

    /**
     * Constructor
     */
    public function __construct() {
        // Propiedades para la página inicial
        $this->en_raiz              = true;
        $this->titulo               = 'IMPLAN Torreón - Desagregación';
        $this->descripcion          = 'Órgano técnico responsable de la planeación del desarrollo del municipio de Torreón cuyas propuestas de política tienen una orientación territorial.';
        $this->claves               = 'IMPLAN, Torreon, Gomez Palacio, Lerdo, Matamoros, La Laguna';
        $this->directorio           = '.';
        $this->archivo_ruta         = "index.html";
        $this->imagen_previa_ruta   = 'imagenes/imagen-previa.jpg';
        $this->contenido_en_renglon = false;
        // Navegación
        $this->navegacion           = new Navegacion();
        $this->navegacion->en_raiz  = true;
    } // constructor

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Elaborar sección Organización
        $organizacion       = new Organizacion();
        $this->contenido[]  = $organizacion->html();
        $this->javascript[] = $organizacion->javascript();
        // Elaborar sección Destacado
        $destacado          = new Destacado();
        $this->contenido[]  = $destacado->html();
        $this->javascript[] = $destacado->javascript();
        // Elaborar sección redes
        $redes              = new Redes();
        $this->contenido[]  = $redes->html();
        $this->javascript[] = $redes->javascript();
        // Entregar resultado del método en el padre
        return parent::html();
    } // html

} // Clase PaginaInicial

?>
