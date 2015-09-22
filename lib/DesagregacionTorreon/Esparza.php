<?php
/**
 * TrcIMPLAN Desagreación
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

namespace DesagregacionTorreon;

/**
 * Clase Esparza
 */
class Esparza extends \Base\Publicacion {

    /**
     * Constructor
     */
    public function __construct() {
        // Título, autor y fecha
        $this->nombre          = 'Desagregación Esparza';
        $this->autor           = 'IMPLAN Torreón Staff';
        $this->fecha           = '2015-09-15T12:00';
        // El nombre del archivo a crear (obligatorio) y rutas relativas a las imágenes
        $this->archivo         = 'esparza';
    //  $this->imagen          = '';
    //  $this->imagen_previa   = '';
        // La descripción y claves dan información a los buscadores y redes sociales
        $this->descripcion     = 'Desagregación de Esparza en Torreón.';
        $this->claves          = 'IMPLAN, Torreon, Desagregación';
        // El directorio en la raíz donde se guardará el archivo HTML
        $this->directorio      = 'desagregacion-torreon';
        // Opción del menú Navegación a poner como activa cuando vea esta publicación
        $this->nombre_menu     = 'Desagregación > En Torreón';
        // El estado puede ser 'publicar' (crear HTML y agregarlo a índices/galerías), 'revisar' (sólo crear HTML y accesar por URL) o 'ignorar'
        $this->estado          = 'publicar';
        // Indicar que NO se vaya a poner la imagen en la página y en la redifusión. Por defecto es verdadero.
        $this->poner_imagen_en_contenido = false;
        // El contenido es estructurado en un esquema
        $schema                = new \Base\SchemaBlogPosting();
        $schema->name          = $this->nombre;
        $schema->description   = $this->descripcion;
        $schema->datePublished = $this->fecha;
        $schema->image         = $this->imagen;
        $schema->image_show    = $this->poner_imagen_en_contenido;
        $schema->author        = $this->autor;
        // El contenido es una instancia de SchemaBlogPosting
        $this->contenido       = $schema;
        // Para el Organizador
        $this->categorias      = array();
        $this->fuentes         = array();
        $this->regiones        = array();
    } // constructor

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Cargar en el Schema el HTML de las lengüetas
        $this->contenido->articleBody = <<<FINAL
  <ul class="nav nav-tabs lenguetas" id="desagregacion">
    <li><a href="#dag-demografia" data-toggle="tab">Demografía</a></li>
    <li><a href="#dag-educacion" data-toggle="tab">Educación</a></li>
    <li><a href="#dag-economia" data-toggle="tab">Economía</a></li>
    <li><a href="#dag-salud" data-toggle="tab">Salud</a></li>
    <li><a href="#dag-viviendas" data-toggle="tab">Viviendas</a></li>
    <li><a href="#dag-u-economicas" data-toggle="tab">U. Económicas</a></li>
  </ul>
  <div class="tab-content lengueta-contenido">
    <div class="tab-pane" id="dag-demografia">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Población total</td>
      <td class="entero">38,374</td>
    </tr>
    <tr>
      <td>Población de 0 a 14 años</td>
      <td class="porcentaje">17.66 %</td>
    </tr>
    <tr>
      <td>Población de 15 a 64 años</td>
      <td class="porcentaje">66.86 %</td>
    </tr>
    <tr>
      <td>Población de 65 y más años</td>
      <td class="porcentaje">60.05 %</td>
    </tr>
    <tr>
      <td>Porcentaje de hombres</td>
      <td class="porcentaje">35.29 %</td>
    </tr>
    <tr>
      <td>Porcentaje de mujeres</td>
      <td class="porcentaje">16.91 %</td>
    </tr>
    <tr>
      <td>Fecundidad</td>
      <td class="flotante">455.0100</td>
    </tr>
    <tr>
      <td>Migración</td>
      <td class="porcentaje">34.45 %</td>
    </tr>
    <tr>
      <td>Sin discapacidad</td>
      <td class="porcentaje">64.10 %</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-educacion">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Grado promedio de escolaridad</td>
      <td class="flotante">996.3671</td>
    </tr>
    <tr>
      <td>Grado promedio de escolaridad masculina</td>
      <td class="flotante">327.2677</td>
    </tr>
    <tr>
      <td>Grado promedio de escolaridad femenina</td>
      <td class="flotante">449.6603</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-economia">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Población económicamente activa</td>
      <td class="porcentaje">15.10 %</td>
    </tr>
    <tr>
      <td>Población económicamente activa masculina</td>
      <td class="porcentaje">21.39 %</td>
    </tr>
    <tr>
      <td>Población económicamente activa femenina</td>
      <td class="porcentaje">24.94 %</td>
    </tr>
    <tr>
      <td>Población ocupada</td>
      <td class="porcentaje">75.40 %</td>
    </tr>
    <tr>
      <td>Población ocupada masculina</td>
      <td class="porcentaje">9.19 %</td>
    </tr>
    <tr>
      <td>Población ocupada femenina</td>
      <td class="porcentaje">79.09 %</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-salud">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Derechohabiencia</td>
      <td class="entero">34,747</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-viviendas">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Hogares jefatura masculina</td>
      <td class="porcentaje">43.21 %</td>
    </tr>
    <tr>
      <td>Hogares jefatura femenina</td>
      <td class="porcentaje">8.45 %</td>
    </tr>
    <tr>
      <td>Viviendas particulares habitadas</td>
      <td class="porcentaje">69.04 %</td>
    </tr>
    <tr>
      <td>Ocupantes por vivienda</td>
      <td class="flotante">24.7855</td>
    </tr>
    <tr>
      <td>Hacinamiento</td>
      <td class="flotante">564.8600</td>
    </tr>
    <tr>
      <td>Con luz elétrica</td>
      <td class="porcentaje">4.92 %</td>
    </tr>
    <tr>
      <td>Con agua entubada</td>
      <td class="porcentaje">60.60 %</td>
    </tr>
    <tr>
      <td>Con drenaje</td>
      <td class="porcentaje">45.85 %</td>
    </tr>
    <tr>
      <td>Con automóvil</td>
      <td class="porcentaje">73.79 %</td>
    </tr>
    <tr>
      <td>Con computadora</td>
      <td class="porcentaje">71.82 %</td>
    </tr>
    <tr>
      <td>Con teléfono celular</td>
      <td class="porcentaje">9.29 %</td>
    </tr>
    <tr>
      <td>Con internet</td>
      <td class="porcentaje">27.41 %</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-u-economicas">
<!-- LISTADO INICIA -->
<div class="listado">
<table class="table table-hover table-bordered listado-tabla">
  <thead>
    <tr>
      <th>Concepto</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Comercio al por menor</td>
      <td class="porcentaje">67.75 %</td>
    </tr>
    <tr>
      <td>Servicios excepto gubernamentales</td>
      <td class="porcentaje">26.95 %</td>
    </tr>
    <tr>
      <td>Servicios de alojamiento temporal</td>
      <td class="porcentaje">94.28 %</td>
    </tr>
    <tr>
      <td>De 0 a 5 empleados</td>
      <td class="porcentaje">27.80 %</td>
    </tr>
    <tr>
      <td>De 6 a 10 empleados</td>
      <td class="porcentaje">62.25 %</td>
    </tr>
    <tr>
      <td>De 11 a 30 empleados</td>
      <td class="porcentaje">11.18 %</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
  </div>
FINAL;
        // Ejecutar este método en el padre
        return parent::html();
    } // html

    /**
     * Javascript
     *
     * @return string Código Javascript
     */
    public function javascript() {
        // JavaScript
        $this->javascript[] = <<<FINAL
// TWITTER BOOTSTRAP TABS, ESTABLECER QUE LA LENGÜETA ACTIVA ES dag-demografia
$(document).ready(function(){
  $('#desagregacion a[href="#dag-demografia"]').tab('show')
});
FINAL;
        // Ejecutar este método en el padre
        return parent::javascript();
    } // javascript

    /**
     * Redifusion HTML
     *
     * @return string Código HTML
     */
    public function redifusion_html() {
        // Para redifusión, se pone el contenido sin lengüetas
        $this->redifusion = <<<FINAL
FINAL;
        // Ejecutar este método en el padre
        return parent::redifusion_html();
    } // redifusion_html

} // Clase Esparza

?>
