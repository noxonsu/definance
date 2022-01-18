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
    if (isset( $_POST['definance_as_homepage'] ) and ( $_POST['definance_as_homepage'] == 'on' ) ) {
      update_option('definance_as_homepage', 'true');
    } else {
      delete_option('definance_as_homepage');
    }
    if (isset( $_POST['definance_page_slug'] )) {
      update_option('definance_slug', untrailingslashit( sanitize_title( $_POST['definance_page_slug'] ) ));
    }
    ?>
    <div id="message" class="notice notice-success is-dismissible">
      <p><?php esc_html_e('Settings saved','de-finance'); ?></p>
    </div>
    <?php

  }


}