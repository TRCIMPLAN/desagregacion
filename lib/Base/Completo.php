<?php
/**
 * TrcIMPLAN Desagregación - Completo
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
 * Clase Completo
 */
class Completo {

    public $publicacion; // Instancia de Publicacion

    /**
     * Constructor
     *
     * @param mixed Instancia de Publicacion
     */
    public function __construct(Publicacion $publicacion) {
        $this->publicacion = $publicacion;
    } // constructor

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Validar
        if (!is_object($this->publicacion)) {
            throw new \Exception("Error en Completo, html: La propiedad publicacion no es una instancia.");
        }
        if (!($this->publicacion instanceof Publicacion)) {
            throw new \Exception("Error en Completo, html: La propiedad publicacion no es instancia de Publicacion.");
        }
        // Cargar los valores por defecto de Publicacion
        $publicacion_config = new \Configuracion\PublicacionConfig();
        // Si el autor es diferente al de por defecto...
        if ($this->publicacion->autor != $publicacion_config->autor) {
            $autor = $this->publicacion->autor;
        }
        // Si la fecha es posterior a la de por defecto...
        if (strcmp($this->publicacion->fecha, $publicacion_config->fecha) > 0) {
            $fecha = $this->publicacion->fecha_con_formato_humano();
        }
        // Si hay autor y/o fecha...
        if (($autor != '') && ($fecha != '')) {
            $autor_fecha = "Por $autor<br>$fecha";
        } elseif ($autor != '') {
            $autor_fecha = "Por $autor";
        } elseif ($fecha != '') {
            $autor_fecha = '';
        }
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Si el contenido de la publicación es una instancia
        if ($this->publicacion->es_contenido_esquema()) {
            // Es una instancia de esquema, debe tener el método html
            $a[] = $this->publicacion->html();
        } else {
            // Es texto
            $a[] = '<article>';
            $a[] = '  <header>';
            // Si el encabezado está definido
            if ($this->publicacion->encabezado != '') {
                // Se pone el código HTML del encabezado
                $a[] = $this->publicacion->encabezado;
                // Y el título de la página es invisible
                if ($this->publicacion->nombre != '') {
                    $a[] = "    <h1 style=\"display:none;\">{$this->publicacion->nombre}</h1>";
                }
            } elseif ($this->publicacion->nombre != '') {
                // Hay título. Si hay icono definido en Navegación
                if (array_key_exists($this->publicacion->nombre_menu, \Configuracion\NavegacionConfig::$iconos)) {
                    $encabezado = sprintf('<i class="%s encabezado-icono"></i> %s', \Configuracion\NavegacionConfig::$iconos[$this->publicacion->nombre_menu], $this->publicacion->nombre);
                } else {
                    $encabezado = $this->publicacion->nombre;
                }
                // Acumular
                if ($this->publicacion->encabezado_color != '') {
                    $a[] = "    <div class=\"encabezado\" style=\"background-color:{$this->publicacion->encabezado_color};\">";
                } else {
                    $a[] = '    <div class="encabezado">';
                }
                $a[] = "      <span><h1>$encabezado</h1></span>";
                $a[] = '    </div>';
            }
            if ($autor_fecha != '') {
                $a[] = "    <p class=\"autor-fecha\">$autor_fecha</p>";
            }
            $a[] = '  </header>';
            $a[] = $this->publicacion->html();
            $a[] = '</article>';
        }
        // Agregar botones para compartir en redes sociales
        if ($this->publicacion->para_compartir && (strtolower($this->publicacion->estado) == 'publicar')) {
            $a[] = '<div class="contenido-social">';
            $a[] = '  <h5>Compartir en Redes Sociales</h5>';
            $a[] = '  <a href="https://twitter.com/share" class="twitter-share-button" data-via="trcimplan" data-lang="es">Twittear</a>';
            $a[] = '  <iframe src="//www.facebook.com/plugins/like.php?href='.urlencode($this->publicacion->url_absoluto()).'&amp;width=300&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe>';
            $a[] = '</div>';
        }
        // Entregar
        return implode("\n", $a);
    } // html

    /**
     * Javascript
     *
     * @return string Código Javascript
     */
    public function javascript() {
        // Acumularemos la entrega en este arreglo
        $a = array();
        // Acumular Javascript de la publicación
        $js = $this->publicacion->javascript();
        if (substr(trim($js), 0, 7) == '<script') {
            $a[] = $js;
        } else {
            $a[] = "<script>\n$js\n</script>";
        }
        // Acumular Javascript de Twitter
        if ($this->publicacion->para_compartir && (strtolower($this->publicacion->estado) == 'publicar')) {
            $a[] = <<<FINAL
<script>
  // Twitter
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
FINAL;
        }
        // Entregar
        return implode("\n", $a);
    } // javascript

} // Clase Completo

?>
