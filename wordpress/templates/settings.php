<div class="wrap">
  <div class="">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <h2 class="nav-tab-wrapper definance-nav-tabs wp-clearfix">
      <a href="#definance-tab-1" class="nav-tab nav-tab-active">
        <?php esc_html_e('Main Setting', 'definance'); ?>
      </a>
    </h2>

    <div class="definance-panel-tab panel-tab-active" id="definance-tab-1">
      <div class="definance-shortcode-panel-row">
        <form action="#" method="post" class="wp-definance-widget-form">
          <input type="hidden" name="definance_save_setting" value="yes" />
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Permalink', 'definance'); ?></label>
                </th>
                <td>
                  <code><?php echo esc_url( home_url('/') );?></code>
									<input name="definance_page_slug" id="definance_page_slug" type="text" value="<?php echo esc_attr( definance_page_slug() );?>" class="regular-text code" <?php disabled( get_option( 'definance_as_homepage' ), 'true' ); ?>>
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
                    <script type="text/javascript">
                      (($) => {
                        $('#definance_as_homepage').on('change', function (e) {
                          if ($('#definance_as_homepage')[0].checked) {
                            $('#definance_page_slug').attr('disabled', true)
                          } else {
                            $('#definance_page_slug').attr('disabled', false)
                          }
                        })
                      })(jQuery)
                    </script>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Availbale networks'); ?></label>
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
                  <br />
                  <select name="definance_blockchain2" id="definance_blockchain2">
                  <option value='0'>Select</option>
                    <?php
                      $definance_blockchain2 = get_option('definance_blockchain2', '0');
                    ?>
                    <?php foreach (definance_get_blockchains() as $chainId => $networkInfo) { ?>
                    <option value="<?php esc_attr_e($networkInfo['chainId']);?>" <?php echo (intval($definance_blockchain2) === intval($chainId)) ? 'selected' : ''?>><?php esc_html_e($networkInfo['name']);?></option>
                    <?php } ?>
                  </select>
                  <br />
                  <select name="definance_blockchain3" id="definance_blockchain3">
                  <option value='0'>Select</option>
                    <?php
                      $definance_blockchain3 = get_option('definance_blockchain3', '0');
                    ?>
                    <?php foreach (definance_get_blockchains() as $chainId => $networkInfo) { ?>
                    <option value="<?php esc_attr_e($networkInfo['chainId']);?>" <?php echo (intval($definance_blockchain3) === intval($chainId)) ? 'selected' : ''?>><?php esc_html_e($networkInfo['name']);?></option>
                    <?php } ?>
                  </select> <Br> <?php echo esc_html('Need more or a network not in the list? Contact support@onout.org'); ?>
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