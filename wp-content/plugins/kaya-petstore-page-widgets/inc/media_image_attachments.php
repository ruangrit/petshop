<?php
global $petstore_plugin_name;
$Petcare_custom_options = array(
    'image_custom_description' => array(
        'label'       => __('Custom Description', $petstore_plugin_name),
        'input'       => 'textarea',
        'application' => 'image',
        'exclusions'  => array('audio', 'video'),
        'required'    => false,
    ),
    'image_custom_link' => array(
        'label'       => __('Custom link', $petstore_plugin_name),
        'input'       => 'text',
        'helps'       => __('Ex:http://www.google.com', $petstore_plugin_name),
        'application' => 'image',
        'exclusions'  => array('audio', 'video'),
        'required'    => false,
    ),
    'link_new_window' => array(
        'label'       => __('Target', $petstore_plugin_name),
        'input'       => 'select',
        'options' => array(
            '_blank' => __('_blank',$petstore_plugin_name),
            '_self' => __('_self',$petstore_plugin_name),
        ),
        'application' => 'image',
        'exclusions'   => array('audio', 'video')
    )
);
if( !class_exists('Kaya_Custom_Media_Options') ){
Class Kaya_Custom_Media_Options {
    private $media_fields = array();
function __construct( $fields ) {
    $this->media_fields = $fields;
    add_filter( 'attachment_fields_to_edit', array( $this, 'applyFilter' ), 11, 2 );
    add_filter( 'attachment_fields_to_save', array( $this, 'saveFields' ), 11, 2 );
}
    public function applyFilter( $form_fields, $post = null ) {
    if ( ! empty( $this->media_fields ) ) {
        foreach ( $this->media_fields as $field => $values ) {
            if ( preg_match( "/" . $values['application'] . "/", $post->post_mime_type) && ! in_array( $post->post_mime_type, $values['exclusions'] ) ) {
                $meta = get_post_meta( $post->ID, '_' . $field, true ); 
    switch ( $values['input'] ) {
    default:
    case 'text':
        $values['input'] = 'text';
        break;
 
    case 'textarea':
        $values['input'] = 'textarea';
        break; 
    case 'select':
        $values['input'] = 'html';
        $html = '<select name="attachments[' . $post->ID . '][' . $field . ']">';
        if ( isset( $values['options'] ) ) {
            foreach ( $values['options'] as $k => $v ) {
                if ( $meta == $k )
                    $selected = ' selected="selected"';
                else
                    $selected = '';
                 $html .= '<option' . $selected . ' value="' . $k . '">' . $v . '</option>';
            }
        }
         $html .= '</select>';
        $values['html'] = $html;
        break;
     case 'checkbox':
        $values['input'] = 'html';
        if ( $meta == 'on' )
            $checked = ' checked="checked"';
        else
            $checked = '';
         $html = '<input' . $checked . ' type="checkbox" name="attachments[' . $post->ID . '][' . $field . ']" id="attachments-' . $post->ID . '-' . $field . '" />';
        $values['html'] = $html;
         break;
     case 'radio':
        $values['input'] = 'html'; 
        $html = ''; 
        if ( ! empty( $values['options'] ) ) {
            $i = 0; 
            foreach ( $values['options'] as $k => $v ) {
                if ( $meta == $k )
                    $checked = ' checked="checked"';
                else
                    $checked = ''; 
                $html .= '<input' . $checked . ' value="' . $k . '" type="radio" name="attachments[' . $post->ID . '][' . $field . ']" id="' . sanitize_key( $field . '_' . $post->ID . '_' . $i ) . '" /> <label class="radio_buttons" for="' . sanitize_key( $field . '_' . $post->ID . '_' . $i ) . '">' . $v . '</label>&nbsp;';
                $i++;
            }
        }
         $values['html'] = $html;
 
        break;
} 
        $values['value'] = $meta;
        $form_fields[$field] = $values;
            }
        }
    }
    return $form_fields;
}
    function saveFields( $post, $attachment ) {
    if ( ! empty( $this->media_fields ) ) {
        foreach ( $this->media_fields as $field => $values ) {
            if ( isset( $attachment[$field] ) ) {
                if ( strlen( trim( $attachment[$field] ) ) == 0 )
                    update_post_meta( $post['ID'], '_' . $field, $attachment[$field] );
                else
                    update_post_meta( $post['ID'], '_' . $field, $attachment[$field] );
            }
            else {
                delete_post_meta( $post['ID'], $field );
            }
        }
    } 
    return $post;
}
}
$Petcare_media_custom_options = new Kaya_Custom_Media_Options( $Petcare_custom_options );
}
?>