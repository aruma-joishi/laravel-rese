# Rese

飲食店予約サービス

<img src=src\public\image/main.png alt="main">


## 作成した目的

コーディング技術の向上


## アプリケーションURL
https://github.com/aruma-joishi/laravel-rese

## 機能一覧
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報変更
- 飲食店予約情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

## 使用技術（実行環境）

- PHP 8.1.2
- Laravel 8.83.27
- MySQL 8.0.26

## テーブル設計

<img src=src\public\image/table.png alt="table">

## ER図

<img src=src\public\image/ER.png alt="ER">

# 環境構築
1. git clone git@github.com:aruma-joishi/laravel-rese.git
2. docker-compose up -d --build
3. docker-compose exec php bash
4. composer install
5. env.exampleファイルから.envを作成し、環境変数を変更
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed

URL 開発環境: http://localhost phpMyAdmin: http://localhost:8080


## その他