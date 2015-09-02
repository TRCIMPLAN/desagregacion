<?php
/**
 * TrcIMPLAN Desagregación - Página
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
 * Clase Pagina
 *
 * Estructura básica para una página con encabezado. Es heredada por Galeria, Indice y Tarjetas
 */
abstract class Pagina {

    public $encabezado;              // Opcional. Código HTML, por ejemplo con un tag img, para mostrar en la parte superior.
    public $encabezado_color;        // Opcional. Color de fondo del encabezado en Hex, por ejemplo: #008000
    public $titulo;                  // Título de la página
    public $publicaciones = array(); // Arreglo con instancias de Publicacion

    /**
     * Constructor
     *
     * @param array Arreglo con instancias de Publicacion
     */
    public function __construct($publicaciones) {
        // Validar parámetro
        if (!is_array($publicaciones)) {
            throw new \Exception("Error en Indice, html: La propiedad publicaciones no es un arreglo.");
        }
        if (count($publicaciones) == 0) {
            throw new \Exception("Error en Indice, html: La propiedad publicaciones no tiene datos.");
        }
        // Bucle para quedarse sólo con las publicaciones con estado 'publicar'
        $this->publicaciones = array();
        foreach ($publicaciones as $p) {
            if (!is_object($p)) {
                throw new \Exception("Error en Indice, html: Una publicación no es una instancia.");
            }
            if (!($p instanceof Publicacion)) {
                throw new \Exception("Error en Indice, html: Una publicación no es una instancia de Publicacion.");
            }
            // Si el estado no es 'publicar', se salta
            if (strtolower($p->estado) === 'publicar') {
                $this->publicaciones[] = $p;
            }
        }
    } // constructor

    /**
     * Encabezado HTML
     *
     * @return string Código HTML
     */
    public function encabezado_html() {
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Si el encabezado está definido
        if ($this->encabezado != '') {
            // Se pone el código HTML del encabezado
            $a[] = $this->encabezado;
            // Y el título de la página es invisible
            if ($this->titulo != '') {
                $a[] = "      <h1 style=\"display:none;\">{$this->titulo}</h1>";
            }
        } elseif ($this->titulo != '') {
            // Hay título. Si hay icono definido en Navegación
            if (array_key_exists($this->titulo, \Configuracion\NavegacionConfig::$iconos)) {
                $encabezado = sprintf('<i class="%s encabezado-icono"></i> %s', \Configuracion\NavegacionConfig::$iconos[$this->titulo], $this->titulo);
            } else {
                $encabezado = $this->titulo;
            }
            // Acumular
            if ($this->encabezado_color != '') {
                $a[] = "      <div class=\"encabezado\" style=\"background-color:{$this->encabezado_color};\">";
            } else {
                $a[] = '      <div class="encabezado">';
            }
            $a[] = "        <span><h1>$encabezado</h1></span>";
            $a[] = '      </div>';
        }
        // Entregar
        return implode("\n", $a);
    } // encabezado_html

    /**
     * HTML
     *
     * @return string Código HTML
     */
    abstract function html();

    /**
     * Javascript
     *
     * @return string Código Javascript
     */
    abstract function javascript();

} // Clase Pagina

?>
