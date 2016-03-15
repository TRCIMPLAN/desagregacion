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
 * Clase CiudadDif
 */
class CiudadDif extends \Base\Publicacion {

    /**
     * Constructor
     */
    public function __construct() {
        // Título, autor y fecha
        $this->nombre          = 'Desagregación Ciudad DIF';
        $this->autor           = 'IMPLAN Torreón Staff';
        $this->fecha           = '2015-09-15T12:00';
        // El nombre del archivo a crear (obligatorio) y rutas relativas a las imágenes
        $this->archivo         = 'ciudad-dif';
    //  $this->imagen          = '';
    //  $this->imagen_previa   = '';
        // La descripción y claves dan información a los buscadores y redes sociales
        $this->descripcion     = 'Desagregación de Ciudad DIF en Torreón.';
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
    <li><a href="#dag-viviendas" data-toggle="tab">Viviendas</a></li>
    <li><a href="#dag-actividades" data-toggle="tab">Actividades</a></li>
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
      <td class="entero">71,987</td>
    </tr>
    <tr>
      <td>Porcentaje de población masculina</td>
      <td class="porcentaje">48.84 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población femenina</td>
      <td class="porcentaje">51.16 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población de 0 a 14 años</td>
      <td class="porcentaje">27.23 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población de 15 a 64 años</td>
      <td class="porcentaje">65.95 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población de 65 y más años</td>
      <td class="porcentaje">4.77 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población no especificada</td>
      <td class="porcentaje">2.05 %</td>
    </tr>
    <tr>
      <td>Fecundidad promedio</td>
      <td class="flotante">2.0600</td>
    </tr>
    <tr>
      <td>Porcentaje de población nacida en otro estado</td>
      <td class="porcentaje">17.25 %</td>
    </tr>
    <tr>
      <td>Porcentaje de población con discapacidad</td>
      <td class="porcentaje">3.77 %</td>
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
      <td>Grado Promedio de Escolaridad</td>
      <td class="flotante">10.6800</td>
    </tr>
    <tr>
      <td>Grado Promedio de Escolaridad masculina</td>
      <td class="flotante">10.8600</td>
    </tr>
    <tr>
      <td>Grado Promedio de Escolaridad femenina</td>
      <td class="flotante">10.5100</td>
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
      <td>Población Económicamente Activa</td>
      <td class="porcentaje">54.76 %</td>
    </tr>
    <tr>
      <td>Población Económicamente Activa masculina</td>
      <td class="porcentaje">62.66 %</td>
    </tr>
    <tr>
      <td>Población Económicamente Activa femenina</td>
      <td class="porcentaje">37.34 %</td>
    </tr>
    <tr>
      <td>Población Ocupada</td>
      <td class="porcentaje">91.68 %</td>
    </tr>
    <tr>
      <td>Población Ocupada masculina</td>
      <td class="porcentaje">61.75 %</td>
    </tr>
    <tr>
      <td>Población Ocupada femenina</td>
      <td class="porcentaje">38.25 %</td>
    </tr>
    <tr>
      <td>Población Desocupada</td>
      <td class="porcentaje">8.32 %</td>
    </tr>
    <tr>
      <td>Derechohabiencia</td>
      <td class="porcentaje">72.81 %</td>
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
      <td>Hogares</td>
      <td class="entero">18,695</td>
    </tr>
    <tr>
      <td>Hogares Jefatura masculina</td>
      <td class="porcentaje">75.17 %</td>
    </tr>
    <tr>
      <td>Hogares Jefatura femenina</td>
      <td class="porcentaje">24.83 %</td>
    </tr>
    <tr>
      <td>Ocupación por Vivienda</td>
      <td class="flotante">3.8500</td>
    </tr>
    <tr>
      <td>Viviendas con Electricidad</td>
      <td class="porcentaje">99.82 %</td>
    </tr>
    <tr>
      <td>Viviendas con Agua</td>
      <td class="porcentaje">99.56 %</td>
    </tr>
    <tr>
      <td>Viviendas con Drenaje</td>
      <td class="porcentaje">99.52 %</td>
    </tr>
    <tr>
      <td>Viviendas con Televisión</td>
      <td class="porcentaje">98.81 %</td>
    </tr>
    <tr>
      <td>Viviendas con Automóvil</td>
      <td class="porcentaje">61.30 %</td>
    </tr>
    <tr>
      <td>Viviendas con Computadora</td>
      <td class="porcentaje">46.67 %</td>
    </tr>
    <tr>
      <td>Viviendas con Celular</td>
      <td class="porcentaje">78.86 %</td>
    </tr>
    <tr>
      <td>Viviendas con Internet</td>
      <td class="porcentaje">34.91 %</td>
    </tr>
  </tbody>
</table>
</div>
<!-- LISTADO TERMINA -->
    </div>
    <div class="tab-pane" id="dag-actividades">
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
      <td>Total Actividades Económicas</td>
      <td class="entero">1,872</td>
    </tr>
    <tr>
      <td>Primer actividad</td>
      <td class="texto">Comercio Menudeo 39.32 %</td>
    </tr>
    <tr>
      <td>Segunda actividad</td>
      <td class="texto">Otros servicios, excepto Gobierno 19.98 %</td>
    </tr>
    <tr>
      <td>Tercera actividad</td>
      <td class="texto">Preparación de Alimentos y Bebidas 12.18 %</td>
    </tr>
    <tr>
      <td>Cuarta actividad</td>
      <td class="texto">Industria Manufacturera 8.71 %</td>
    </tr>
    <tr>
      <td>Quinta actividad</td>
      <td class="texto">Salud 3.47 %</td>
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

} // Clase CiudadDif

?>
