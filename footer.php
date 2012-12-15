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
<footer id="colophon" role="contentinfo">
    <div id="map_canvas" style="width:600px; height:200px; float: left"></div>
    <ul>
        <li>
            <h2>Наши контакты</h2>
        </li>
        <li>
            <span class="address">Черкассы, Хрещатик, 195, оф. 412</span><br />
        </li>
        <li>
            <span class="phone">(0472) 544-346</span><br />
        </li>
        <li>
            <span class="phone">(0472) 458-208</span><br />
        </li>
        <li>
            <span class="phone">(0472) 50-50-52</span><br />
        </li>
        <li>
            <a href="mailto:Типография%20Aries%20&lt;aries@uch.net&gt;"><span class="mail">E-mail</span></a>
        </li>
    </ul>
        <div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
            <a href="<?php bloginfo( 'url' ); ?>" title="Типография Aries">© Рекламно полиграфичный центр Aries</a> |
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
            scrollwheel: false,
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


    <div class="slide-out-div">
        <a class="handle" href="#">Контакт</a>
        <h3>Акция от Aries.ck.ua</h3>
        <p>Заполните, пожалуйста форму<br />и получите скидку 5% на ваш первый заказ
        </p><br />
        <form action="javascript:void(0)" id="contact-form" method="post">
            <label for="name">Имя</label><span class="required">*</span><br />
            <input type="text" size="40" name="name" id="name" class="validate[required]" /><br />

            <label for="phone">Телефон</label><span class="required">*</span><br />
            <input type="text" size="40" name="phone" id="phone" class="validate[required,custom[phone]]" /><br />

            <label for="email">E-mail</label><span class="required">*</span><br />
            <input type="text" size="40" name="email" id="email" class="validate[required,custom[email]]" /><br />
            <button type="submit" name="submit" id="submit" value="OK" style="margin-top:15px;">Отправить</button>
        </form>
    </div>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/sendmail.js"></script>
</body>
</html>