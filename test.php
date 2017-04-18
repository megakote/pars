<?php
	include_once('config.php');
	include_once('autoload.php');
	include_once('lib/miscs.php');

	$content = '
		<div class="col-xs-12">
				 Юридическая информация:<br>
		 <br>
		 <br>
				 Наименование:&nbsp;ООО "ВКС"<br>
				 ОГРН:&nbsp;5077746563153<br>
				 ИНН:&nbsp;7718638730<br>
				 КПП:&nbsp;343501001<br>
		 <br>
		 <br>
				 Адрес: Волгоградская обл. г. Волжский, ул. Пушкина 35 г,&nbsp;&nbsp;<br>
				 &nbsp;Телефон:&nbsp;(8443) 55-63-66 , (8442) 98-19-89&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<br>
				 &nbsp;E-mail:&nbsp;<a href="mailto:info@praktik24.com" title="Отправить сообщение">Отправить сообщение</a>&nbsp;<br>
				 График работы офиса:&nbsp;Пон-Пятн с 8:30 до 17:30&nbsp;<br>
		 <small><a href="https://maps.google.ru/maps?f=q&amp;source=embed&amp;hl=ru&amp;geocode=&amp;q=%D0%B3.+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D1%83%D0%BB.+2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F,+%D0%B4.+38%D0%90&amp;aq=&amp;sll=55,103&amp;sspn=90.84699,270.527344&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+38,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127287&amp;ll=55.805478,37.569551&amp;spn=0.023154,0.054932&amp;z=14&amp;iwloc=A"><br>
		 </a></small>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d804.6456637233123!2d44.82573715790545!3d48.76587254443273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf8e6a86fd21a32e1!2z0J_RgNCw0LrRgtC40Lo!5e1!3m2!1sru!2sru!4v1488290405066" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
				<h2>Задать вопрос</h2>
				 
		<div class="bx_mfeedback bx_blue">
				<form action="/about/contacts/" method="POST">
				<input type="hidden" name="sessid" id="sessid" value="5522552d90d9bfbaca15bccb6c5093bd">		<strong>Ваше имя<span class="mf-req">*</span></strong><br>
				<input type="text" name="user_name" value="Александр Гамов"><br>
		
				<strong>Ваш E-mail<span class="mf-req">*</span></strong><br>
				<input type="text" name="user_email" value="slowdream@yandex.ru"><br>
		
				<strong>Сообщение<span class="mf-req">*</span></strong><br>
				<textarea name="MESSAGE" rows="5" cols="40"></textarea><br>
		
				
				<input type="hidden" name="PARAMS_HASH" value="a2e5cf9732c42313fd69e828c5fb6951">
				<input type="submit" name="submit" value="Отправить" class="bx_bt_button bx_big shadow">
			</form>
		</div>	</div>
	';
	//$data = new \models\analizator($content);
	$c = new \controllers\siteparser();
	$c->startSiteParsing();