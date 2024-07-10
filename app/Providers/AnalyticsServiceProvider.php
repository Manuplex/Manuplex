<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;
use Spatie\Analytics\Period;
use App\Interfaces\AnalyticsInterface;


class AnalyticsServiceProvider extends ServiceProvider implements AnalyticsInterface 
{
     /**
     * Register services.
     *
     * @return void
     */

     public function register()
     {
        $this->app->bind(AnalyticsServiceProvider::class, function()
        {
            $myclient=app(Analytics::class);
            return new AnalyticsServiceProvider($myclient);
        });
     }
     
    public function getAnalyticsReport()
    {
            //obtenez les données analytiques
            $analyticsData=
            Analtics::performQuery(
                    Period::days(30),
                    'ga:sessions',
                    [
                        'metrics'=> 'ga:sessions, ga:pageviews',
                                        'dimensions'=>
                                        'ga:source,ga:medium,ga:campaign,ga:keyword',
                                        'filters' =>
                                        'ga:source==whatsapp; ga:medium==social; ga:medium==social;ga:campaign==user_campaign'
                    ]
                    );
            // Traiter la réponse pour extraire les données
            $reportData = collect($analyticsData['rows'] ?? [])->map(function ($row) {
                return [
                    'source' => $row[0],
                    'medium' => $row[1],
                    'campaign' => $row[2],
                    'term' => $row[3],
                    'sessions' => $row[4],
                    'pageViews' => $row[5],
                ];
            });
            return view('analytics.report', compact('reportData'));
        }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
