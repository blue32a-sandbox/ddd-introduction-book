<?php
// メインとなる処理を実装する
class Program
{
    private static Container $container;

    public static function main(): void
    {
        self::startup();

        while (true) {
            echo 'Input user name' . PHP_EOL;
            echo '>';
            $input = trim(fgets(STDIN));
            echo '-------------------------' . PHP_EOL;
            echo 'user name:' . PHP_EOL;
            echo '- ' . $input;
            echo '-------------------------' . PHP_EOL;

            echo 'continue? (y/n)' . PHP_EOL;
            echo '>';
            $yesOrNo = trim(fgets(STDIN));
            if ($yesOrNo === 'n') {
                break;
            }
        }
    }

    // ...
}
