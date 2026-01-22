<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Global variable for unread contact replies
        View::composer('*', function ($view) {
            $unreadReplies = 0;

            if (Auth::check()) { // user logged in hai ya nahi check karo
                $unreadReplies = Contact::where('user_id', Auth::id())
                                        ->whereNotNull('reply') // sirf reply wale
                                        ->count();
            }

            $view->with('unreadReplies', $unreadReplies);
        });
    }
}
