<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        
        //////////////////// ROLES
        'highPermission' => \App\Http\Middleware\Roles\HighPermissions::class,
        'docentePermission' => \App\Http\Middleware\Roles\DocentePermissions::class,
        'estudiantePermission' => \App\Http\Middleware\Roles\EstudiantePermissions::class,
        'cordinadorPermission' => \App\Http\Middleware\Roles\CoordinadorPermission::class,
        'docenteEstudiantePermission' => \App\Http\Middleware\Roles\DocenteEstudiantePermission::class,
        'secretariaPermission' => \App\Http\Middleware\Roles\SecretariaPermission::class,
        'jefePermission' => \App\Http\Middleware\Roles\JefePermission::class,
        'notStudentPermission' => \App\Http\Middleware\Roles\NotStudentPermission::class,

        //////////////////// TESIS
        'tesisUploaded' => \App\Http\Middleware\Tesis\TesisUploaded::class,
        'redirectIfTesisUploaded' => \App\Http\Middleware\Tesis\RedirectIfTesisUploaded::class,
        'redirectIfTesisNotUploaded' => \App\Http\Middleware\Tesis\RedirectIfTesisNotUploaded::class,
        'registerInTesisPermission' => \App\Http\Middleware\Tesis\RegisterInTesisPermission::class,
        'redirectIfChangeRequestNotMade' => \App\Http\Middleware\Tesis\RedirectIfChangeRequestNotMade::class,
        'redirectIfChangeRequestPending' => \App\Http\Middleware\Tesis\RedirectIfChangeRequestPending::class,
        'requestSubjectIsTema' => \App\Http\Middleware\Tesis\RequestSubjectIsTema::class,
        'requestSubjectIsTitulo' => \App\Http\Middleware\Tesis\RequestSubjectIsTitulo::class,
        'redirectIfChangeRequestNotPending' => \App\Http\Middleware\Tesis\RedirectIfChangeRequestNotPending::class,
        'hasDirector' => \App\Http\Middleware\HasDirector::class,
        'directorPermission' => \App\Http\Middleware\DirectorPermission::class,

        //////////////////// ESTADIA TECNICA
        'estadiaApproved' => \App\Http\Middleware\Estadia\EstadiaApproved::class,
        'estadiaIsNotRegistered' => \App\Http\Middleware\Estadia\EstadiaIsNotRegistered::class,
        'estadiaIsRegistered' => \App\Http\Middleware\Estadia\EstadiaIsRegistered::class,
        'estadiaModifiable' => \App\Http\Middleware\Estadia\EstadiaModifiable::class,
        'estadiaPending' => \App\Http\Middleware\Estadia\EstadiaPending::class,
        'estadiaStamped' => \App\Http\Middleware\Estadia\EstadiaStamped::class,
    ];
}
