<?php
/**
 * TrcIMPLAN Desagregación - Tarjetas
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

namespace Base;

/**
 * Clase Tarjetas
 */
class Tarjetas extends Pagina {

    // public $encabezado;       // Opcional. Código HTML, por ejemplo con un tag img, para mostrar en la parte superior.
    // public $encabezado_color; // Opcional. Color de fondo del encabezado en Hex, por ejemplo: #008000
    // public $titulo;           // Título de la página
    // public $publicaciones;    // Arreglo con instancias de Publicacion

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Agregar el código HTML del encabezado
        $a[] = $this->encabezado_html();
        // Tabla inicia
        $a[] = '      <div class="row" id="tarjetas">';
        // Bucle por Publicaciones
        foreach ($this->publicaciones as $p) {
            // Validar publicacion
            $p->validar();
            // Acumular
            $a[] = '        <div class="col-sm-6 col-md-3">';
            $a[] = '          <div class="thumbnail tarjeta">';
            if ($p->imagen != '') {
                $a[] = sprintf('            <a href="%s"%s><img src="%s" alt="%s"></a>', $p->archivo_url, $p->archivo_target, $p->imagen, $p->nombre);
            }
            $a[] = '            <div class="caption">';
            $a[] = sprintf('              <h3 class="caption-titulo"><a href="%s"%s>%s</a></h3>', $p->archivo_url, $p->archivo_target, $p->nombre);
            if ($p->descripcion != '') {
                $a[] = sprintf('              <p class="caption-descripcion">%s</p>', $p->descripcion);
            }
            $a[] = sprintf('              <a href="%s" class="btn btn-default caption-boton" role="button"%s>%s</a>', $p->boton_url, $p->boton_target, $p->url_etiqueta);
            $a[] = '            </div>';
            $a[] = '          </div>';
            $a[] = '        </div>';
        }
        // Tabla termina
        $a[] = '      </div>'; // row
        // Entregar
        return implode("\n", $a);
    } // html

    /**
     * Javascript
     *
     * @return string No hay código Javascript, entrega un texto vacío
     */
    public function javascript() {
        return '';
    } // javascript

} // Clase Tarjetas

?>
