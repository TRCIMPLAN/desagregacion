<?php
/**
 * TrcIMPLAN Central - Plantilla Config
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
 * Clase PlantillaConfig
 */
class PlantillaConfig {

    public $sitio_titulo     = 'IMPLAN Torreón - Desagregación';
    public $sitio_url        = 'http://www.trcimplan.gob.mx/desagregacion'; // Sin diagonal al final
    public $rss              = 'rss.xml';
    public $favicon          = 'imagenes/favicon.png';
    public $propio_css       = 'css/trcimplan.css';
    public $en_raiz          = false;             // Si es verdadero los vínculos serán para un archivo en la raíz del sitio
    public $para_compartir   = true;              // Si es verdadero pondrá los metas para tarjetas en Twitter/Facebook
    public $autor            = 'TrcIMPLAN Staff'; // Autor por defecto
    public $mensaje_oculto   = <<<FINAL
<!-- ===========================================================================================

        Instituto Municipal de Planeación y Competitividad de Torreón.

        Este sistema fue elaborado por personal del IMPLAN Torreón.
        El software que lo construye está bajo la licencia GPL versión 3. © 2014, 2015.
          Una copia está contenida en el archivo LICENCE al bajar desde GitHub.
        Al usarlo está aceptando los términos de uso de la información y del sitio web:
          http://trcimplan.gob.mx/terminos/terminos-informacion.html
          http://trcimplan.gob.mx/terminos/terminos-sitio.html
        Agradecemos y compartimos las tecnologías abiertas y gratuitas sobre las que se basa:
          Twitter Bootstrap    http://getbootstrap.com
          StartBootStrap       http://startbootstrap.com
          Morris.js            https://morrisjs.github.io/morris.js/
          LeafLet              http://leafletjs.com
          CartoDB              http://cartodb.com
        Descargue, aprenda y colabore con el software del IMPLAN Torreón por medio de GitHub:
          GitHub               https://github.com/TRCIMPLAN

     =========================================================================================== -->
FINAL;
    public $pie                       = '  <p>Lea los términos de <a href="http://trcimplan.gob.mx/terminos/terminos-informacion.html">uso de la información</a> y del <a href="http://trcimplan.gob.mx/terminos/terminos-sitio.html">sitio web</a>. Instituto Municipal de Planeación y Competitividad de Torreón. 2015.</p>';
    public $google_analytics          = '';
 // public $cabecera_bootstrap_css    = '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">';
 // public $cabecera_font_awesome_css = '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">';
    public $cabecera_google_fonts_css = '<link href="http://fonts.googleapis.com/css?family=Questrial|Roboto+Condensed:400,700" rel="stylesheet" type="text/css">';
    public $scripts_jquery_css        = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';
 // public $scripts_bootstrap_js      = '<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>';

} // Clase PlantillaConfig

?>
