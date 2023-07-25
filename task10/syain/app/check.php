<?php

function check_input($id, $name, $age, $work, &$error)
{
  // エラーメッセージを保存する変数を初期化します。
  $error = "";
   // IDと名前が空でないかチェックします。どちらかが空の場合、エラーメッセージを設定し、falseを返します。
  if ($id === "" or $name === "") {
    $error = '入力されていない値があります';
    return false;
  }
   // IDが1～3で始まる5桁の整数であることを確認します。そうでない場合、エラーメッセージを設定し、falseを返します。
  if (preg_match("/^[1-3][0-9]{4}$/",$id) != true) {
    $error = 'idには1～3で始まる5桁の整数を入力してください';
    return false;
  }
  // すべてのチェックが通った場合、trueを返します。
  return true;
}