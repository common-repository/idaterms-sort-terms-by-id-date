<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://ceslava.com
 * @since      1.0.0
 *
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/admin
 * @author     Cristian Eslava <cristianeslava@hotmail.com>
 */
class Idaterms_Sort_Terms_By_Date_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        add_action('admin_menu', array(
            $this,
            'admin_menu'
        ));
         		
    }
 
	
    public function admin_menu()
    {
        add_options_page('IDATERMS', 'IDATERMS', 'manage_options', 'sort_taxonomies_date', array(
            $this,
            'settings_page'
        ));
        register_setting('sort_taxonomies_date', 'idaterms_options');
        add_settings_section('idaterms_section', __('Sort your taxonomies by Date', 'idaterms-sort-terms-by-id-date'), 'idaterms_fields', 'sort_taxonomies_date');
		add_option( 'idaterms_options', array(
			 'post_tag' => '1',
			 'category' => '1'

			) );
        function idaterms_fields()
        {
            add_settings_field('idaterms_post_tag', 'post_tag', 'idaterms_post_tag_html', 'sort_taxonomies_date', 'idaterms_section', array(
                'label_for' => 'post_tag', 'checked' => checked
            ));
            add_settings_field('idaterms_category', 'category', 'idaterms_post_tag_html', 'sort_taxonomies_date', 'idaterms_section', array(
                'label_for' => 'category', 'checked' => checked
            ));
			
			
			
            function idaterms_post_tag_html($args)
            {
                $options = get_option('idaterms_options');
?>
      
				<input id="<?php echo esc_attr($args['label_for']);?>" <?php checked($options[$args['label_for']], 1); ?> value="1" name="idaterms_options[<?php echo esc_attr($args['label_for']); ?>]" type='checkbox'>
	<?php
            }
            $argsterms  = array(
                'public' => true,
                '_builtin' => false
            );
            $output     = 'names';
            $operator   = 'and';
            $taxonomies = get_taxonomies($argsterms, $output, $operator);
            if ($taxonomies) {
                foreach ($taxonomies as $taxonomy) {
                    
					add_settings_field(
						'idaterms_'.$taxonomy, 
                        $taxonomy, 
						'idaterms_html', 
						'sort_taxonomies_date', 
						'idaterms_section', 
						array(
                        'label_for' => $taxonomy,
						'checked' => checked
                    ));
					
                }
                function idaterms_html($args)
                {
                    $options           = get_option('idaterms_options');
                    $mi_taxonomia      = esc_attr($args['label_for']);
					?>

					<input id="<?php echo $mi_taxonomia;?>" <?php checked($options[$args['label_for']], 1); ?> value="1" name="idaterms_options[<?php echo $mi_taxonomia;?>]" type='checkbox'><?php 
                }
            }
        }
        function aplicar_filtros()
        {
            $options = get_option('idaterms_options');
            foreach ($options as $key => $values) {
                if (!empty($values) == 1) {
                    add_filter('manage_edit-' . $key . '_columns', 'nueva_columna_taxonomy_columns');
                    add_filter('manage_' . $key . '_custom_column', 'nueva_columna_taxonomy_contenido', 10, 3);
                    add_filter('manage_edit-' . $key . '_sortable_columns', 'mi_columna_sortable_columns');
                }
            }
        }
        function nueva_columna_taxonomy_columns($defaults)
        {
            $nuevascolumnas = array();
            foreach ($defaults as $key => $value) {
                if ($key == 'name') { 
                    $nuevascolumnas['mi_columna_ID'] = __('ID / Date', 'idaterms-sort-terms-by-id-date'); 
                }
                $nuevascolumnas[$key] = $value;
            }
            return $nuevascolumnas;
        }
        function nueva_columna_taxonomy_contenido($content, $nombre_columna, $term_ID)
        {
            if ('mi_columna_ID' == $nombre_columna) {
                $content = $term_ID;
            }
            return $content;
        }
        function mi_columna_sortable_columns($sortable_columns)
        {
            $sortable_columns['mi_columna_ID'] = 'term_ID';
            return $sortable_columns;
        }
        aplicar_filtros();
    }
    public function settings_page()
    {
        settings_errors('idaterms_messages');
?>
 
 		<h1><?php  echo esc_html(get_admin_page_title());?></h1>
 <?php
        echo '<p>' . __('Here you can select on which ones of your taxonomies (Tags, Catgeories or Custom Taxonomies) you would like to add an extra sortable column with the ID term.</p><p>That way you can sort your terms by Date.', 'idaterms-sort-terms-by-id-date') . '</p>';
?>

 <form action="options.php" method="post">
 <?php wp_nonce_field('update-options');?>
 <?php settings_fields('sort_taxonomies_date');
       do_settings_sections('sort_taxonomies_date');
       submit_button();
?>
 </form>
       
<?php
        $url  = 'http://ceslava.com';
        $link = sprintf(wp_kses(__('<p>Made with love by <a href="%s">@ceslava</a>.</p>', 'idaterms-sort-terms-by-id-date'), array(
            'a' => array(
                'href' => array()
            )
        )), esc_url($url));
        echo $link;
    }
   
}