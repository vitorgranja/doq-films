<?php
$opt = get_option('saasland_opt');
$is_menu_btn = !empty($opt['is_menu_btn']) ? $opt['is_menu_btn'] : '';
$menu_btn_title = !empty($opt['menu_btn_label']) ? $opt['menu_btn_label'] : '';
$menu_btn_url = !empty($opt['menu_btn_url']) ? $opt['menu_btn_url'] : '';
$btn_style = !empty($opt['btn_style']) ? $opt['btn_style'] : '';
switch ($btn_style) {
    case '1':
        $classes = 'btn_get btn-meta btn_hover';
        break;
    case '2':
        $classes = 'btn_get btn-meta login_btn active';
        break;
    case '3':
        $classes = 'btn_get btn-meta btn_get_radious';
        break;
    default:
        $classes = 'btn_get btn-meta btn_hover';
        break;
}
?>


    <li class="nav-item get_start">
        <a class="nav-link" href="#">Get started</a>
    </li>
