<?php
namespace DEFINANCE\Controllers;

use DEFINANCE\Controller;


class HomePageController extends Controller {


	/**
	 *
	 */
	public function handle() {
		add_action( 'template_include', array( $this, 'template' ) );


	}

	public function template($template) {
        if ( is_front_page() || is_home() ) {

            return DEFINANCE_TEMPLATE_DIR  .'/home_new.php';
        }

        return $template;
	}





}