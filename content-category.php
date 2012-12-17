<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php
if (in_category('sale')) {
    get_template_part( 'content');
}
else {
    $content = get_the_content( __( '', 'twentytwelve' ), false );
    //Explode gallery
    $aContent = explode('[gallery ids="', $content);
    //True if gallery isset in the post
    if (count($aContent) > 1) {
        //Find first id at the gallery
        $aContent = explode(',', $aContent[1]);
        $aImg = wp_get_attachment_image_src($aContent[0]);
        //Echo first image
        echo "
            <div style='float: left; padding-right: 10px;'>
                <a href='".get_permalink()."'>
                    <img src='".$aImg[0]."' style=''>
                    <h3 align='center'>".the_title('','', false)."</h3>
                </a>
            </div>
        ";
    }
}?>