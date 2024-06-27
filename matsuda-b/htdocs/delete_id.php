<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ゲームタイトル削除</title>
    </head>
    <body>
        <?php

            require_once '_database_conf.php';
            require_once '_h.php';

            
			if (isset($_GET['GameID'])) {
				$gameID = $_GET['GameID'];
			} else {
				$gameID = null;
			}

			if ($gameID === null) {
				// Display the input form
				echo '<form action="" method="GET">';
				echo 'GameID: <input type="text" name="GameID"><br>';
				echo '<input type="submit" value="削除">';
				echo '</form>';
			} else {
				// Continue with the deletion process
				try {
					$db = new PDO($dsn, $dbUser, $dbPass);
					$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = 'DELETE FROM games WHERE GameID = :GameID';
					$stmt = $db->prepare($sql);
					$stmt->bindValue(':GameID', $gameID, PDO::PARAM_INT);
					$stmt->execute();

					$db = null;

					echo '削除しました。<br>';
				} catch (Exception $e) {
					echo 'エラーが発生しました。内容: ' . h($e->getMessage());
					exit();
				}
			}

           
                


        ?>
        <a href="edit.php">戻る</a>
    </body>
</html>