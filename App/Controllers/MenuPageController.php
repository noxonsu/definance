<?php
namespace DEFINANCE\Controllers;

use DEFINANCE\Controller;

class MenuPageController extends Controller
{


    /**
     *
     */
    public function handle()
    {
        add_action('admin_menu', array($this, 'menu'));


    }

    public function menu()
    {
        add_menu_page(
            esc_html__('De Finance', 'de-finance'),
            esc_html__('De Finance', 'de-finance'),
            'manage_options',
            'definance',
            [$this, 'page'],
            'dashicons-admin-site-alt3',
            81
        );
    }

    public function page()
    {
        $this->handleRequest();
        $this->view->display('/settings.php');
    }

    public function handleRequest()
    {

        if ( ! empty($_POST['definance_icon'])) {
            foreach ($_POST as $k => $v) {
                if (preg_match('#definance#', $k)) {
                    update_option(esc_attr($k), sanitize_textarea_field($v));
                }

            }

            ?>
            <div id="message" class="notice notice-success is-dismissible">
            <p><?php esc_html_e('Settings saved','de-finance'); ?></p>
                <button type="button" class="notice-dismiss"><span
                            class="screen-reader-text"><?php esc_html_e('Dismiss this notice.','de-finance'); ?></span>
                </button>
            </div>
            <?php


            ob_start();
            include DEFINANCE_BASE_DIR.'/vendor/build/static/js/main.577d9abe.chunk.js';

            $js = ob_get_clean();
            if (isset($_POST['definance_icon'][1])) {

                preg_match_all('#244\:function\(e\,n\,t\){e.exports=t.p\+"(.*?)"#', $js, $math);
                $url = str_replace(get_home_url('') . '/',  '', $_POST['definance_icon']);
                $js  = str_replace($math[1], $url, $js);


            }
            if (isset($_POST['definance_icon2'][1])) {


                preg_match_all('#242\:function\(e\,n\,t\){e.exports=t.p\+"(.*?)"#', $js, $math);
                $url = str_replace(get_home_url() . '/', '', $_POST['definance_icon2']);

                $js = str_replace($math[1], $url, $js);
            }
            file_put_contents(DEFINANCE_BASE_DIR.'/vendor/build/static/js/main.577d9abe.chunk.js', $js);
        }
    }


}