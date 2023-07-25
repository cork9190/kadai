<?php

// 共通処理を含むファイルをインクルードします
require_once('common.php');

// 全ての社員情報をデータベースから取得します
$members = $db->getallsyain();

// ウェブページの上部を表示する関数を呼び出します
show_top();

// 社員リストを表示する関数を呼び出します。引数には全ての社員情報が含まれます
show_syainlist($members);

// ウェブページの下部を表示する関数を呼び出します
show_down();

?>
