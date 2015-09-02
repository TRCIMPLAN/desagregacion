<?php
/**
 * TrcIMPLAN Desagregación - Schema Dataset
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
 * Clase SchemaDataset
 *
 * A body of structured information describing some topic(s) of interest.
 * http://schema.org/Dataset
 */
class SchemaDataset extends SchemaCreativeWork {

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
    public $catalog;                // DataCatalog. A data catalog which contains a dataset.
    public $distribution;           // DataDownload. A downloadable form of this dataset, at a specific location, in a specific format.
    public $spatial;                // Instance of SchemaPlace. The range of spatial applicability of a dataset, e.g. for a dataset of New York weather, the state of New York.
    public $temporal;               // DateTime. The range of temporal applicability of a dataset, e.g. for a 2011 census dataset, the year 2011 (in ISO 8601 time interval format).

    /**
     * Catalog HTML
     *
     * @return string Código HTML
     */
    protected function catalog_html() {
        if ($this->catalog != '') {
            return "  <div class=\"catalogo\" itemprop=\"catalog\">{$this->catalog}</div>";
        } else {
            return '';
        }
    } // catalog_html

    /**
     * Distribution HTML
     *
     * @return string Código HTML
     */
    protected function distribution_html {
        if ($this->distribution != '') {
            return "  <div class=\"distribucion\" itemprop=\"distribution\">{$this->distribution}</div>";
        } else {
            return '';
        }
    } // distribution_html

    /**
     * Temporal HTML
     *
     * @return string Código HTML
     */
    protected function temporal_html() {
        if ($this->temporal != '') {
            return sprintf('  <div class="temporal">Temporal: <meta itemprop="temporal" content="%s">%s</div>', $this->temporal, $this->fecha_con_formato_humano($this->temporal));
        } else {
            return '';
        }
    } // temporal_html

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
                $a[] = "  <article><div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Dataset\">";
            } else {
                $a[] = "  <div itemprop=\"{$this->onTypeProperty}\" itemscope itemtype=\"http://schema.org/Dataset\">";
            }
        } else {
            if ($this->big_heading) {
                $a[] = $spaces.'<article><div itemscope itemtype="http://schema.org/Dataset">';
            } else {
                $a[] = $spaces.'<div itemscope itemtype="http://schema.org/Dataset">';
            }
        }
        if ($this->big_heading) {
            $a[] = $this->big_heading_html();
        } else {
            $a[] = $this->title_html();
            $a[] = $this->description_html();
        }
        $a[] = $this->image_html();
        if (is_object($this->spatial) && ($this->spatial instanceof SchemaPlace)) {
            $this->spatial->onTypeProperty = 'spatial';
            $this->spatial->identation     = $this->identation + 1;
            $a[] = $this->spatial->html();
        }
        $a[] = $this->catalog_html();
        $a[] = $this->temporal_html();
        $a[] = $this->distribution_html();
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

} // Clase SchemaDataset

?>
