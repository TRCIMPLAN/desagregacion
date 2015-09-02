<?php
/**
 * TrcIMPLAN Desagregación - Schema Postal Address
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
 * Clase SchemaPostalAddress
 */
class SchemaPostalAddress extends SchemaContactPoint {

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
    // public $email;               // Text. Email address.
    // public $telephone;           // Text. The telephone number.
    public $addressCountry;         // Text. The country. For example, USA. You can also provide the two-letter ISO 3166-1 alpha-2 country code.
    public $addressLocality;        // Text. The locality. For example, Mountain View.
    public $addressRegion;          // Text. The region. For example, CA.
    public $streetAddress;          // Text. The postal code. For example, 94043.
    public $postalCode;             // Text. The street address. For example, 1600 Amphitheatre Pkwy.

    /**
     * Address HTML
     *
     * @return string Código HTML
     */
    protected function address_html() {
        // Calle
        $a = array();
        if ($this->streetAddress != '') {
            $a[] = "  <span itemprop=\"streetAddress\">{$this->streetAddress}</span>";
        }
        // Localidad, Region, C.P.
        $b = array();
        if (($this->addressLocality != '') && ($this->addressRegion != '')) {
            $b[] = "<span itemprop=\"addressLocality\">{$this->addressLocality}</span>, <span itemprop=\"addressRegion\">{$this->addressRegion}</span>.";
        } else {
            if ($this->addressLocality != '') {
                $b[] = "<span itemprop=\"addressLocality\">{$this->addressLocality}</span>";
            }
            if ($this->addressRegion != '') {
                $b[] = "<span itemprop=\"addressRegion\">{$this->addressRegion}</span>.";
            }
        }
        if ($this->postalCode != '') {
            $b[] = "C.P. <span itemprop=\"postalCode\">{$this->postalCode}</span>.";
        }
        if (count($b) > 0) {
            $a[] = '  '.implode(' ', $b);
        }
        // Pais
        if ($this->addressCountry != '') {
            if (($this->addressCountry === 'MX') || ($this->addressCountry === 'México')) {
                $a[] = "  <meta itemprop=\"addressCountry\" content=\"MX\">México.";
            } else {
                $a[] = "  <span itemprop=\"addressCountry\">{$this->addressCountry}</span>.";
            }
        }
        // Juntar todo
        if (count($a) > 0) {
            // Definir los espacios antes de cada renglón
            $spaces = str_repeat('  ', $this->identation + 1);
            // Acumular
            $c   = array();
            $c[] = '  <div class="direccion">';
            if (count($a) > 2) {
                $c[] = implode("<br>\n$spaces", $a);
            } else {
                $c[] = implode(' ', $a);
            }
            $c[] = '</div>';
            // Entregar
            return implode("\n$spaces", $c);
        } else {
            return '';
        }
    } // address_html

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
                $a[] = "  <article><div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/PostalAddress\">";
            } else {
                $a[] = "  <div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/PostalAddress\">";
            }
        } else {
            if ($this->big_heading) {
                $a[] = $spaces.'<article><div itemscope itemtype="http://schema.org/PostalAddress">';
            } else {
                $a[] = $spaces.'<div itemscope itemtype="http://schema.org/PostalAddress">';
            }
        }
        if ($this->big_heading) {
            $a[] = $this->big_heading_html();
        } else {
            $a[] = $this->title_html();
            $a[] = $this->description_html();
        }
        $a[] = $this->image_html();
        $a[] = $this->address_html();
        $a[] = $this->telephone_html();
        $a[] = $this->email_html();
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

} // Clase SchemaPostalAddress

?>
