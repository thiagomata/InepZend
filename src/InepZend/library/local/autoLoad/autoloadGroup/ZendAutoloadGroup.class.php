<?php
namespace Local;

/**
 * Class ZendAutoLoadGroup - Define as regras de autoload para se localizar os
 * arquivos nativos do Zend Framework
 */

/**
 * Classe responsavel em definir as regras de autoload para se localizar os
 * arquivos nativos do Zend Framework
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 * @implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
 */
class ZendAutoloadGroup implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
{
    CONST MY_NAMESPACE = null;

    /**
     * Retorna se a classe PODE ser um elemento do grupo
     *
     * @see CorujaAutoLoadGroupInterface#classBelongsToTheGroup
     * @param string $strClassName
     */
    public function classBelongsToTheGroup( $strClassName )
    {
        return true;
        /**
         * Como os arquivos do Zend não tem nenhum padrao de nome, qualquer nome
         * pode ser válido, Application, por exemplo
         */
        $strNamespace = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassName );
        if( $strNamespace !== self::MY_NAMESPACE )
        {
            return false;
        }

        $strFileName = $this->getTheFileNameOfTheClass( $strClassName );
        return is_file( $strFileName );
    }

    /**
     * @see CorujaAutoLoadGroupInterface#getTheFileNameOfTheClass
     * @param string $strClassName
     * @throws CorujaAutoLoadGroupException
     */
    public function getTheFileNameOfTheClass( $strClassName )
    {
        $strClassName = \CorujaClassManipulation::getClassNameFromClassDefinition( $strClassName );
        $arrPath = explode( "_" , $strClassName );
        array_unshift( $arrPath , \ZEND_LIBRARY_PATH );
        $strFilePath = implode ( \DIRECTORY_SEPARATOR , $arrPath ) . ".php";
        if( !file_exists($strFilePath ) )
        {
            $arrPath = explode( "_" , $strClassName );
            array_unshift( $arrPath , \ZEND_APPLICATION_PATH );
            $strFilePath = implode ( \DIRECTORY_SEPARATOR , $arrPath ) . ".php";
        }
        return $strFilePath;
    }

    /**
     * On load the class component
     *
     * @see CorujaAutoLoadGroupInterface#onLoadClass
     * @param string $strClassName
     * @throws CorujaAutoLoadGroupException
     */
    public function onLoadClass( $strClassName )
    {
    }
}
?>