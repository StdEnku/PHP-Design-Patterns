<?php

// 1から10までの二の倍数を返すイテレータ
class DoubleIterator implements Iterator {
    private int $_index;

    public function __construct() {
        $this->rewind();
    }

    public function rewind(): void { //ポインタのリセット
        $this->_index = 1;
    }

    public function valid(): bool { //現在のポインタが有効かどうかを返す
        return $this->_index * 2 < 10;
    }

    public function current(): mixed { //現在のポインタが指す値を返す
        return $this->_index * 2;
    }

    public function key(): mixed { //現在のポインタを返す
        return $this->_index;
    }

    public function next(): void { //ポインタを次に進める
        $this->_index++;
    }
}

$range = new DoubleIterator();
foreach ($range as $index => $value) {
    echo "インデックス {$index}: {$value}\n";
}