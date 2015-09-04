<?php
/**
 * TrcIMPLAN Desagregación - Inicial Destacado
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

/**
 * Clase Destacado
 */
class Destacado {

    protected $javascript;

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Destacado Desagregación
        $desagregacion = new DestacadoDesagregacion();
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Acumular
        $a[] = '  <section id="destacado">';
        $a[] = '    <div class="row">';
        $a[] = '      <div class="col-md-6">';
        $a[] = $desagregacion->html();
        $a[] = '      </div>';
        $a[] = '      <div class="col-md-6">';
        $a[] = '      </div>';
        $a[] = '    </div>';
        $a[] = '  </section>';
        // Acumular javascript
        $this->javascript = $desagregacion->javascript();
        // Entregar
        return implode("\n", $a);
    } // html

    /**
     * Javascript
     *
     * @return string Código Javascript
     */
    public function javascript() {
        return '';
    } // javascript

} // Clase Destacado

?>
