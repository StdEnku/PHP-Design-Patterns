<?php

class UserBuilder {
    public ?string $Email = null;
    public ?string $Phone = null;
    public ?string $Street = null;
    public ?string $City = null;

    public function __construct(
        public readonly string $Name,
        public readonly bool $IsMale,
        public readonly int $Age
    ) {}

    public function Contact(string $email, string $phone): self {
        $this->Email = $email;
        $this->Phone = $phone;
        return $this;
    }

    public function Address(string $street, string $city): self {
        $this->Street = $street;
        $this->City = $city;
        return $this;
    }

    // 最後に完成品の User クラスを生成するビルドメソッド
    public function Build(): User {
        return new User(clone $this);
    }
}

class User {
    public function __construct(
        private readonly UserBuilder $_userBuilder
    ) {}

    public function ShowUserInfo(): void {
        echo "Name: " . $this->_userBuilder->Name . PHP_EOL;
        echo "IsMale: " . ($this->_userBuilder->IsMale ? 'Yes' : 'No') . PHP_EOL;
        echo "Age: " . $this->_userBuilder->Age . PHP_EOL;
        echo "Email: " . ($this->_userBuilder->Email ?? 'N/A') . PHP_EOL;
        echo "Phone: " . ($this->_userBuilder->Phone ?? 'N/A') . PHP_EOL;
        echo "Street: " . ($this->_userBuilder->Street ?? 'N/A') . PHP_EOL;
        echo "City: " . ($this->_userBuilder->City ?? 'N/A') . PHP_EOL;
    }
}

// ビルダーにパラメータを積み上げる
$userBuilder = (new UserBuilder("John Doe", true, 30))
    ->Contact("hogehoge@example.com", "xxx-xxxx-xxxx")
    ->Address("123 Main St", "Anytown");

// ビルダーから完成したオブジェクトを生成する
$user = $userBuilder->Build();
$user->ShowUserInfo();