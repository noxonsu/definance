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
                  <label><?php echo esc_html('Home page'); ?></label>
                </th>
                <td>
                  <div class="definance-form-inline">
                    <input type="checkbox" name="definance_as_homepage" id="definance_as_homepage" <?php echo (get_option('definance_as_homepage', 'false') == 'true') ? 'checked' : '' ?> />
                    <label for="definance_as_homepage"><?php echo esc_html('Show at front home page'); ?></label>
                  </div>
                </td>
              </tr>
              <!--
              <tr>
                <th scope="row">
                  <label><?php echo esc_html('Shortcode'); ?></label>
                </th>
                <td>
                  <div class="definance-form-inline">
                    <input type="text" value="[definance_widget]" readonly id="definance_shortcode_select" />
                    <script type="text/javascript">
                      (() => {
                        const definance_shortcode = document.getElementById('definance_shortcode_select');
                        jQuery(definance_shortcode).on('focus', function (e) {
                          jQuery(definance_shortcode).select()
                        })
                        jQuery(definance_shortcode).on('click', function (e) {
                          jQuery(definance_shortcode).select()
                        })
                      })()
                    </script>
                  </div>
                  <div class="definance-form-inline">
                    <span><?php echo esc_html('Use this &quot;shortcode&quot; to add definance widget to desired page');?></span>
                  </div>
                </td>
              </tr>
              -->
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