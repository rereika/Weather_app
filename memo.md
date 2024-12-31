# vercel.jsonについて

```json
{
    "version": 2,
    "regions": [
        "hnd1"
    ],
    "builds": [
        {
            "src": "/api/index.php",
            "use": "vercel-php@0.6.2"
        },
        {
            "src": "/public/**",
            "use": "@vercel/static"
        }
    ],
    "routes": [
        {
            "src": "/(css|js|image)/(.*)",
            "dest": "public/$1/$2"
        },
        {
            "src": "/favicon.ico",
            "dest": "/public/favicon.ico"
        },
        {
            "src": "/robots.txt",
            "dest": "/public/robots.txt"
        },
        {
            "src": "/(.*)",
            "dest": "/api/index.php"
        }
    ],
    "env": {
        "APP_NAME": "Laravel Vercel",
        "APP_DEBUG": "false",
        "APP_CONFIG_CACHE": "/tmp/config.php",
        "APP_EVENTS_CACHE": "/tmp/events.php",
        "APP_PACKAGES_CACHE": "/tmp/packages.php",
        "APP_ROUTES_CACHE": "/tmp/routes.php",
        "APP_SERVICES_CACHE": "/tmp/services.php",
        "CACHE_DRIVER": "array",
        "CACHE_STORE": "array",
        "LOG_CHANNEL": "stderr",
        "SESSION_DRIVER": "cookie",
        "VIEW_COMPILED_PATH": "/tmp"
    }
}

```

[公式推奨のサンプル](https://github.com/juicyfx/vercel-examples/blob/master/php-laravel/vercel.json) を参考にしました。

また、本アプリケーションは `composer.json`によるとPHP v8.2で起動することから、`"use": "vercel-php@0.6.2"` を使用しました。 [参考](https://github.com/vercel-community/php)


# Node.jsのバージョンを18にする理由

[GitHub Issue](https://github.com/vercel-community/php/issues/504) によると、 `vercel-php@0.6.2` は Node.js v18でしか動かないみたいだったので18にしました。

# ASSET_URLについて

bladeファイルで `asset('image/current-location.png')` のようにassetを使ってパスを指定しています。これを使う場合はASSET_URLという環境変数を設定する必要がありそうでした。
ローカルで起動していた理由としては、デフォルトではhttpのドメインで読み込むためみたいです。Vercel上ではhttps通信となっているため、ASSET_URLを設定する必要がありました。

- [参考](https://it-slroom.blog/web/mixed-content/)

# 総評

LaravelをVercelでデプロイする方法をまとめました。

個人利用や就活目的の一時的なものであれば、Vercelを使ってデプロイしても良いと思いますが、しっかりとしたアプリケーションを構築する前提ですと以下の理由でお勧めできません。

- Node.jsがv18という、古いバージョンでしか起動しない（最新はv22ですので古いバージョンのまま使い続けるのは推奨できません）

Laravelをモダンな環境でデプロイするのであればコンテナ環境が現在オススメできると個人的に思います。AWSやGoogle Cloudなどのパブリッククラウドを使ってデプロイすることもできますが、料金的に心配であれば、さくらVPSなどの比較的安価にサーバーを使えるサービスもございますので、別の機会にでも検討してみてください！