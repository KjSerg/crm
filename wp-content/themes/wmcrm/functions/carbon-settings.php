<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	$labels = array(
		'plural_name'   => 'елементи',
		'singular_name' => 'елемент',
	);
	Container::make( 'theme_options', "Службова інформація" )
	         ->add_fields( array(
		         Field::make( "complex", "sessions" )->add_fields(
			         array(
				         Field::make( "text", "connect_id" ),
				         Field::make( "text", "last_message" ),
			         )
		         )
	         ) );
}

add_action( 'carbon_fields_register_fields', 'crb_attach_in_projects' );
function crb_attach_in_projects() {
	$labels = array(
		'plural_name'   => 'елементи',
		'singular_name' => 'елемент',
	);
	Container::make( 'post_meta', 'Worksection' )
	         ->show_on_post_type( 'projects' )
	         ->add_fields(
		         array(
			         Field::make( "separator", "crb_style_options1", "Основні данні" ),
			         Field::make( "text", "worksection_id", "ID worksection" ),
			         Field::make( "text", "worksection_page", "Worksection page" ),
			         Field::make( "text", "worksection_status", "Worksection status" ),
			         Field::make( "text", "worksection_priority", "Worksection priority" ),
			         Field::make( "separator", "crb_style_options2", "Менеджер або автор задачі" ),
			         Field::make( "text", "worksection_user_from_id", "Worksection ID користувача який поставив задачу" ),
			         Field::make( "text", "worksection_user_from_email", "Worksection email користувача який поставив задачу" ),
			         Field::make( "text", "worksection_user_from_name", "Worksection імя користувача який поставив задачу" ),
			         Field::make( "separator", "crb_style_options3", "Виконавець" ),
			         Field::make( "text", "worksection_user_to_id", "Worksection ID користувача якому поставлена задача" ),
			         Field::make( "text", "worksection_user_to_email", "Worksection email користувача якому поставлена задача" ),
			         Field::make( "text", "worksection_user_to_name", "Worksection імя користувача якому поставлена задача" ),
			         Field::make( "separator", "crb_style_options4", "Дата" ),
			         Field::make( "date_time", "worksection_date_added", "Worksection дата" )->set_storage_format( 'U' ),
			         Field::make( "date_time", "worksection_date_closed", "Worksection дата закриття" )->set_storage_format( 'U' ),
			         Field::make( "separator", "crb_style_options5", "Файли" ),
			         Field::make( "complex", "worksection_files", "Файли" )->add_fields( array(
				         Field::make( "text", "worksection_page", "Worksection page" ),
			         ) ),
			         Field::make( "separator", "crb_style_options10", "Дочірні елементи" ),
			         Field::make( "textarea", "worksection_children_ids", "ID дочірних елементи" ),
		         )
	         );

	Container::make( 'post_meta', 'Worksection коментарі' )
	         ->show_on_post_type( 'projects' )
	         ->add_fields(
		         array(
			         Field::make( "textarea", "worksection_comment_ids", "ID коментарів" ),
		         )
	         );

}

add_action( 'carbon_fields_register_fields', 'crb_attach_in_comments' );
function crb_attach_in_comments() {
	$labels = array(
		'plural_name'   => 'елементи',
		'singular_name' => 'елемент',
	);
	Container::make( 'post_meta', 'Проєкт' )
	         ->show_on_post_type( 'comments' )
	         ->add_fields(
		         array(
			         Field::make( "text", "comment_project_id", "ID проєка" ),
			         Field::make( "text", "comment_project_hush", "Hush коментаря" ),
		         )
	         );
	Container::make( 'post_meta', 'Worksection' )
	         ->show_on_post_type( 'comments' )
	         ->add_fields(
		         array(
			         Field::make( "separator", "crb_style_options1", "Основні данні" ),
			         Field::make( "text", "worksection_user_email", "Worksection email користувача" )->set_width( 50 ),
			         Field::make( "text", "worksection_user_name", "Worksection і`мя користувача" )->set_width( 50 ),
			         Field::make( "separator", "crb_style_options4", "Дата" ),
			         Field::make( "date_time", "comment_worksection_date_added", "Worksection дата" )->set_storage_format( 'U' ),
			         Field::make( "separator", "crb_style_options5", "Файли" ),
			         Field::make( "complex", "comment_worksection_files", "Файли" )->add_fields( array(
				         Field::make( "text", "worksection_page", "Worksection page" ),
			         ) )
		         )
	         );

}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	get_template_part( 'vendor/autoload' );
	\Carbon_Fields\Carbon_Fields::boot();
}

add_filter( 'crb_media_buttons_html', function ( $html, $field_name ) {
	if (
		$field_name === 'text' ||
		$field_name === 'subtitle' ||
		$field_name === 'title'
	) {
		return;
	}

	return $html;
}, 10, 2 );
