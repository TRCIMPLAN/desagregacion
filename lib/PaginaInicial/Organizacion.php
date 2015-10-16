<?php
/**
 * TrcIMPLAN Desagregación - Inicial Organización
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
 * Clase Organizacion
 */
class Organizacion extends \Base\SchemaGovernmentOrganization {

    // public $onTypeProperty;      // Text. Use when this item is part of another one.
    // public $identation  = 3;     // Integer. Level of identation (beautiful code).
    // public $big_heading = false; // Boolean. Use true to use a big heading for the web page.
    // public $extra;               // Text. Additional HTML to put inside.
    // public $description;         // Text. A short description of the item.
    // public $image;               // URL or ImageObject. An image of the item.
    // public $image_show  = false; // Boolean. Use true to put an img tag. Use false to put a meta tag.
    // public $name;                // Text. The name of the item.
    // public $url;                 // URL of the item.
    // public $url_label;           // Label for the URL of the item.
    // public $address;             // Instance of SchemaPostalAddress. Physical address of the item.
    // public $email;               // Text. Email address.
    // public $location;            // Instance of SchemaPostalAddress or SchemaPlace. The location of the event, organization or action.
    // public $telephone;           // Text. The telephone number.

    /**
     * Constructor
     */
    public function __construct() {
        $this->name        = 'Instituto Municipal de Planeación y Competitividad de Torreón';
        $this->description = 'Órgano técnico responsable de la planeación del desarrollo del municipio de Torreón, Coahuila, México.';
        $this->image       = 'imagenes/implan-logo.png';
    } // constructor

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Acumular
        $a[] = '  <section id="organizacion">';
        $a[] = '    <img class="banner" src="imagenes/banner-implan.jpg" alt="Banner">';
        if ($this->onTypeProperty != '') {
            $a[] = "  <div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/GovernmentOrganization\">";
        } else {
            $a[] = '  <div itemscope itemtype="http://schema.org/GovernmentOrganization">';
        }
        if ($this->image != '') {
            $a[] = "    <img class=\"organizacion-logotipo\" itemprop=\"image\" alt=\"{$this->name}\" src=\"{$this->image}\">";
        }
        if ($this->name != '') {
            $a[] = "    <h3 class=\"organizacion-titulo\" itemprop=\"name\">{$this->name}</h3>";
        } else {
            throw new \Exception('Error en Organizacion, html: La propiedad name es incorrecta.');
        }
        if ($this->description != '') {
            $a[] = "    <div class=\"organizacion-descripcion\" itemprop=\"description\">{$this->description}</div>";
        }
        $a[] = '  </div>';
        $a[] = '  </section>';
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

} // Clase Organizacion

?>
