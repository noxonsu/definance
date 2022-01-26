<div class="wrap">
  <div class="welcome-panel">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <h2 class="nav-tab-wrapper definance-nav-tabs wp-clearfix">
      <a href="#definance-tab-1" class="nav-tab nav-tab-active">
        <?php esc_html_e('Main Setting', 'definance'); ?>
      </a>
    </h2>

    <div class="welcome-panel-column-container definance-panel-tab panel-tab-active" id="definance-tab-1">
      <div class="definance-shortcode-panel-row">
        <form action="#" method="post" class="wp-definance-widget-form">
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Permalink', 'definance'); ?></label>
                </th>
                <td>
                  <code><?php echo esc_url( home_url('/') );?></code>
									<input name="definance_page_slug" type="text" value="<?php echo esc_attr( definance_page_slug() );?>" class="regular-text code" <?php disabled( get_option( 'definance_as_homepage' ), 'true' ); ?>>
									<code>/</code>
									<a href="<?php echo definance_page_url();?>" class="button mcwallet-button-url<?php if( get_option( 'definance_as_homepage' ) ) { echo ' disabled';}?>" target="_blank"><?php esc_html_e( 'View page', 'definance' );?></a>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Home page'); ?></label>
                </th>
                <td>
                  <div class="definance-form-inline">
                    <input type="checkbox" name="definance_as_homepage" id="definance_as_homepage" <?php echo (get_option('definance_as_homepage', 'false') == 'true') ? 'checked' : '' ?> />
                    <label for="definance_as_homepage"><?php echo esc_html('Show at front home page'); ?></label>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('DAO Blockchain'); ?></label>
                </th>
                <td>
                  <select name="definance_blockchain" id="definance_blockchain">
                    <?php
                      $definance_blockchain = get_option('definance_blockchain', '56');
                    ?>
                    <?php foreach (definance_get_blockchains() as $chainId => $networkInfo) { ?>
                    <option value="<?php esc_attr_e($networkInfo['chainId']);?>" <?php echo (intval($definance_blockchain) === intval($chainId)) ? 'selected' : ''?>><?php esc_html_e($networkInfo['name']);?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Master address'); ?></label>
                </th>
                <td>
                  <input type="text" name="definance_master_address" id="definance_master_address" value="<?php esc_attr_e(get_option('definance_master_address', '0x....'))?>" />
                  <p class="description">
                    <?php esc_html_e('Put here your master address'); ?>
                  </p>
                </td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>
                  <input type="submit" name="mcwallet-add-token"
                    class="button button-primary mcwallet-add-token"
                    value="<?php esc_attr_e('Save', 'definance'); ?>" />
                  <span class="spinner"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>