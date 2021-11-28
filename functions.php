<?php
require_once( "sparql_library.php" );

class Functions{
    private $db;
    
    public function __construct(){
	$db = sparql_connect( "http://localhost:3030/ArtGallery/sparql" );
	if( !$db ) { print sparql_errno() . ": ---" . sparql_error(). "\n"; exit; }
	sparql_ns( "mov","http://www.moviemania.com/ontology#" );
    }
    public function get_languages(){
        $sparql = "SELECT ?name 
            WHERE {
            ?x a mov:Spoken_Language.
            ?x mov:name ?name.
        }";
        $result = sparql_query( $sparql ); 
        return $result;
    }
    public function get_genres() {
        $sparql = "SELECT ?name ?link
            WHERE {
            ?x a mov:Genre.
            ?x mov:name ?name.
            ?x mov:thumbnail_url ?link
            }";
        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        return $result;   
    }
    
    public function get_movies($language) {
        $sparql = " SELECT ?name 
            WHERE {
                ?x a mov:Movie.
                ?x mov:spoken_language ?lang.
                ?x mov:title ?name.
                ?lang mov:name '".$language."'.
            }";
        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        return $result;   
    }
}
?>