<?php
require_once('common.php');

if (isset($_POST["status"])) {
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $age = isset($_POST["age"]) ? $_POST["age"] : '';
    $work = isset($_POST["work"]) ? $_POST["work"] : '';
    $old_id = isset($_POST["old_id"]) ? $_POST["old_id"] : '';
    $status = $_POST["status"]; // statusを変数に格納

    if ($status == "create") {
        check_input($id, $name, $age, $work, $status, $old_id);

        if ($db->idexist($id) == true) {
            $error = "既に使用されているIDです";
            header("Location: syain_create.php?error={$error}&name={$name}&age={$age}&work={$work}");
            exit();
        }

        if ($db->createSyain($id, $name, $age, $work) == false) {
            $error = "DBエラー";
            header("Location: syain_create.php?error={$error}");
            exit();
        }
    } elseif ($status == "update") {
        check_input($id, $name, $age, $work, $status, $old_id);

        if ($id != $old_id && $db->idexist($id)) {
            $error = "既に使用されているIDです";
            header("Location: syain_update.php?id={$old_id}&error={$error}");
            exit();
        }

        if ($db->updateSyain($old_id, $id, $name, $age, $work) == false) {
            $error = "DBエラー";
            header("Location: syain_update.php?id={$old_id}&error={$error}");
            exit();
        }
    } elseif ($status == "delete") {
        $db->deleteSyain($id);
        header("Location: index.php");
    } else {
        die("Invalid status value.");
    }
    
    header("Location: index.php");
    exit();
}
?>
