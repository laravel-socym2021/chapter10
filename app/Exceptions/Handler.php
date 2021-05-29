<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );
    }

    public function render($request, Throwable $e)
    {
        // リスト10.1.5.3：カスタムヘッダを利用したエラーレスポンス実装例
        // 送出されたExceptionクラスを継承したインスタンスのうち特定の例外のみ処理を変更
        if ($e instanceof QueryException) {
            // カスタムヘッダを利用してエラーレスポンス、ステータスコード500を返却
            return new Response('', Response::HTTP_INTERNAL_SERVER_ERROR, [
                'X-App-Message' => 'An error occurred.'
            ]);
        }
        return parent::render($request, $e);
    }

}
