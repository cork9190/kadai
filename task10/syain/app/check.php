<?php

// check.php
function check_input(&$id, &$name, &$age, &$work, &$status, &$old_id)
{
    if ($id === "" || $name === "" || $age === "" || $work === "") {
        $error = '入力されていない値があります';
        
        if ($status == "create") {
            header("Location: syain_create.php?error={$error}&id={$id}&name={$name}&age={$age}&work={$work}");
        } else {
            header("Location: syain_update.php?error={$error}&id={$id}&name={$name}&age={$age}&work={$work}");
}
        exit();
    }

    // IDが正しい形式かチェック
    if (!preg_match("/^[1-3][0-9]{4}$/", $id)) {
        $error = 'idには1～3で始まる5桁の整数を入力してください';
        
        if ($status == "create") {
            header("Location: syain_create.php?error={$error}&id={$id}&name={$name}&age={$age}&work={$work}");
        } else {
            header("Location: syain_update.php?error={$error}&id={$id}&name={$name}&age={$age}&work={$work}");
        }
        exit();
    }

    // すべてのチェックが通った場合、trueを返します。
    return true;
}



