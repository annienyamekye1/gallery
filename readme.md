 - to run fuseki server: fuseki-server --file=path-to-your-art-gallery-turtle.ttl /ArtGallery

 - to run the queries on the fuseki server you'll need the ff prefixes, and to select Turtle as format
 prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
prefix xml: <http://www.w3.org/XML/1998/namespace>
prefix xsd: <http://www.w3.org/2001/XMLSchema#>
prefix rdfs: <http://www.w3.org/2000/01/rdf-schema#>
base <http://www.semanticweb.org/anniedumashie/ontologies/2021/10/art-gallery> 

SELECT ?name ?nationality WHERE {
            ?x a gallery:Artist;
                  gallery:name ?name;
                  gallery:has_nationality ?nationalityRaw
                  bind(strafter(str(?nationalityRaw),str(gallery:)) as ?nationality) .
  FILTER (?nationality = 'American')
}