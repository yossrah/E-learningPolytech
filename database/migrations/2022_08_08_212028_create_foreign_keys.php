<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('filieres', function(Blueprint $table) {
			$table->foreign('type_filiere_id')->references('id')->on('types_filieres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('filieres', function(Blueprint $table) {
			$table->foreign('departement_id')->references('id')->on('departements')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('departements', function(Blueprint $table) {
			$table->foreign('ecole_id')->references('id')->on('ecoles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sous-_type_certifs', function(Blueprint $table) {
			$table->foreign('typecertif_id')->references('id')->on('type_certifs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('niveaux', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filieres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->foreign('ecole_id')->references('id')->on('ecoles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->foreign('departement_id')->references('id')->on('departements')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filieres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->foreign('niveau_id')->references('id')->on('niveaux')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Modules_plan_etudes', function(Blueprint $table) {
			$table->foreign('plan_etude_id')->references('id')->on('plan_etudes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cursus', function(Blueprint $table) {
			$table->foreign('plan_etude_id')->references('id')->on('plan_etudes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cursus', function(Blueprint $table) {
			$table->foreign('annee_universitaire_id')->references('id')->on('annes_universitaire')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->foreign('cursus_id')->references('id')->on('cursus')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->foreign('module_plan_etude_id')->references('id')->on('Modules_plan_etudes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->foreign('semestre_id')->references('id')->on('semestre')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filieres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->foreign('niveau_id')->references('id')->on('niveaux')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->foreign('groupe_id')->references('id')->on('groupes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('passeport_etudiants', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiants')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('parents', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiants')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filieres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->foreign('niveau_id')->references('id')->on('niveaux')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sous_groupes', function(Blueprint $table) {
			$table->foreign('type_sous_groupe_id')->references('id')->on('type_sous_groupes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sous_groupes', function(Blueprint $table) {
			$table->foreign('niveau_id')->references('id')->on('niveaux')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sous_groupes_affectation', function(Blueprint $table) {
			$table->foreign('sous_groupe_id')->references('id')->on('sous_groupes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sous_groupes_affectation', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiants')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('certifs', function(Blueprint $table) {
			$table->foreign('sousTypeCert_id')->references('id')->on('sous-_type_certifs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('prix_certifs', function(Blueprint $table) {
			$table->foreign('type_prixes_id')->references('id')->on('type_prixes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('prix_certifs', function(Blueprint $table) {
			$table->foreign('certifs_id')->references('id')->on('certifs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('responsable_certifs', function(Blueprint $table) {
			$table->foreign('certifs_id')->references('id')->on('certifs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('responsable_certifs', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users_public')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		
	}

	public function down()
	{
		Schema::table('filieres', function(Blueprint $table) {
			$table->dropForeign('filieres_type_filiere_id_foreign');
		});
		Schema::table('filieres', function(Blueprint $table) {
			$table->dropForeign('filieres_departement_id_foreign');
		});
		Schema::table('departements', function(Blueprint $table) {
			$table->dropForeign('departements_ecole_id_foreign');
		});
		Schema::table('niveaux', function(Blueprint $table) {
			$table->dropForeign('niveaux_filiere_id_foreign');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->dropForeign('plan_etudes_ecole_id_foreign');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->dropForeign('plan_etudes_departement_id_foreign');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->dropForeign('plan_etudes_filiere_id_foreign');
		});
		Schema::table('plan_etudes', function(Blueprint $table) {
			$table->dropForeign('plan_etudes_niveau_id_foreign');
		});
		Schema::table('Modules_plan_etudes', function(Blueprint $table) {
			$table->dropForeign('Modules_plan_etudes_plan_etude_id_foreign');
		});
		Schema::table('cursus', function(Blueprint $table) {
			$table->dropForeign('cursus_plan_etude_id_foreign');
		});
		Schema::table('cursus', function(Blueprint $table) {
			$table->dropForeign('cursus_annee_universitaire_id_foreign');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->dropForeign('module_cursus_cursus_id_foreign');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->dropForeign('module_cursus_module_plan_etude_id_foreign');
		});
		Schema::table('module_cursus', function(Blueprint $table) {
			$table->dropForeign('module_cursus_semestre_id_foreign');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->dropForeign('etudiants_filiere_id_foreign');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->dropForeign('etudiants_niveau_id_foreign');
		});
		Schema::table('etudiants', function(Blueprint $table) {
			$table->dropForeign('etudiants_groupe_id_foreign');
		});
		Schema::table('passeport_etudiants', function(Blueprint $table) {
			$table->dropForeign('passeport_etudiants_etudiant_id_foreign');
		});
		Schema::table('parents', function(Blueprint $table) {
			$table->dropForeign('parents_etudiant_id_foreign');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->dropForeign('groupes_filiere_id_foreign');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->dropForeign('groupes_niveau_id_foreign');
		});
		Schema::table('sous_groupes', function(Blueprint $table) {
			$table->dropForeign('sous_groupes_type_sous_groupe_id_foreign');
		});
		Schema::table('sous_groupes', function(Blueprint $table) {
			$table->dropForeign('sous_groupes_niveau_id_foreign');
		});
		Schema::table('sous_groupes_affectation', function(Blueprint $table) {
			$table->dropForeign('sous_groupes_affectation_sous_groupe_id_foreign');
		});
		Schema::table('sous_groupes_affectation', function(Blueprint $table) {
			$table->dropForeign('sous_groupes_affectation_etudiant_id_foreign');
		});
	}
}