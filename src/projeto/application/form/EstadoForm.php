<?php
namespace Projeto\Form;

/**
 * @entity Projeto\Model\Estado
 */
class EstadoForm extends \Local\Form\InepForm
{
    /**
     * @label Nome:
     * @tag input
     * @var string
     * @size 10
     */
    protected $nome;

    /**
     * @label UF:
     * @tag input
     * @var string
     */
    protected $uf;

    /**
     * @label Enviar
     * @tag submit
     * @var string
     */
    protected $enviar;

    /**
     * @label Cancelar
     * @tag cancel
     * @var string
     */
    protected $cancelar;

    /**
     * @label Voltar
     * @tag submit
     * @var string
     */
    protected $voltar;

    /**
     *
     * @label oi
     * @tag button
     * @var string
     */
    protected $oi;
    
    public function init()
    {
    }
}
 