<?php

declare(strict_types=1);

namespace App\Providers;

use App\Foundation\ElasticsearchClient;
use Fluent\Logger\FluentLogger;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\ElasticsearchHandler;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // リスト10.2.3.3：Monolog\Handler\ElasticSearchHandlerクラス登録例
        $this->app->singleton(
            ElasticsearchHandler::class,
            function (Application $app) {
                return new ElasticsearchHandler(
                    $app->make(ElasticsearchClient::class)->client()
                );
            }
        );
        // リスト10.1.4.2：Fluent\Logger\FluentLoggerクラスの登録
        $this->app->singleton(
            FluentLogger::class,
            function () {
                // 実際に利用する場合は.envファイルなどでサーバのアドレスとportを指定
                return new FluentLogger('localhost', 24224);
            }
        );
    }
}
