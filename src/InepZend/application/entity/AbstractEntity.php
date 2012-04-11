<?php
//require_once 'annotations.php';
class AbstractEntity{
 	public function save(){
        $classe = get_class($this);
        $reflectionClass = new ReflectionAnnotatedClass($classe);
        $tabela = $reflectionClass->getAnnotation('Table')->value;
 
        $propriedades = $reflectionClass->getProperties();
 
        foreach($propriedades as $propriedade){
            if($propriedade->hasAnnotation('Column')){
 
                $getter = 'get'.ucfirst($propriedade->name);
                $key = $propriedade->getAnnotation('Column')->value;
                $fields[$key] = $this->$getter();
 
            }
        }
        echo "INSERT INTO ".$tabela." ('"
            .implode("', '",array_keys($fields))."') VALUES ('"
            .implode("', '",array_values($fields))."')";
    }
} 
?>