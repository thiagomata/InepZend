<?php
namespace Projeto\Form;

/**
 * @entity Projeto\Model\Cidade
 */
class CidadeForm extends \Local\Form\InepForm
{
    /**
     * @order 1
     * @label nome
     * @tag input
     * @var string
     * @size 50
     */
    protected $nome;

    /**
     * @tag select
     * @label estado
     * @order 2
     * @fill selectEstadoFill
     * @var integer
     */
    protected $estado_id;

    /**
     *
     * @tag submit
     * @label Enviar
     * @var string
     */
    protected $enviar;

    /**
     *
     * @tag submit
     * @label Cancelar
     * @var string
     */
    protected $cancelar;

    /**
     *
     * @tag submit
     * @label Voltar
     * @var string
     */
    protected $voltar;

    public function setNome( $strNome )
    {
        $this->nome = $strNome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setEstadoId( $intId )
    {
       $this->estado_id = $intId;
    }

    public function selectEstadoFill( \Local\Form\Elements\InepFormElementSelect $objSelect )
    {
        $objSelect->addMultiOption(
            null,
            null
        );

        $objSelect->setLabel( 'Estado:' );
        $objEstadoTable = \Projeto\Model\EstadoTable::getInstance();
        $arrEstados = $objEstadoTable->getAll();
        foreach( $arrEstados as $objEstado )
        {
            $objSelect->addMultiOption(
                $objEstado->getId(),
                $objEstado->getNome()
            );
        }
    }

    public function init()
    {
    }
}
 