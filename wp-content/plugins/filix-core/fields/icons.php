<?php

/**
 * FlatIcons
 */
function filix_flat_icons() {
    $flat_icons = 'flaticon-right, flaticon-play-button, flaticon-play-button-1, flaticon-next, flaticon-next-1, flaticon-back, flaticon-back-1, flaticon-tick, flaticon-checked, flaticon-close, flaticon-cancel, flaticon-star, flaticon-star-1, flaticon-web, flaticon-value, flaticon-login, flaticon-dollar-symbol, flaticon-left-quote, flaticon-mic, flaticon-user, flaticon-play-button-2, flaticon-menu, flaticon-menu-1, flaticon-setup';
    $flat_icons = explode(', ', $flat_icons);
    return filix_icon_array($flat_icons, 'flaticon', '-');
}

function filix_include_flaticon_icons() {
    return array_keys(filix_flat_icons());
}