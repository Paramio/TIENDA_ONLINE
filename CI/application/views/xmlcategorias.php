<?php header('Content-Disposition: attachment; filename="categorias.xml"');
 


echo "<categorias>";

foreach($categorias as $categoria){

    echo "<categoria>";
        echo "<id>".$categoria->Id."</id>";
        echo "<nombre>".$categoria->Nombre."</nombre>";
        echo "<descripcion>".$categoria->Descripcion."</descripcion>";
        echo "<visible>".$categoria->Visible."</visible>";
    echo "</categoria>";
}
echo "</categorias>";

?>