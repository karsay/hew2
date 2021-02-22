#!/bin/sh

# sqlセットアップ
docker-compose exec db bash -c "chmod 0775 docker-entrypoint-initdb.d/init-database.sh"
docker-compose exec db bash -c "./docker-entrypoint-initdb.d/init-database.sh"

# laravelセットアップ
docker-compose exec web bash -c "rm .DS_Store"
docker-compose exec web bash -c "composer create-project --prefer-dist 'laravel/laravel=6.*' ."

# 初期設定ファイルコピー
docker-compose exec web bash -c "git clone https://github.com/karsay/copy_files.git"
docker-compose exec web bash -c "cp copy_files/hew_2/.editorconfig_cp .editorconfig"
docker-compose exec web bash -c "cp copy_files/hew_2/.env_cp .env"
docker-compose exec web bash -c "cp copy_files/hew_2/app.php_cp.php config/app.php"

# vueセットアップ
docker-compose exec web bash -c "npm install"
docker-compose exec web bash -c "npm install -D vue"
docker-compose exec web bash -c "cp copy_files/hew_2/web.php routes/web.php"
docker-compose exec web bash -c "cp copy_files/hew_2/index.blade.php resources/views/"
docker-compose exec web bash -c "cp copy_files/hew_2/app.js resources/js/app.js"
docker-compose exec web bash -c "cp copy_files/hew_2/App.vue resources/js/"
docker-compose exec web bash -c "cp copy_files/hew_2/router.js resources/js/"
docker-compose exec web bash -c "mkdir resources/js/pages"
docker-compose exec web bash -c "cp copy_files/hew_2/Top.vue resources/js/pages/"
docker-compose exec web bash -c "cp copy_files/hew_2/Login.vue resources/js/pages/"

# webmixセットアップ
docker-compose exec web bash -c "cp copy_files/hew_2/webpack.mix.js_cp.js webpack.mix.js"
docker-compose exec web bash -c "rm -rf copy_files"

# vue-routerインストール
docker-compose exec web bash -c "npm install -D vue-router"

# vuexインストール
docker-compose exec web bash -c "npm install --save-dev vuex"

# vuetifyインストール
docker-compose exec web bash -c "npm install -D vuetify"
docker-compose exec web bash -c "npm install @mdi/font -D"

# axiosインストール
docker-compose exec web bash -c "npm install axios --save"

# APP KEYの再生成
docker-compose exec web bash -c "php artisan key:generate"
