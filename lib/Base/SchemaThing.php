<?php
/**
 * TrcIMPLAN Desagregación - Schema Thing
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
 * Clase SchemaThing
 *
 * The most generic type of item.
 * http://schema.org/Thing
 */
class SchemaThing {

    public $onTypeProperty;      // Text. Use when this item is part of another one.
    public $identation  = 3;     // Integer. Level of identation (beautiful code).
    public $big_heading = false; // Boolean. Use true to use a big heading for the web page.
    public $headline_style;      // Text. Style or Hex Color for big heading.
    public $extra;               // Text. Additional HTML to put inside.
    public $description;         // Text. A short description of the item.
    public $image;               // URL or ImageObject. An image of the item.
    public $image_show  = false; // Boolean. Use true to put an img tag. Use false to put a meta tag.
    public $name;                // Text. The name of the item.
    public $url;                 // URL of the item.
    public $url_label;           // Label for the URL of the item.

    /**
     * Fecha con formato humano
     *
     * @return string Fecha en el formato DD/MM/YYYY hh:mm
     */
    protected function fecha_con_formato_humano($in_fecha) {
        $t = strtotime($in_fecha);
        if ($t === false) {
            return ''; // Fecha mal escrita, no se entrega nada
        } else {
            // Sí se interpretó bien
            $a      = getdate($t);
            $ano    = $a['year'];
            $mes    = $a['mon'];
            $dia    = $a['mday'];
            $hora   = $a['hours'];
            $minuto = $a['minutes'];
            if (($hora > 0) || ($minuto > 00)) {
                return sprintf('%02d/%02d/%04d %02d:%02d', $dia, $mes, $ano, $hora, $minuto);
            } else {
                return sprintf('%02d/%02d/%04d', $dia, $mes, $ano);
            }
        }
    } // fecha_con_formato_humano

    /**
     * Big Heading HTML
     *
     * @return string Código HTML
     */
    protected function big_heading_html() {
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Puede recibir un estilo o un color hexadecimal
        if ($this->headline_style != '') {
            if (preg_match('/^#[[:xdigit:]]{6}$/', $this->headline_style) === 1) {
                $a[] = "<div class=\"encabezado\" style=\"background-color:{$this->headline_style};\">";
            } else {
                $a[] = "<div class=\"encabezado\" style=\"{$this->headline_style};\">";
            }
        } else {
            $a[] = "<div class=\"encabezado\">";
        }
        // Acumular
        if ($this->name != '') {
            $a[] = "  <h1 itemprop=\"name\">{$this->name}</h1>";
        }
        if ($this->description != '') {
            $a[] = "  <div class=\"encabezado-descripcion\" itemprop=\"description\">{$this->description}</div>";
        }
        $a[] = "</div>";
        // Entregar
        $spaces = str_repeat('  ', $this->identation + 1);
        return $spaces.implode("\n$spaces", $a);
    } // big_heading_html

    /**
     * Title HTML
     *
     * @return string Código HTML
     */
    protected function title_html() {
        if ($this->name != '') {
            return "  <h3 class=\"titulo\" itemprop=\"name\">{$this->name}</h3>";
        } else {
            return '';
        }
    } // title_html

    /**
     * Description HTML
     *
     * @return string Código HTML
     */
    protected function description_html() {
        if ($this->description != '') {
            return "  <div class=\"descripcion\" itemprop=\"description\">{$this->description}</div>";
        } else {
            return '';
        }
    } // description_html

    /**
     * Image HTML
     *
     * @return string Código HTML
     */
    protected function image_html() {
        if ($this->image != '') {
            if ($this->image_show) {
                return "  <span class=\"contenido-imagen-previa\"><img class=\"img-responsive\" itemprop=\"image\" alt=\"{$this->name}\" src=\"{$this->image}\"></span>";
            } else {
                return "  <meta itemprop=\"image\" alt=\"{$this->name}\" src=\"{$this->image}\">";
            }
        } else {
            return '';
        }
    } // image_html

    /**
     * URL HTML
     *
     * @return string Código HTML
     */
    protected function url_html() {
        if ($this->url != '') {
            if ($this->url_label != '') {
                return "  <a href=\"{$this->url}\" itemprop=\"url\">{$this->url_label}</a>";
            } else {
                return "  <a href=\"{$this->url}\" itemprop=\"url\">{$this->name}</a>";
            }
        } else {
            return '';
        }
    } // url_html

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Definir los espacios antes de cada renglón
        $spaces = str_repeat('  ', $this->identation);
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Acumular
        if ($this->onTypeProperty != '') {
            if ($this->big_heading) {
                $a[] = "  <article><div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Thing\">";
            } else {
                $a[] = "  <div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Thing\">";
            }
        } else {
            if ($this->big_heading) {
                $a[] = $spaces.'<article><div itemscope itemtype="http://schema.org/Thing">';
            } else {
                $a[] = $spaces.'<div itemscope itemtype="http://schema.org/Thing">';
            }
        }
        if ($this->big_heading) {
            $a[] = $this->big_heading_html();
        } else {
            $a[] = $this->title_html();
            $a[] = $this->description_html();
        }
        $a[] = $this->image_html();
        $a[] = $this->url_html();
        if ($this->big_heading) {
            $a[] = '</div></article>';
        } else {
            $a[] = '</div>';
        }
        if ($this->extra != '') {
            $a[] = "<aside>{$this->extra}</aside>";
        }
        // Entregar
        return implode("\n$spaces", $a);
    } // html

    /**
     * Javascript
     *
     * @return String Texto vacío porque no hay Javascript
     */
    public function javascript() {
        return '';
    } // javascript

} // Clase SchemaThing

?>
