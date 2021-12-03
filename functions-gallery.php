<?php
require_once( "sparql_library.php" );

class Functions{
    private $db;
    
    public function __construct(){
	$db = sparql_connect( "http://localhost:3030/ArtGallery/sparql" ); // I had to use `fuseki-server --file=path-to-your-art-gallery-turtle.ttl /ArtGallery` else the endpoint would return a 404.
	if( !$db ) { print sparql_errno() . ": ---" . sparql_error(). "\n"; exit; }
    sparql_ns( "owl","http://www.w3.org/2002/07/owl#" );
	sparql_ns( "gallery","http://www.semanticweb.org/anniedumashie/ontologies/2021/10/art-gallery#" ); // have to change this namespace to your ontology // have to change this namespace to your ontology
    }

    // Get a list of nationalities
    public function get_nationalities(){
        // TO-DO: read on the bind keyword. THe nationalities come as links if you don't replace them, whihc is what the bind section of the code does
        $sparql = "SELECT DISTINCT ?nationality WHERE {
            ?class a owl:NamedIndividual;
                   gallery:has_nationality ?nationalityRaw
            bind(strafter(str(?nationalityRaw),str(gallery:)) as ?nationality) .
          }";
        $result = sparql_query( $sparql );
        return $result;
    }

    // Get a list of 25 artists at random. You may replace this with something else if you wanna
    public function get_featured_artists(){
        $sparql = "SELECT ?name ?nationality ?title WHERE {
            ?x a gallery:Artist;
               gallery:name ?name;
               gallery:has_nationality ?nationalityRaw;
               bind(strafter(str(?nationalityRaw),str(gallery:)) as ?nationality) .
            ?y a gallery:Artwork;
               gallery:has_Title ?title
          }
          LIMIT 25";
        $result = sparql_query( $sparql ); 
        return $result;
    }

    // The filter functionality. Filters by the submitted nationality
    public function get_artists_by_nationality($nationality) {
        $sparql = "SELECT ?name ?nationality ?title WHERE {
            ?x a gallery:Artist;
               gallery:name ?name;
               gallery:has_nationality ?nationalityRaw;
               bind(strafter(str(?nationalityRaw),str(gallery:)) as ?nationality) .
            ?y a gallery:Artwork;
               gallery:has_Title ?title
        FILTER (?nationality = '".$nationality."')
    }";
        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        return $result;   
    }
}
?>