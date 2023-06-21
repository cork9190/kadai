<?php
  class Staff {
    private $name;
    private $age;
    private $sex;
    private $id;

    private static $count = 1;

    public function __construct($name, $age, $sex) {
        $this->id = "S" . sprintf("%04d", self::$count++);
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    public function number() {
        return $this->id;
    }

    public function show() {
      printf("(%s) %s %d歳 %s<br>", $this->id, $this->name, $this->age, $this->sex);
    }
}

$staffs = [];
$staffs[0] = new Staff("佐藤 一郎", 31, "男性");
$staffs[1] = new Staff("山田 花子", 25, "女性");
$staffs[2] = new Staff("鈴木 次郎", 27, "男性");

foreach ($staffs as $staff){
  $staff->show();
}
?>
