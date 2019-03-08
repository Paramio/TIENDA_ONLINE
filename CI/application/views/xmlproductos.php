<?php header('Content-Disposition: attachment; filename="productos.xml"');
 


echo "<productos>";

foreach($productos as $producto){

    echo "<producto>";
        echo "<id>".$producto->Id."</id>";
        echo "<codigo>".$producto->Codigo."</codigo>";
        echo "<nombre>".$producto->Nombre."</nombre>";
        echo "<descripcion>".$producto->Descripcion."</descripcion>";
        echo "<precio>".$producto->Precio."</precio>";
        echo "<stock>".$producto->Stock."</stock>";
        echo "<descuento>".$producto->Descuento."</descuento>";
        echo "<imagen>".$producto->Imagen."</imagen>";
        echo "<iva>".$producto->Iva."</iva>";
        echo "<visible>".$producto->Visible."</visible>";
        echo "<destacado>".$producto->Destacado."</destacado>";
        echo "<fecha_inicio>".$producto->Fecha_Inicio."</fecha_inicio>";
        echo "<fecha_final>".$producto->Fecha_Final."</fecha_final>";
        echo "<categoria_id>".$producto->Categoria_Id."</categoria_id>";
    echo "</producto>";
}
echo "</productos>";

?>