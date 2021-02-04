<?php

// Color option
Redux::setSection('filix_opt', array(
	'title'     => esc_html__('Color Settings', 'filix'),
	'id'        => 'color',
	'icon'      => 'dashicons dashicons-admin-appearance',
	'fields'    => array(
        array(
            'id'          => 'accent_solid_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Accent Color', 'filix' ),
            'output'      => array(
                'color' => '
                    header.header .navbar .select_lang a:hover, header.header .opnen_menu .header_main_menu .menu_item li a:hover, header.header .opnen_menu .header_main_menu .menu_item li.submenu .submenu_item li a:hover, header.header .sub_footer .footer_contact li a:hover span, header.header .sub_footer .footer_social li a:hover, .hero_warp .social_link li a:hover i, .portfolio_item .port_text .catagory a:hover, .capabiliti_wrap .capabiliti_tab li a.active, .capabiliti_wrap .capabiliti_tab li a:hover, .capabiliti_wrap .capabiliti_tab_content .tab-pane .service_item .content a:hover h4, .footer .footer_contact li a:hover span, .footer .footer_social li a:hover i, .footer .footer_copy_right a:hover, header.header .navbar .hamburger:hover, .project_summary_list li a:hover span, .blog_single_item .blog_post .post_content .read_more:hover, .pagination_content .navigation .pagination li:first-child a:hover, .pagination_content .navigation .pagination li:last-child a:hover, .widget .media .media-body .recent_post_meta li a:hover, .comment-list li .media .media-body .reply_body .reply_link:hover, .contact_form .form-group .sibmit_btn:hover, .hero_warp .banner_content .exp_list li + li:before, .portfolio_warp .filter_menu li:hover, .portfolio_warp .filter_menu li.active, .portfolio_item .port_text .catagory, .footer .footer_copy_right i, .blog_single_item .blog_post .post_content .post_title a:hover, .widget .media .media-body .tn_tittle a:hover, .blog_single_item .blog_post .post_content .read_more, .comment-reply-link:hover, input[type="submit"]:hover, .contact_form .sibmit_btn:hover, .somethings_interesting_wrap .interesting_item .interesting_content p a:hover span, .portfolio_item .exp:hover, header.header .navbar .select_lang a.active, header.header .navbar .select_lang a:hover, .comment-list li .media .media-body .reply_body .reply_link:hover i,
                    .filix_breadcrumb_link li a,
                    .job_listing .job_list_tab .list_item_tab.active, .job_listing .job_list_tab .list_item_tab:hover,
                    .job_listing .listing_tab .list_item .joblisting_text h4 a:hover,
                    .job_details_area ul li:before, .job_info .info_head i, .job_info .info_item i,
                    .catagory_single_item .wpcf7-list-item span.wpcf7-list-item-label,
                    header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item:hover a.nav-link, header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item.active a.nav-link
                    ',
                'background-color' => '
                    header.header .navbar .hamburger:hover .bar_icon .bar, .portfolio_item .port_text .catagory a:hover:before, .portfolio_item:hover .exp:before, .portfolio_item .exp:after, .portfolio_item .exp span.exp_inner:before, .portfolio_item .exp span.exp_inner:after, .portfolio_item .exp span.exp_hover:before, .portfolio_item .exp span.exp_hover:after, .about_wrap .about_content h4 a:hover:before, .go_to_top a, header.header.header_style_one .navbar .header_menu ul li.nav-item a.nav-link:before, .portfolio_warp .filter_menu li::before, .about_wrap .about_title:before, .capabiliti_wrap .capabiliti_title:before, .testimonial_wrap .test_left .test_title:before, header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item:hover a.nav-link::before, header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item.active a.nav-link::before, .about_wrap .about_content h4 a:before, header.header.header_style_one.fixedMenu .navbar .hamburger .bar_icon .bar, header.header.header_style_one .navbar .header_menu ul li.nav-item.active a.nav-link:before, .tag-cloud-link:hover,
                    .job_listing .job_list_tab .list_item_tab:before,
                    .catagory_single_item .wpcf7-list-item input:checked + span.wpcf7-list-item-label
                    ',
                'border-color' => '
                    .job_listing .listing_tab .list_item:hover,
                    .catagory_single_item .wpcf7-list-item span.wpcf7-list-item-label,
                    .contact_form .form-group .sibmit_btn
                    '

            ),
        ),
	)
));