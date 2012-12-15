<?php
header('Content-Type: text/html; charset=utf-8');
if (mail("spolischook@gmial.com", "Новый клиент на сайте aries.ck.ua", "Имя:".$_POST['name']."\nПочта:".$_POST['email']."\nТелефон:".$_POST['phone']))
    echo '
	<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" onclick="$(\'#alert\').hide()">×</button>
                <dl id="system-message"><dt class="message">Сообщение</dt><dd class="message message"><ul><li>Спасибо за обращение к нам! Мы свяжемся с вами в ближайшее время</li></ul></dd></dl>
        </div>';
else
    echo '
	<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert" onclick="$(\'#alert\').hide()">×</button>
	        <dl id="system-message"><dt class="error">Сообщение</dt><dd class="error error"><ul><li>:( Кажется что-то пошло не так. Не переживайте наш админ уже решает проблему, мы свяжемся с вами в ближайшее время</li></ul></dd></dl>
	</div>';
?>