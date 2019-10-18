<?php
/*
Plugin Name: Dimox Breadcrumbs
Plugin URI: https://github.com/WestCoastDigital/WordPress-Breadcrumbs
Description: Breadcrumbs for WordPress
Version: 2019.03.03
Author: Dimox
Author URI: http://dimox.net/wordpress-breadcrumbs-without-a-plugin
Text Domain: dimox
Domain Path: /languages
 */

if (!function_exists('dimox_customiser')) {
    function dimox_customiser($wp_customize)
    {
        /**
         * Add breadcrumb panel
         */
        $wp_customize->add_panel('dimox_breadcrumbs',
            array(
                'title' => __('Dimox Breadcrumbs', 'dimox'),
                'description' => esc_html__('Settings for breadcrumbs.', 'dimox'),
            )
        );
        /**
         * Add default text section
         */
        $wp_customize->add_section('dimox_breadcrumb_text',
            array(
                'title' => __('Default Text', 'dimox'),
                'description' => esc_html__('Set the default text for pages.', 'dimox'),
                'panel' => 'dimox_breadcrumbs',
            )
        );
        /**
         * Add settings section
         */
        $wp_customize->add_section('dimox_breadcrumb_settings',
            array(
                'title' => __('Settings', 'dimox'),
                'description' => esc_html__('Set the settings ', 'dimox'),
                'panel' => 'dimox_breadcrumbs',
            )
        );
        /**
         * Home text
         */
        $wp_customize->add_setting('dimox_home_text',
            array(
                'default' => __('Home', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_home_text',
            array(
                'label' => __('Home Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Category text
         */
        $wp_customize->add_setting('dimox_archive_text',
            array(
                'default' => __('Archive by Category', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_archive_text',
            array(
                'label' => __('Archive Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Search text
         */
        $wp_customize->add_setting('dimox_search_text',
            array(
                'default' => __('Search Results for', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_search_text',
            array(
                'label' => __('Search Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Tag text
         */
        $wp_customize->add_setting('dimox_tag_text',
            array(
                'default' => __('Posts Tagged', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_tag_text',
            array(
                'label' => __('Tag Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Author text
         */
        $wp_customize->add_setting('dimox_author_text',
            array(
                'default' => __('Articles Posted by', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_author_text',
            array(
                'label' => __('Author Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Error text
         */
        $wp_customize->add_setting('dimox_error_text',
            array(
                'default' => __('Error 404', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_error_text',
            array(
                'label' => __('404 Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Page text
         */
        $wp_customize->add_setting('dimox_page_text',
            array(
                'default' => __('Page', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_page_text',
            array(
                'label' => __('Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Comment text
         */
        $wp_customize->add_setting('dimox_comment_text',
            array(
                'default' => __('Comment Page', 'dimox'),
            )
        );
        $wp_customize->add_control('dimox_comment_text',
            array(
                'label' => __('Comment Page Text', 'dimox'),
                'section' => 'dimox_breadcrumb_text',
            )
        );
        /**
         * Show on home page
         */
        $wp_customize->add_setting('dimox_on_home',
            array(
                'default' => 0,
            )
        );
        $wp_customize->add_control('dimox_on_home',
            array(
                'label' => __('Show On Home Page', 'dimox'),
                'section' => 'dimox_breadcrumb_settings',
                'type' => 'checkbox',
            )
        );
        /**
         * Show return home
         */
        $wp_customize->add_setting('dimox_home_link',
            array(
                'default' => 1,
            )
        );
        $wp_customize->add_control('dimox_home_link',
            array(
                'label' => __('Show Return Home', 'dimox'),
                'section' => 'dimox_breadcrumb_settings',
                'type' => 'checkbox',
            )
        );
        /**
         * Show current page
         */
        $wp_customize->add_setting('dimox_current_page',
            array(
                'default' => 1,
            )
        );
        $wp_customize->add_control('dimox_current_page',
            array(
                'label' => __('Show Current Page', 'dimox'),
                'section' => 'dimox_breadcrumb_settings',
                'type' => 'checkbox',
            )
        );
        /**
         * Show last seperator
         */
        $wp_customize->add_setting('dimox_last_sep',
            array(
                'default' => 1,
            )
        );
        $wp_customize->add_control('dimox_last_sep',
            array(
                'label' => __('Show Last Seperator', 'dimox'),
                'section' => 'dimox_breadcrumb_settings',
                'type' => 'checkbox',
            )
        );
        /**
         * Seperator
         */
        $wp_customize->add_setting('dimox_seperator',
            array(
                'default' => '>'
            )
        );
        $wp_customize->add_control('dimox_seperator',
            array(
                'label' => __('Seperator', 'dimox'),
                'section' => 'dimox_breadcrumb_settings',
            )
        );
    };
    add_action('customize_register', 'dimox_customiser');
}

if (!function_exists('dimox_breadcrumbs')) {
    function dimox_breadcrumbs()
    {

        /* === OPTIONS === */
        $homeText = get_theme_mod('dimox_home_text') ? get_theme_mod('dimox_home_text') : __('Home', 'dimox');
        $archiveText = get_theme_mod('dimox_archive_text') ? get_theme_mod('dimox_archive_text') : __('Archive by Category', 'dimox');
        $searchText = get_theme_mod('dimox_search_text') ? get_theme_mod('dimox_search_text') : __('Search Results for', 'dimox');
        $tagText = get_theme_mod('dimox_tag_text') ? get_theme_mod('dimox_tag_text') : __('Posts Tagged', 'dimox');
        $authorText = get_theme_mod('dimox_author_text') ? get_theme_mod('dimox_author_text') : __('Articles Posted by', 'dimox');
        $errorText = get_theme_mod('dimox_error_text') ? get_theme_mod('dimox_error_text') : __('Error 404', 'dimox');
        $pageText = get_theme_mod('dimox_page_text') ? get_theme_mod('dimox_page_text') : __('Page', 'dimox');
        $commentText = get_theme_mod('dimox_comment_text') ? get_theme_mod('dimox_comment_text') : __('Comment Page', 'dimox');
        $onHome = get_theme_mod('dimox_on_home') ? get_theme_mod('dimox_on_home') : 0;
        $homeLink = get_theme_mod('dimox_home_link') ? get_theme_mod('dimox_home_link') : 1;
        $currentPage = get_theme_mod('dimox_current_page') ? get_theme_mod('dimox_current_page') : 1;
        $lastSep = get_theme_mod('dimox_last_sep') ? get_theme_mod('dimox_last_sep') : 1;
        $seperator = get_theme_mod('dimox_seperator') ? get_theme_mod('dimox_seperator') : '>';

        $text['home'] = $homeText; // text for the 'Home' link
        $text['category'] = $archiveText . ' "%s"'; // text for a category page
        $text['search'] = $searchText . ' "%s"'; // text for a search results page
        $text['tag'] = $tagText . ' "%s"'; // text for a tag page
        $text['author'] = $authorText . ' %s'; // text for an author page
        $text['404'] = $errorText; // text for the 404 page
        $text['page'] = $pageText . ' %s'; // text 'Page N'
        $text['cpage'] = $commentText . ' %s'; // text 'Comment Page N'

        $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
        $wrap_after = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
        $sep = '<span class="breadcrumbs__separator"> ' . $seperator . ' </span>'; // separator between crumbs
        $before = '<span class="breadcrumbs__current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb

        $show_on_home = $onHome; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $show_home_link = $homeLink; // 1 - show the 'Home' link, 0 - don't show
        $show_current = $currentPage; // 1 - show current page title, 0 - don't show
        $show_last_sep = $lastSep; // 1 - show last separator, when current page title is not displayed, 0 - don't show
        /* === END OF OPTIONS === */

        global $post;
        $home_url = home_url('/');
        $link = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        $link .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
        $link .= '<meta itemprop="position" content="%3$s" />';
        $link .= '</span>';
        $parent_id = ($post) ? $post->post_parent : '';
        $home_link = sprintf($link, $home_url, $text['home'], 1);

        if (is_home() || is_front_page()) {

            if ($show_on_home) {
                echo $wrap_before . $home_link . $wrap_after;
            }

        } else {

            $position = 0;

            echo $wrap_before;

            if ($show_home_link) {
                $position += 1;
                echo $home_link;
            }

            if (is_category()) {
                $parents = get_ancestors(get_query_var('cat'), 'category');
                foreach (array_reverse($parents) as $cat) {
                    $position += 1;
                    if ($position > 1) {
                        echo $sep;
                    }

                    echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                }
                if (get_query_var('paged')) {
                    $position += 1;
                    $cat = get_query_var('cat');
                    echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                    echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_current) {
                        if ($position >= 1) {
                            echo $sep;
                        }

                        echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
                    } elseif ($show_last_sep) {
                        echo $sep;
                    }

                }

            } elseif (is_search()) {
                if (get_query_var('paged')) {
                    $position += 1;
                    if ($show_home_link) {
                        echo $sep;
                    }

                    echo sprintf($link, $home_url . '?s=' . get_search_query(), sprintf($text['search'], get_search_query()), $position);
                    echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_current) {
                        if ($position >= 1) {
                            echo $sep;
                        }

                        echo $before . sprintf($text['search'], get_search_query()) . $after;
                    } elseif ($show_last_sep) {
                        echo $sep;
                    }

                }

            } elseif (is_year()) {
                if ($show_home_link && $show_current) {
                    echo $sep;
                }

                if ($show_current) {
                    echo $before . get_the_time('Y') . $after;
                } elseif ($show_home_link && $show_last_sep) {
                    echo $sep;
                }

            } elseif (is_month()) {
                if ($show_home_link) {
                    echo $sep;
                }

                $position += 1;
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position);
                if ($show_current) {
                    echo $sep . $before . get_the_time('F') . $after;
                } elseif ($show_last_sep) {
                    echo $sep;
                }

            } elseif (is_day()) {
                if ($show_home_link) {
                    echo $sep;
                }

                $position += 1;
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position) . $sep;
                $position += 1;
                echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'), $position);
                if ($show_current) {
                    echo $sep . $before . get_the_time('d') . $after;
                } elseif ($show_last_sep) {
                    echo $sep;
                }

            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $position += 1;
                    $post_type = get_post_type_object(get_post_type());
                    if ($position > 1) {
                        echo $sep;
                    }

                    echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);
                    if ($show_current) {
                        echo $sep . $before . get_the_title() . $after;
                    } elseif ($show_last_sep) {
                        echo $sep;
                    }

                } else {
                    $cat = get_the_category();
                    $catID = $cat[0]->cat_ID;
                    $parents = get_ancestors($catID, 'category');
                    $parents = array_reverse($parents);
                    $parents[] = $catID;
                    foreach ($parents as $cat) {
                        $position += 1;
                        if ($position > 1) {
                            echo $sep;
                        }

                        echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                    }
                    if (get_query_var('cpage')) {
                        $position += 1;
                        echo $sep . sprintf($link, get_permalink(), get_the_title(), $position);
                        echo $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                    } else {
                        if ($show_current) {
                            echo $sep . $before . get_the_title() . $after;
                        } elseif ($show_last_sep) {
                            echo $sep;
                        }

                    }
                }

            } elseif (is_post_type_archive()) {
                $post_type = get_post_type_object(get_post_type());
                if (get_query_var('paged')) {
                    $position += 1;
                    if ($position > 1) {
                        echo $sep;
                    }

                    echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label, $position);
                    echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_home_link && $show_current) {
                        echo $sep;
                    }

                    if ($show_current) {
                        echo $before . $post_type->label . $after;
                    } elseif ($show_home_link && $show_last_sep) {
                        echo $sep;
                    }

                }

            } elseif (is_attachment()) {
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID);
                $catID = $cat[0]->cat_ID;
                $parents = get_ancestors($catID, 'category');
                $parents = array_reverse($parents);
                $parents[] = $catID;
                foreach ($parents as $cat) {
                    $position += 1;
                    if ($position > 1) {
                        echo $sep;
                    }

                    echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                }
                $position += 1;
                echo $sep . sprintf($link, get_permalink($parent), $parent->post_title, $position);
                if ($show_current) {
                    echo $sep . $before . get_the_title() . $after;
                } elseif ($show_last_sep) {
                    echo $sep;
                }

            } elseif (is_page() && !$parent_id) {
                if ($show_home_link && $show_current) {
                    echo $sep;
                }

                if ($show_current) {
                    echo $before . get_the_title() . $after;
                } elseif ($show_home_link && $show_last_sep) {
                    echo $sep;
                }

            } elseif (is_page() && $parent_id) {
                $parents = get_post_ancestors(get_the_ID());
                foreach (array_reverse($parents) as $pageID) {
                    $position += 1;
                    if ($position > 1) {
                        echo $sep;
                    }

                    echo sprintf($link, get_page_link($pageID), get_the_title($pageID), $position);
                }
                if ($show_current) {
                    echo $sep . $before . get_the_title() . $after;
                } elseif ($show_last_sep) {
                    echo $sep;
                }

            } elseif (is_tag()) {
                if (get_query_var('paged')) {
                    $position += 1;
                    $tagID = get_query_var('tag_id');
                    echo $sep . sprintf($link, get_tag_link($tagID), single_tag_title('', false), $position);
                    echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_home_link && $show_current) {
                        echo $sep;
                    }

                    if ($show_current) {
                        echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                    } elseif ($show_home_link && $show_last_sep) {
                        echo $sep;
                    }

                }

            } elseif (is_author()) {
                $author = get_userdata(get_query_var('author'));
                if (get_query_var('paged')) {
                    $position += 1;
                    echo $sep . sprintf($link, get_author_posts_url($author->ID), sprintf($text['author'], $author->display_name), $position);
                    echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_home_link && $show_current) {
                        echo $sep;
                    }

                    if ($show_current) {
                        echo $before . sprintf($text['author'], $author->display_name) . $after;
                    } elseif ($show_home_link && $show_last_sep) {
                        echo $sep;
                    }

                }

            } elseif (is_404()) {
                if ($show_home_link && $show_current) {
                    echo $sep;
                }

                if ($show_current) {
                    echo $before . $text['404'] . $after;
                } elseif ($show_last_sep) {
                    echo $sep;
                }

            } elseif (has_post_format() && !is_singular()) {
                if ($show_home_link && $show_current) {
                    echo $sep;
                }

                echo get_post_format_string(get_post_format());
            }

            echo $wrap_after;

        }
    } // end of dimox_breadcrumbs()
    add_shortcode('dimox_breadcrumbs', 'dimox_breadcrumbs');
}
