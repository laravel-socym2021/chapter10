# 第二部 Chapter 10 / エラーハンドリングとログの活用

## 対応表

- [Fluent\Logger\FluentLoggerクラスの登録](app/Providers/AppServiceProvider.php)
- [カスタムヘッダを利用したエラーレスポンス実装例](app/Exceptions/Handler.php)
- [Bladeテンプレートと例外処理組み合わせパターン例](app/Exceptions/AppException.php)
- [JSONレスポンスと例外処理組み合わせパターン例](app/Exceptions/UserResourceException.php)
- [Monolog\Handler\ElasticSearchHandlerクラス登録例](app/Providers/AppServiceProvider.php)
- [elasticsearchドライバ設定](config/logging.php)   
- [アクセスログをelasticsearchに送信する](app/Http/Controllers/IndexAction.php)

## Docker 

```bash
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec -w /var/www/html php composer install
```
