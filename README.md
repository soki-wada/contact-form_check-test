# お問い合わせフォーム

## 環境構築
### Dockerビルド
    1. git clone git@github.com:soki-wada/contact-form_check-test.git
    2. docker-compose up -d --build

  ＊ MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築
    1. docker-compose exec php bash
    2. composer install
    3. cp .env.example .env　　.envファイルの環境変数を変更
    4. php artisan key:generate
    5. php artisan migrate
    6. php artisan db:seed

## 使用技術
    ・ php 7.4.9-fpm
    ・ Laravel 8.83.29
    ・ MySQL 8.0.26

## ER図
    以下はこのプロジェクトのER図です。

![ER図](https://github.com/soki-wada/contact-form_check-test/blob/main/test.png?raw=true)

## URL
    ・ 開発環境 : http://localhost/
    ・ phpMyAdmin : http://localhost:8080/
