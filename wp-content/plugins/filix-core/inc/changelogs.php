<?php
// Version Notice
function filix_notice() {
    global $current_user;
    $user_id = $current_user->ID;
    $my_theme = wp_get_theme();
    if ( !get_user_meta($user_id, "'".strtolower($my_theme->get('Name')).$my_theme->get('Version')."'".'_notice_ignore' ) ) {
        $changes = fopen(get_stylesheet_directory()."/changes.txt", "r");
        $change_logs = '';
        while ( !feof($changes) ) {
            $change_logs .= fgets($changes);
        }
        $change_logs = explode(PHP_EOL.PHP_EOL, $change_logs);
        $last_logs = explode(PHP_EOL, $change_logs[0]);
        fclose($changes);
        ?>
        <div class="notice notice-info">
            <p><?php esc_html_e( 'You just have activated the ', 'filix' );
                echo '<strong>'.$my_theme->get( 'Name' ) . ' ' . $my_theme->get( 'Version' ).'</strong> '  ?>
                <?php esc_html_e( 'In this version we have made the following major changes. You can see the full list of changelogs ', 'filix' ); ?>
                <a href="https://is.gd/Mv3YxH" target="_blank"> <?php esc_html_e( 'here', 'filix' ); ?> </a>
            </p>
            <ul>
                <?php
                if ( $last_logs ) {
                    foreach ( $last_logs as $i => $last_log ) {
                        if ( $i == 0 ) {
                            continue;
                        }
                        $last_log_split = explode( ':', $last_log );
                        if ( !empty($last_log_split[0]) ) :
                            ?>
                            <li>
                                <strong> <?php echo esc_html($last_log_split[0]) ?> : </strong>
                                <?php echo !empty($last_log_split[1]) ? esc_html($last_log_split[1]) : ''; ?>
                            </li>
                        <?php
                        endif;
                    }
                }
                ?>
            </ul>
            <p> <a class="filix-close-notice dismiss-notice" href="?filix-ignore-notice">
                    <i class="dashicons dashicons-no-alt"></i>
                    <span> <?php esc_html_e( 'Dismiss', 'filix' ); ?> </span>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'filix_notice' );
add_action( 'switch_theme', 'filix_notice' );


function filix_notice_ignore() {
    global $current_user;
    $user_id = $current_user->ID;
    $my_theme = wp_get_theme();
    if (isset($_GET['filix-ignore-notice'])) {
        add_user_meta($user_id, "'".strtolower($my_theme->get('Name')).$my_theme->get('Version')."'".'_notice_ignore', 'true', true);
    }
}
add_action( 'admin_init', 'filix_notice_ignore' );