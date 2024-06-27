<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
<<<<<<< HEAD
		<title>情報修正</title>
=======
		<title>商品修正</title>
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db
	</head>
	<body>
		<?php

			require_once '_database_conf.php';
			require_once '_h.php';

			if (isset($_GET['Title'])) {
				$title = $_GET['Title'];
			} else {
				$title = null;
			}
<<<<<<< HEAD
			if ($title === null) {
				// Display the input form
				echo '<form action="" method="GET">';
				echo 'ゲームタイトル: <input type="text" name="Title"><br>';
				echo '<input type="submit" value="変更" >';
				echo '</form>';
			} else {
=======
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db

			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = 'DELETE FROM games WHERE Title = :Title';
					$stmt = $db->prepare($sql);
					$stmt->bindValue(':Title', $title, PDO::PARAM_INT);
					$stmt->execute();

				$dbh=null;

				$rec=$stmt->fetch(PDO::FETCH_ASSOC);

				if($rec==false)
				{
<<<<<<< HEAD
					print'タイトル名が正しくありません。';
					print'<a href="edit.php">戻る</a>';
=======
					print'商品がコードが正しくありません。';
					print'<a href="index.php">戻る</a>';
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db
					print '<br />';
					exit();
				}

<<<<<<< HEAD
				$title = $rec['Title'];
=======
				$pro_name = $rec['name'];
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db
				$pro_price = $rec['price'];

			}
			catch(Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
<<<<<<< HEAD
		}

=======
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db

		?>

		商品修正<br />
		<br />

<<<<<<< HEAD
		<form method="post" action="editdb_done.php">


		ゲーム名<br />
		<input type="text" name="title" style="width:200px" value="<?php print $title; ?>"><br />
=======
		<form method="post" action="edit_done.php">

		商品コード <?php print $pro_code; ?><br />
		<input type="hidden" name="code" value="<?php print $pro_code; ?>"><br />

		商品名<br />
		<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
>>>>>>> bc9637ded8eadf6e58f1a524244dc233462777db
		価格<br />
		<input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br /><br />

		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="ＯＫ">

		</form>

	</body>
</html>