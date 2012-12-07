<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
<footer id="colophon" role="contentinfo" xmlns="http://www.w3.org/1999/html">
        <div id="map_canvas" style="width:600px; height:250px; float: left"></div>
            <span class="address">Черкассы, Хрещатик, 195, оф. 412</span><br />
            <span class="phone">(0472) 544-346</span><br />
            <span class="phone">(0472) 458-208</span><br />
            <span class="phone">(0472) 50-50-52</span><br />
            <span class="mail">aries@uch.net</span>
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a hidden="true" href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
            <a href="/" title="Типография Aries">© Рекламно полиграфичный центр Aries</a> |
            <a href="http://kotoblog.pp.ua" title="Сергей Полищук">Сергей Полищук</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(49.448472, 32.057836);
        var settings = {
            zoom: 15,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
        var companyPos = new google.maps.LatLng(49.448472, 32.057836);
        var companyMarker = new google.maps.Marker({
            position: companyPos,
            map: map,
            title:"Aries"
        });
    }
</script>

</body>
</html>