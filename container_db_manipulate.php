<?php require './header.php'?>
<?php
//今回は外部で$user, $passwordを設定してrequireで呼び出している。
require './ft_person.php';
//例外処理のためにtry carch文使用。
try {

  echo '<h1>','Aチームメンバー','</h1>';
  echo '<table>';
    echo '<tbody>';
    //データベースにアクセスするためにPDOクラスのインスタンスをnew演算子で作成する。
    $ft_team=new PDO('mysql:host=localhost;dbname=futsal_team;charset=utf8',
                $user, $password);
      /*
        PDOクラスのインスタンスからqueryセレクタを使用し、SQL文でfutsal_aの全データ取得。
        その後、foreach文とecho文を用いてデータを全て表示。
      */
      foreach ($ft_team->query('SELECT * FROM futsal_a') as $person) {
        echo '<tr>';
          echo '<td>','番号:',$person['id'],'、','</td>';
          echo '<td>','名前:',$person['name'],'、','</td>';
          echo '<td>','年齢:',$person['age'],'歳','、','</td>';
          echo '<td>','ポジション:',$person['position'],'</td>';
        echo '</tr>';
      }
    echo '</tbody>';
  echo '</table>';

} catch(PDOException $e){

  echo $e->getMessage();
  exit;

}
//結果
/*
番号:1、	名前:加藤A太郎、	年齢:25歳、	ポジション:ピヴォ
番号:2、	名前:佐藤B次郎、	年齢:27歳、	ポジション:アラ
番号:3、	名前:田中C三郎、	年齢:32歳、	ポジション:アラ
番号:4、	名前:山本D五郎、	年齢:38歳、	ポジション:フィクソ
番号:5、	名前:中島E十郎、	年齢:30歳、	ポジション:ゴレイロ
*/
?>
<?php require './footer.php'?>