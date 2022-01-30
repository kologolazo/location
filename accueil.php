<?php
include_once("./classes/Model.php");
include_once("entete.php");
if (!$_SESSION) {
	header('location:index.php');
} else {
?>
	<div class="contenu">

		<div class="ligne">

			<div class="pos-4">
				<img src="./img/img_1.jpg">
			</div>

			<div class="pos-4">
				<img src="./img/img_2.jpg">
			</div>

			<div class="pos-3">
				<img src="./img/img_3.jpg">
			</div>

		</div><br />
		<div class="ligne">

			<div class="pos-4">
				<img src="./img/img_4.jpg">
			</div>

			<div class="pos-4">
				<img src="./img/img_5.jpg">
			</div>

			<div class="pos-3">
				<img src="./img/img_6.jpg">
			</div>

		</div>

	</div>
	<div id="piedpage">
	</div>
	</body>

	</html>
<?php
}
?>