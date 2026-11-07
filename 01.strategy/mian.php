<?php

// インターフェース
interface IMotorcycle {
    public function accelerate();
}

// 具象クラス1
class SR500 implements IMotorcycle {
    public function accelerate() {
        echo "dkoko! doko! doko!" . PHP_EOL;
    }
}

// 具象クラス2
class ZZR1400 implements IMotorcycle {
    public function accelerate() {
        echo "fhoooon!!!!" . PHP_EOL;
    }
}

// インターフェースのクライアント
class Rider {
    private IMotorcycle $motorcycle;

    public function __construct(IMotorcycle $motorcycle) {
        $this->motorcycle = $motorcycle;
    }

    public function changeMotorcycle(IMotorcycle $motorcycle): void { //具象クラス切り替えメソッド
        $this->motorcycle = $motorcycle;
    }

    public function ride(): void {
        $this->motorcycle->accelerate();
    }
}

// 使い方
$rider = new Rider(new SR500());
$rider->ride(); // 出力: dkoko! doko! doko!

// 途中でお行儀よくバイクを切り替える（これがストラテジーパターンの真骨頂）
$rider->changeMotorcycle(new ZZR1400());
$rider->ride(); // 出力: fhoooon!!!!