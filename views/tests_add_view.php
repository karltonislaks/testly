<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script>
	$(function() {
		$("#tabs").tabs();
	});
</script>

<div style="clear: both; margin: 15px 0">
	<a class="btn btn-large btn-inverse" href="<?=BASE_URL?>tests">Loobu</a>
	<button class="btn btn-large btn-primary" type="button" onclick="submit1()">Salvesta</button>
</div>

<div id="tabs" style="opacity: 0.8">
	<ul>
		<li><a href="#tabs-1">Üldine</a></li>
		<li><a href="#tabs-2">Küsimus</a></li>
		<li><a href="#tabs-3">Raport</a></li>
	</ul>
	<div id="tabs-1">
		<form method ="post">
			<p>Küsimuse nimi</p>
			<input type="text" name="name" value="<?$test['name']?>">
			<p>Sissejuhatus</p>
			<textarea name="Introduction" ><?=$test['introduction']?></textarea>
			<p>Kokkuvõte</p>
			<textarea name="Conclusion"><?=$test['conclusion']?></textarea>
			<p>Passcode</p>
			<input type="text" name="passcode" value="<?=$test['passcode']?>">
		</form>

	</div>
	<div id="tabs-2">
		<p>Küsimus</p>
		<textarea name="question_text" ><?=$question['question_text']?$question['question_text']:''?></textarea>
		<p>Tüüp</p>
		<select name="type_id" id="type_id" >
			<option value="1" >Õige/Vale</option>
			<option value="2" selected="selected" >Üks õige</option>
			<option value="3" >Mitu õiget</option>
			<option value="4" >Täida lüngad</option>
		</select>
		<div id="answer-template" >
			<div id="type_id_1" class="answer-template">
				<p>Sisesta kaks vastust ja märgi ära õige vastus</p>
				<input type="radio" name="tf.correct" value="0" checked="checked">
				<textarea name="answer.0">Õige</textarea>
				<input type="radio" name="tf.correct" value="1">
				<textarea name="answer.1">Vale</textarea>
			</div>
			<div id="type_id_2" class="answer-template">
				<p>Sisesta vastuse variandid ja märgi ära, milline variant on õige</p>
				<div id="multiple-choice-option">
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="0" checked="checked">
						<textarea name="mc.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="1">
						<textarea name="mc.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="2">
						<textarea name="mc.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="3">
						<textarea name="mc.answer.3"></textarea>
					</div>
				</div>
				<a href="#" onclick="return addMultipleChoice()">Lisa</a> / <a href="#" onclick="return removeMultipleChoice()
				">Eemalda</a> vastusevariant
			</div>
			<div id="type_id_3" class="answer-template">
				<p>Sisesta vastuse variandid ja märgi ära, millised variandid on õiged</p>
				<div id="multiple-response-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.3"></textarea>
					</div>
				</div>
				<a href="#" onclick="return addMultipleResponse()">Lisa</a> / <a href="#"
				onclick="return removeMultipleResponse()">Eemalda</a> vastusevariant
			</div>
			<div id="type_id_4" class="answer-template">
				<p>Sisesta võimalikud vastuse variandid(üks vastus ühte kasti)</p>
				<div id="fill-in-the-blank-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="fitb.correct" checked="checked" disabled="true">
						<textarea name="fitb.answer.0"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi
			neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora
			torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque.
			Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a,
			lacus.</p>

		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi.
			Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel
			pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed
			nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean
			vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero
			vitae lectus hendrerit hendrerit.</p>
	</div>
</div>