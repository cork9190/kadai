<?php
// MySQLサーバーへの接続情報を定義します。
define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER', 'root');
define('PASS', 'root');

// データベースに接続するためのクラスを定義します。
class Database
{
  // PDOインスタンスを格納するプライベート変数を定義します。
  private $pdo;

  // データベースに接続するプライベートメソッドを定義します。
  private function connect()
  {
    if (!isset($this->pdo)){
      $this->pdo = new PDO(
        DSN,
        USER,
        PASS,
        [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
    }
  }

  // 全社員情報を取得するメソッドを定義します。データベースから全社員のIDと名前を取得します。
  function getallsyain()
  {
    try {
      $this->connect();
      $stmt = $this->pdo->query("SELECT id, name FROM syain ORDER BY id;");
      $members = $stmt->fetchAll();
      return $members;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }

  // 特定のIDを持つ社員情報を取得するメソッドを定義します。
  function getsyain($id)
  {
      try {
        $this->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM syain WHERE id = ? ;");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $member = $stmt->execute();
        if ($member) {
          $member = $stmt->fetchAll();
          if (count($member) == 0) {
            return null;
          }
          return $member[0];
        }
        return null;
      } catch (PDOException $e) {
        echo $e->getMessage() . '<br>';
        exit;
      }
    }
  
    // 特定のIDを持つ社員が存在するかどうかを確認するメソッドを定義します。
  function idexist($id)
  {
    if ($this->getsyain($id) != null) {
      return true;
    } 
    return false;
  }

  // 新たな社員を作成するメソッドを定義します。各引数は社員の属性（ID、名前、年齢、仕事）を指します。
  function createsyain($id, $name, $age, $work)
  {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO syain VALUES(?,?,?,?);");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->bindParam(2, $name, PDO::PARAM_STR);
      $stmt->bindParam(3, $age, PDO::PARAM_INT);
      $stmt->bindParam(4, $work, PDO::PARAM_STR);
      $reslt = $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
    return false;
  }

  // 特定のIDを持つ社員の全情報を取得するメソッド
  function getSyainById($id)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("SELECT * FROM syain WHERE id = ? ;");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
      $member = $stmt->fetch();
      return $member;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }
}
?>
