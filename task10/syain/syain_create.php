<?php

require_once('common.php'); // "common.php"というファイルを一度だけ読み込む。このファイルがすでに読み込まれていた場合は再度読み込まない。

show_top("社員情報の追加"); // "社員情報の追加"というヘッダーテキストでshow_topという関数を呼び出す。この関数はページ上部のHTMLを出力する。

show_create(); // show_createという関数を呼び出す。この関数は社員情報の作成に関連するHTMLを出力する。

show_down(true); // trueという引数を渡して、show_downという関数を呼び出す。この関数はページ下部のHTMLを出力する。trueが渡された場合、この関数は追加のHTML要素（通常は"社員一覧に戻る"ボタン）を出力する。

?>
