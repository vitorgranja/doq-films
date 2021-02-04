<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */


/* Check if Class Exists. */
if ( ! class_exists( 'Filix_Nav_Walker_Two' ) ) {
    /**
     * WP_Bootstrap_Navwalker class.
     *
     * @extends Walker_Nav_Menu
     */
    class Filix_Nav_Walker_Two extends Walker_Nav_Menu {

        /**
         * Start Level.
         *
         * @see Walker::start_lvl()
         * @since 3.0.0
         *
         * @access public
         * @param mixed $output Passed by reference. Used to append additional content.
         * @param int   $depth (default: 0) Depth of page. Used for padding.
         * @param array $args (default: array()) Arguments.
         * @return void
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent  = str_repeat( "\t", $depth );
            $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\" >\n";
        }

        /**
         * Start El.
         *
         * @see Walker::start_el()
         * @since 3.0.0
         *
         * @access public
         * @param mixed $output Passed by reference. Used to append additional content.
         * @param mixed $item Menu item data object.
         * @param int   $depth (default: 0) Depth of menu item. Used for padding.
         * @param array $args (default: array()) Arguments.
         * @param int   $id (default: 0) Menu item ID.
         * @return void
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';


            if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
                $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
            } elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
                $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
            } else {
                $value       = '';
                $class_names = $value;
                $classes     = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[]   = 'nav-item menu-item-' . $item->ID;
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
                if ( isset( $args->has_children ) && $args->has_children && $depth == 0 ) {
                    $class_names .= ' submenu';
                }
                if ( in_array( 'current-menu-item', $classes, true ) ) {
                    $class_names .= ' active';
                }
                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
                $id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
                $id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                $output     .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . '>';
                $atts        = array();

                if ( empty( $item->attr_title ) ) {
                    $atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
                } else {
                    $atts['title'] = $item->attr_title;

                }
                $atts['target'] = ! empty( $item->target ) ? $item->target : '';
                $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
                // If item has_children add atts to a.
                if ( $depth == 0 ) {
                    $atts['href'] = !empty($item->url) ? $item->url : '';
                    $atts['class'] = 'nav-link';
                } else {
                    $atts['href'] = !empty($item->url) ? $item->url : '';
                }

                $atts            = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
                $icon_attributes = '';
                $attributes      = '';
                foreach ( $atts as $attr => $value ) {
                    if ( ! empty( $value ) ) {
                        $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                        // if item has icon, we want all except title attributes because we
                        // want to avoid link title to be icon class.
                        if ( 'title' != $attr ) {
                            $icon_attributes .= ' ' . $attr . '="' . $value . '"';
                        }
                    }
                }
                $item_output = isset( $args->before ) ? $args->before : '';

                /*
                 * Glyphicons/Font-Awesome
                 * ===========
                 * Since the the menu item is NOT a Divider or Header we check the see
                 * if there is a value in the attr_title property. If the attr_title
                 * property is NOT null we apply it as the class name for the glyphicon.
                 */
                if ( ! empty( $item->attr_title ) ) {
                    $pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
                    if ( false !== $pos ) {
                        $item_output .= '<a' . $icon_attributes . ' title="' . esc_attr( $item->title ) . '"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
                    } else {
                        $item_output .= '<a' . $icon_attributes . ' title="' . esc_attr( $item->title ) . '"><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
                    }
                } else {
                    $item_output .= '<a ' . $attributes . '>';
                }
                $item_output .= isset( $args->link_before ) ? $args->link_before : '';
                $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
                $item_output .= isset( $args->link_after ) ? $args->link_after: '';
                $item_output .= ( isset( $args->has_children ) && $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
                $item_output .= isset( $args->after ) ? $args->after : '';
                $output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            } // End if().
        }

        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth.
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @see Walker::start_el()
         * @since 2.5.0
         *
         * @access public
         * @param mixed $element Data object.
         * @param mixed $children_elements List of elements to continue traversing.
         * @param mixed $max_depth Max depth to traverse.
         * @param mixed $depth Depth of current element.
         * @param mixed $args Arguments.
         * @param mixed $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
        public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
            if ( ! $element ) {
                return; }
            $id_field = $this->db_fields['id'];
            // Display this element.
            if ( is_object( $args[0] ) ) {
                $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

    }
} // End if().
