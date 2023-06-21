<?php
ini_set('display_errors', 1);

class Staff {
    protected $name;
    protected $age;
    protected $sex;
    protected $id;

    protected static $count = 1;

    public function __construct($name, $age, $sex) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;

        if ($this instanceof PartStaff) {
            $this->id = "P" . sprintf("%04d", self::$count++);
        } else {
            $this->id = "S" . sprintf("%04d", self::$count++);
        }
    }

    public function number() {
        return $this->id;
    }

    public function show() {
        printf("(%s) %s %d歳 %s<br>", $this->id, $this->name, $this->age, $this->sex);
    }
}

class PartStaff extends Staff {
    private $jikyu;

    public function __construct($name, $age, $sex, $jikyu) {
        parent::__construct($name, $age, $sex);
        $this->jikyu = $jikyu;
    }

    public function show() {
        printf("(%s) %s %d歳 %s 時給：%d円<br>", $this->id, $this->name, $this->age, $this->sex, $this->jikyu);
    }
}

$staffs = [];
$staffs[0] = new Staff("佐藤 一郎", 31, "男性");
$staffs[1] = new Staff("山田 花子", 25, "女性");
$staffs[2] = new Staff("鈴木 次郎", 27, "男性");
$staffs[3] = new PartStaff("田中 裕子", 24, "女性", 900);
$staffs[4] = new Staff("中村 三郎", 27, "男性");

function AllStaff(Staff $staff){
    $staff->show();
}

foreach ($staffs as $staff){
    AllStaff($staff);
}
?>
