# 環境セットアップ


> これからの作業は`z_link_project`ディレクトリ直下で実行する
## コンテナを立ち上げる
```
$ docker-compose up -d
```
## 初期設定
```
$ ./init-setup.sh

// windows
\dir> bash ./init-setup.sh

```
を実行
<hr>

## コンテナ内にログイン
```
$ docker-compose exec web bash
```
`もう一つコマンドプロンプトを開いてそちらでも同じコマンドでコンテナにログインする`
<hr>

## マイグレーションの実行(DB接続確認)
> ここからの作業は`コンテナにログイン`した状態で実行する
```
# php artisan migrate
```
特にエラーなど出なければDB接続成功!！
<hr>

## サーバの立ち上げ
```
# php artisan serve --host 0.0.0.0 --port 8081
```
> もう一方のコンテナで
```
# npm run watch-poll
```
を`2回`実行する

立ち上げたあとブラウザで`http://localhost:3000/`にアクセスして
`Top`の文字,`http://localhost:3000/login`にアクセスして
`Login`の文字が表示されれば環境構築終了!!!

<hr>

## 補足
### MySQLコマンドを使う
1. データベースコンテナにログインする
```
$ docker-compose exec db bash
```
2. MySQLにログインする
```
# mysql -u docker -p docker
```
<hr>
