<?php
namespace Local;

/**
 * Class ZendAutoLoadGroup - Define as regras para capturar os elementos
 * applications do inep zend
 */

/**
 * Classe responsavel em definir as regras de autoload para se localizar os
 * elementos do application do inep zend como as controllers
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 * @implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
 */
class InepApplicationAutoloadGroup implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
{
    CONST MY_NAMESPACE = 'InepZend';

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
         //   return false;
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
        $strClassName = \str_replace( "\\\\", "\\", $strClassName );
        $strClassFile = \CorujaClassManipulation::getClassNameFromClassDefinition( $strClassName );
        $strNamespaces = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassName , false );
        $arrNamespaces = explode( \CorujaClassManipulation::NAMESPACE_SEPARATOR , $strNamespaces );
        while( isset( $arrNamespaces[0] ) && ( $arrNamespaces[0] == null ) )
        {
            array_shift( $arrNamespaces );
        }
        array_shift( $arrNamespaces );
        if( $strNamespaces != null )
        {
            foreach( $arrNamespaces as $intKey => &$strNamespace )
            {
                if( is_string( $strNamespace ) )
                {
                    $strNamespace{0} = strtolower( $strNamespace );
                }
            }
        }
        else
        {
           $arrNamespaces = array();
        }
        array_unshift( $arrNamespaces , \INEP_APPLICATION_PATH );

        $arrNamespaces[] =  ( $strClassFile . ".php" );
        $strFilePath = implode ( (string)\DIRECTORY_SEPARATOR , (array)$arrNamespaces );

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