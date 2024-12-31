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
            "use": "vercel-php@0.6.1"
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

[公式推奨のサンプル](https://github.com/juicyfx/vercel-examples/blob/master/php-laravel/vercel.json) を参考にしました

# Node.jsのバージョンを18にする理由

[GitHub Issue](https://github.com/vercel-community/php/issues/504) によると、 `vercel-php@0.6.1` は Node.js v18でしか動かないみたいだったので18にしました。

# ASSET_URLについて

bladeファイルで `asset('image/current-location.png')` のようにassetを使ってパスを指定しています。これを使う場合はASSET_URLという環境変数を設定する必要がありそうでした。
ローカルで起動していた理由としては、デフォルトではhttpのドメインで読み込むためみたいです。Vercel上ではhttps通信となっているため、ASSET_URLを設定する必要がありました。

- [参考](https://it-slroom.blog/web/mixed-content/)