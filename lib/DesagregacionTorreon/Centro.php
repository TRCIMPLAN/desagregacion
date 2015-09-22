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
 * Clase Centro
 */
class Centro extends \Base\Publicacion {

    /**
     * Constructor
     */
    public function __construct() {
        // Título, autor y fecha
        $this->nombre          = 'Desagregación Centro';
        $this->autor           = 'IMPLAN Torreón Staff';
        $this->fecha           = '2015-09-15T12:00';
        // El nombre del archivo a crear (obligatorio) y rutas relativas a las imágenes
        $this->archivo         = 'centro';
    //  $this->imagen          = '';
    //  $this->imagen_previa   = '';
        // La descripción y claves dan información a los buscadores y redes sociales
        $this->descripcion     = 'Desagregación de Centro en Torreón.';
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
      <td class="entero">39,620</td>
    </tr>
    <tr>
      <td>Población de 0 a 14 años</td>
      <td class="porcentaje">41.43 %</td>
    </tr>
    <tr>
      <td>Población de 15 a 64 años</td>
      <td class="porcentaje">32.97 %</td>
    </tr>
    <tr>
      <td>Población de 65 y más años</td>
      <td class="porcentaje">53.01 %</td>
    </tr>
    <tr>
      <td>Porcentaje de hombres</td>
      <td class="porcentaje">74.04 %</td>
    </tr>
    <tr>
      <td>Porcentaje de mujeres</td>
      <td class="porcentaje">84.78 %</td>
    </tr>
    <tr>
      <td>Fecundidad</td>
      <td class="flotante">847.2697</td>
    </tr>
    <tr>
      <td>Migración</td>
      <td class="porcentaje">54.22 %</td>
    </tr>
    <tr>
      <td>Sin discapacidad</td>
      <td class="porcentaje">13.23 %</td>
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
      <td class="flotante">641.5469</td>
    </tr>
    <tr>
      <td>Grado promedio de escolaridad masculina</td>
      <td class="flotante">177.1443</td>
    </tr>
    <tr>
      <td>Grado promedio de escolaridad femenina</td>
      <td class="flotante">500.9713</td>
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
      <td class="porcentaje">85.40 %</td>
    </tr>
    <tr>
      <td>Población económicamente activa masculina</td>
      <td class="porcentaje">99.17 %</td>
    </tr>
    <tr>
      <td>Población económicamente activa femenina</td>
      <td class="porcentaje">47.18 %</td>
    </tr>
    <tr>
      <td>Población ocupada</td>
      <td class="porcentaje">54.19 %</td>
    </tr>
    <tr>
      <td>Población ocupada masculina</td>
      <td class="porcentaje">98.21 %</td>
    </tr>
    <tr>
      <td>Población ocupada femenina</td>
      <td class="porcentaje">80.82 %</td>
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
      <td class="entero">6,185</td>
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
      <td class="porcentaje">88.74 %</td>
    </tr>
    <tr>
      <td>Hogares jefatura femenina</td>
      <td class="porcentaje">80.04 %</td>
    </tr>
    <tr>
      <td>Viviendas particulares habitadas</td>
      <td class="porcentaje">60.30 %</td>
    </tr>
    <tr>
      <td>Ocupantes por vivienda</td>
      <td class="flotante">878.1537</td>
    </tr>
    <tr>
      <td>Hacinamiento</td>
      <td class="flotante">541.8369</td>
    </tr>
    <tr>
      <td>Con luz elétrica</td>
      <td class="porcentaje">11.47 %</td>
    </tr>
    <tr>
      <td>Con agua entubada</td>
      <td class="porcentaje">34.02 %</td>
    </tr>
    <tr>
      <td>Con drenaje</td>
      <td class="porcentaje">29.37 %</td>
    </tr>
    <tr>
      <td>Con automóvil</td>
      <td class="porcentaje">82.18 %</td>
    </tr>
    <tr>
      <td>Con computadora</td>
      <td class="porcentaje">59.17 %</td>
    </tr>
    <tr>
      <td>Con teléfono celular</td>
      <td class="porcentaje">47.98 %</td>
    </tr>
    <tr>
      <td>Con internet</td>
      <td class="porcentaje">35.88 %</td>
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
      <td class="porcentaje">58.22 %</td>
    </tr>
    <tr>
      <td>Servicios excepto gubernamentales</td>
      <td class="porcentaje">89.41 %</td>
    </tr>
    <tr>
      <td>Servicios de alojamiento temporal</td>
      <td class="porcentaje">68.86 %</td>
    </tr>
    <tr>
      <td>De 0 a 5 empleados</td>
      <td class="porcentaje">11.22 %</td>
    </tr>
    <tr>
      <td>De 6 a 10 empleados</td>
      <td class="porcentaje">63.44 %</td>
    </tr>
    <tr>
      <td>De 11 a 30 empleados</td>
      <td class="porcentaje">53.63 %</td>
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

} // Clase Centro

?>
