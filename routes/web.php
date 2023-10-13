<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeUniversitaire\AnneUniversitaireController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::group(
    [
        'middleware' => ['auth']
    ], function () {

        Route::get('/', function () {
            return view('dashboard');
        });
        
        Route::group(['namespace' => 'AnneeUniversitaire'], function(){
            Route::resource('anneeuniversitaire', 'AnneUniversitaireController');      
        });
        Route::group(['namespace' => 'Ecole'], function(){
            Route::resource('ecole', 'EcoleController');      
        });
        Route::group(['namespace' => 'Departement'], function(){
            Route::resource('departement', 'DepartementController');      
        });
        Route::group(['namespace' => 'Filiere'], function(){
            Route::resource('typefiliere', 'TypeFiliereController');      
            Route::resource('filiere', 'FiliereController');          
            Route::resource('filiereniveau', 'FiliereNiveauController');          
        });
        Route::group(['namespace' => 'PlanEtude'], function(){
            Route::resource('planetude', 'PlanEtudeController');      
            Route::get('getniveau/{id}', 'PlanEtudeController@getniveau');
            Route::resource('moduleplanetude', 'ModulePlanEtudeController');                   
        });
        Route::group(['namespace' => 'Semestre'], function(){
            Route::resource('semestre', 'SemestreController');                    
        });

        //==============================cursus============================

        Route::group(['namespace' => 'Cursus'], function(){
            Route::resource('cursus', 'CursusController');                    
            Route::resource('modulecursus', 'ModuleCursusController');                    
        });

        Route::group(['namespace' => 'Groupe'], function(){
            Route::resource('groupe', 'GroupeController');   
            Route::get('getgroupe/{id_groupe}', 'GroupeController@getgroupe');
        });

        Route::group(['namespace' => 'SousGroupe'], function(){
            Route::resource('sousgroupe', 'SousGroupeController');   
            Route::get('getclass/{filiere_id}/{niveau_id}', 'SousGroupeController@getclass');
            Route::get('getgroupe/{class_id}', 'SousGroupeController@getgroupe');
            Route::get('getaffectation/{class_id}', 'SousGroupeController@getgroupe');
        });
        Route::group(['namespace' => 'SousGroupeAffectation'], function(){
            Route::resource('sousgroupeaffectation', 'SousGroupeAffectationController');   
            Route::get('nbetudiants', 'SousGroupeAffectationController@nbEtudiants');

        });
        //==============================certification============================
        Route::group(['namespace' => 'Certification'], function(){
            Route::resource('typecertif', 'TypeCertifController');      
            Route::resource('certif', 'CertifController');          
            Route::resource('soustypecertif', 'SousTypeCertifController'); 
            Route::resource('typeprix', 'TypePrixController'); 
            Route::resource('prixcertif', 'PrixCertifController');
            Route::resource('responsablecertif', 'ResponsableController');
            Route::resource('certifuser', 'CertifUserController');        
        });
        //==============================etudiant============================

            Route::view('ajouteretudiant','livewire.form');

        Route::group(['namespace' => 'Pdf'], function(){
            Route::get('pdf/test/etudiants', 'EmpController@getAllEtudiants');
            Route::get('pdf/feliere/etudiants', 'EmpController@getEtudiantsFiliere')->name('etudiants.filiere.pdf');
        });

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('bienvenue');
});


















