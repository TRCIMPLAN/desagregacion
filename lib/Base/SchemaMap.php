<?php
/**
 * TrcIMPLAN Desagregación - Schema Map
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
 * Clase SchemaMap
 *
 * A map.
 * http://schema.org/Map
 */
class SchemaMap extends SchemaCreativeWork {

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
    // public $author;              // Organization or Person. The author of this content.
    // public $contentLocation;     // Place. The location of the content.
    // public $datePublished;       // Date. Date of first broadcast/publication.
    // public $headline;            // Text. Headline of the article.
    // public $headline_style;      // Text. CSS style for encabezado
    // public $headline_icon;       // Text. Font Awsome icon for encabezado.
    // public $producer;            // Organization or Person. The person or organization who produced the work.
    public $mapType;                // Text. Indicates the kind of Map, from the MapCategoryType Enumeration. Use 'ParkingMap', 'SeatingMap', 'TransitMap' or  'VenueMap'.
    public $theMap;                 // Text. My code to put the map.

    /**
     * Botón HTML
     *
     * @return string Código HTML
     */
    protected function boton_html() {
        switch ($this->mapType) {
            case 'ParkingMap':
                $map_type = "<link itemprop=\"mapType\" href=\"http://schema.org/ParkingMap\">";
                break;
            case 'SeatingMap':
                $map_type = "<link itemprop=\"mapType\" href=\"http://schema.org/SeatingMap\">";
                break;
            case 'TransitMap':
                $map_type = "<link itemprop=\"mapType\" href=\"http://schema.org/TransitMap\">";
                break;
            case 'VenueMap':
                $map_type = "<link itemprop=\"mapType\" href=\"http://schema.org/VenueMap\">";
                break;
            default:
                $map_type = '';
        }
        if ($this->url != '') {
            if ($this->url_label != '') {
                return "$map_type<a itemprop=\"url\" class=\"btn btn-default\" href=\"{$this->url}\" target=\"_blank\" role=\"button\">{$this->url_label}</a>";
            } else {
                return "$map_type<a itemprop=\"url\" class=\"btn btn-default\" href=\"{$this->url}\" target=\"_blank\" role=\"button\">{$this->name}</a>";
            }
        } else {
            return '';
        }
    } // boton_html

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
                $a[] = "  <article><div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Map\">";
            } else {
                $a[] = "  <div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Map\">";
            }
        } else {
            if ($this->big_heading) {
                $a[] = $spaces.'<article><div itemscope itemtype="http://schema.org/Map">';
            } else {
                $a[] = $spaces.'<div itemscope itemtype="http://schema.org/Map">';
            }
        }
        if ($this->big_heading) {
            $a[] = $this->big_heading_html();
        } else {
            $a[] = $this->title_html();
            $a[] = $this->description_html();
        }
        $a[] = $this->image_html();
        $a[] = $this->theMap;
        if ($this->big_heading) {
            $a[] = '</div></article>';
        } else {
            $a[] = '</div>';
        }
        $a[] = $this->boton_html();
        if ($this->extra != '') {
            $a[] = "<aside>{$this->extra}</aside>";
        }
        // Entregar
        return implode("\n$spaces", $a);
    } // html

} // Clase SchemaMap

?>
