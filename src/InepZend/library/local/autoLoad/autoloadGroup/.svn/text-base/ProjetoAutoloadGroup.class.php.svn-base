<?php
namespace Local;

/**
 * Class ProjetoAutoloadGroup - Define as regras de autoload para se localizar os
 * arquivos de cada projeto
 */

/**
 * Classe responsavel em definir as regras de autoload para se localizar os
 * arquivos nativos do Zend Framework
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 * @implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
 */
class ProjetoAutoloadGroup implements \Coruja\AutoLoad\CorujaAutoLoadGroupInterface
{
    protected $strProjetoNamespace;


    public function getProjectNamespace()
    {
        if( $this->strProjetoNamespace == null )
        {
            if( Bootstrap::hasInstance() )
            {
                $this->strProjetoNamespace = \CorujaArrayManipulation::getArrayField( Bootstrap::getInstance()->getOption( 'project' ) , 'namespace' );
            }
        }
        return $this->strProjetoNamespace;

    }

    /**
     * Retorna se a classe PODE ser um elemento do grupo
     *
     * @see CorujaAutoLoadGroupInterface#classBelongsToTheGroup
     * @param string $strClassName
     */
    public function classBelongsToTheGroup( $strClassName )
    {
        $strNamespace = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassName );
        return( strtolower( $this->getProjectNamespace() ) == strtolower( $strNamespace ) );
    }

    /**
     * @see CorujaAutoLoadGroupInterface#getTheFileNameOfTheClass
     * @param string $strClassName
     * @throws CorujaAutoLoadGroupException
     */
    public function getTheFileNameOfTheClass( $strClassName )
    {
        $strClassFile = \CorujaClassManipulation::getClassNameFromClassDefinition( $strClassName );
        $strNamespaces = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassName , false );
        $arrNamespaces = explode( \CorujaClassManipulation::NAMESPACE_SEPARATOR , $strNamespaces );
        /**
         * Removendo namespaces nulos
         */
        while( isset( $arrNamespaces[0] ) && $arrNamespaces[0] == null )
        {
            array_shift( $arrNamespaces );
        }
        /**
         * Removendo o namespace de assinatura do path
         */
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
        array_unshift( $arrNamespaces , \APPLICATION_PATH );

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