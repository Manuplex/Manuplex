<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AnalyticsServiceProvider;
use App\Models\bacheliers;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Facades;
use App\Interfaces\AnalyticsInterface;
use DevPro\GA4EventTracking\GA4;
use Illuminate\Support\Facades\Crypt;

class PrizeController extends Controller
{ 
  
protected $analytics;

public function __construct(AnalyticsServiceProvider $analytics)
{
  $this->analytics=$analytics;
    
}

  public function index()
  {
    return view('index');
  }  
  
  private function generated_lnk($matricule)
  {
        $base_url="http://icconcourstg.rf.gd/";
        $token=bin2hex(random_bytes(16));
        $utmParams=
        http_build_query([
            'utm_source'=>'registration',
            'utm_medium'=>'link',
            'utm_campaign'=>'user_registration',
        ]);
        return $base_url . "?mat=" . urlencode($matricule) . "&token=" . urlencode($token) . "&" . $utmParams;
  }

   public function create(request $request)
    {
      
          //Validation des attributs
         $this->validate($request,[
            'Name'  => 'bail|required|string|max:255',
            'Prenom' => 'bail|required|string|max:255',
            'calendar'=> 'bail|required|date',
            'tel'=> 'bail|required|max:15',
            'num_comm'=> 'bail|required|max:2',
         ]);         
         $numb=0;
         $numb++;

         $nom=$request->input('Name');
         $prenom=$request->input('Prenom');          
         $date_naissance=$request->input('calendar');
         $num_commercial=$request->input('num_comm');   
         $telephone=$request->input('tel');
         $date=date("Y-m-d H:i:s");
         $mat=substr($nom,0,2).substr($prenom,0,3).$numb;
         $link=$this->generated_lnk($mat);
         $options=[
          'cipher'=>'aes-256-cbc',
          'iv'=>'random_bytes(16)',
         ];
         $mat=Crypt::encryptString($mat,$options);

       $user= bacheliers::Create([
            "matricule"=>$mat,
            "nom"=>$nom,
            "prenom"=>$prenom,
            "date_naissance"=>$date_naissance,
            "num_commercial"=>$num_commercial,
            "telephone"=>$telephone,
            "save_date"=>$date,
            "code_link"=>$link,
       ]);
       $eventName = 'click'; // Nom de l'événement personnalisé
        
       $user=bacheliers::find($mat);
       Crypt::decryptString($mat);
       $GA4=new GA4();
       $GA4->sendEvent([
        'name'=>'click',
        'params'=>[
          'lien' =>$link
        ],
      ]);
          dump($user);
            return view('finishup',compact('user'));          
   }

    public function rapport()
    {
        $this->analytics->getAnalyticsReport();
        return view('/Registration', compact('reportData'));
    }
}