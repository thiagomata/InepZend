<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Usuario
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_usuario
 */
class Usuario extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_Usuario
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome do Usuario
     *
     * @setter setNome
     * @getter getNome
     * @column no_usuario
     * @maxlength 300
     * @var string
     */
    protected $strNome;

    /**
     * E-mail do Usuario
     *
     * @column txt_email
     * @setter setEmail
     * @getter getEmail
     * @maxlength 255
     * @var string
     */
    protected $strEmail;

    /**
     * Login do Usuario
     *
     * @column txt_login
     * @setter setLogin
     * @getter getLogin
     * @maxlength 45
     * @var string
     */
    protected $strLogin;

    /**
     * Senha do Usuario
     *
     * @column txt_login
     * @setter setSenha
     * @getter getSenha
     * @maxlength 45
     * @var string
     */
    protected $strSenha;

    /**
     * Cpf do Usuario
     *
     * @column txt_cpf
     * @setter setCpf
     * @getter getCpf
     * @maxlength 11
     * @var string
     */
    protected $strCpf;

    /**
     * Id do Endereco do Usuario
     *
     * @column id_Endereco
     * @setter setIdEndereco
     * @getter getIdEndereco
     * @entity objEndereco
     * @var integer
     */
    protected $intIdEndereco;

    /**
     * Endereco do Usuario
     *
     * @setter setEndereco
     * @getter getEndereco
     * @id intIdEndereco
     * @throws NotFound
     * @var Endereco
     */
    protected $objEndereco;

    /**
     * Id do Nivel do Usuario
     *
     * @column id_Nivel
     * @setter setIdNivel
     * @getter getIdNivel
     * @entity objNivel
     * @var integer
     */
    protected $intIdNivel;

    /**
     * Nivel do Usuario
     *
     * @setter setNivel
     * @getter getNivel
     * @id intIdNivel
     * @throws NotFound
     * @var Nivel
     */
    protected $objNivel;

    /**
     * Professor
     *
     * @relationship professor
     * @OneToOne Professor::intIdUsuario
     * @var Professor
     */
    protected $objProfessor;

    /**
     * Matriculas do Usuario
     *
     * @relationship matriculas
     * @OneToMany intIdUsuario
     * @var Matricula[]
     */
    protected $arrMatriculas;

    /**
     * Informa o nome do Usuario
     *
     * @param string $strNome
     * @return Usuario
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome do Usuario
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Informa o nome do Email
     *
     * @param string $strEmail
     * @return Usuario
     */
    public function setEmail( $strEmail )
    {
        $this->strEmail = $strEmail;
        return $this;
    }

    /**
     * Obtem o nome do Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->strEmail;
    }

    /**
     * Informa o nome do Login
     *
     * @param string $strLogin
     * @return Usuario
     */
    public function setLogin( $strLogin )
    {
        $this->strLogin = $strLogin;
        return $this;
    }

    /**
     * Obtem o nome do Login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->strLogin;
    }

    /**
     * Informa o nome da Senha
     *
     * @param string $strSenha
     * @return Usuario
     */
    public function setSenha( $strSenha )
    {
        $this->strSenha = $strSenha;
        return $this;
    }

    /**
     * Obtem o nome da Senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->strSenha;
    }

    /**
     * Informa o nome do Cpf
     *
     * @param string $strCpf
     * @return Usuario
     */
    public function setCpf( $strCpf )
    {
        $this->strCpf = $strCpf;
        return $this;
    }

    /**
     * Obtem o nome do Cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->strCpf;
    }

    /**
     * Informa o id do Endereco
     *
     * @param integer $intIdEndereco
     * @return Usuario
     */
    public function setIdEndereco( $intIdEndereco )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdEndereco );
    }

    /**
     * Obtem o id do Endereco
     *
     * @return integer
     */
    public function getIdEndereco()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Endereco
     *
     * @param Endereco $objEndereco
     * @return Usuario
     */
    public function setEndereco( Endereco $objEndereco )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objEndereco );
    }

    /**
     * Obtem a entidade Endereco
     *
     * @return Endereco
     */
    public function getEndereco()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do Nivel
     *
     * @param integer $intIdNivel
     * @return Usuario
     */
    public function setIdNivel( $intIdNivel )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdNivel );
    }

    /**
     * Obtem o id do Nivel
     *
     * @return integer
     */
    public function getIdNivel()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Nivel
     *
     * @param Nivel $objNivel
     * @return Usuario
     */
    public function setNivel( Nivel $objNivel )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objNivel );
    }

    /**
     * Obtem a entidade Nivel
     *
     * @return Nivel
     */
    public function getNivel()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do Professor
     *
     * @param integer $intIdProfessor
     * @return Usuario
     */
    public function setIdProfessor( $intIdProfessor )
    {
        return $this->reverseLoadSetId( 'professor' , $intIdProfessor );
    }

    /**
     * Obtem o id do Professor
     *
     * @return integer
     */
    public function getIdProfessor()
    {
        return $this->reverseLoadGetId( 'professor' );
    }

    /**
     * Informa a entidade Professor
     *
     * @param Professor $objProfessor
     * @return Usuario
     */
    public function setProfessor( Professor $objProfessor )
    {
        return $this->reverseLoadSetEntity( 'professor' , $objProfessor );
    }

    /**
     * Obtem a entidade Professor
     *
     * @return Professor
     */
    public function getProfessor()
    {
        return $this->reverseLoadGetEntity( 'professor' );
    }

    /**
     * Retorna se o Usuario é um Professor
     *
     * @return boolean
     */
    public function isProfessor()
    {
        return $this->reverseIsEntity( 'professor' );
    }

    /**
     * Obtem os Matriculas do Usuario
     *
     * @return Matricula[]
     */
    public function getMatriculas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Matriculas' );
    }

    /**
     * Obtem a quantidade de Matriculas do Usuario
     *
     * @return integer
     */
    public function getQtdMatriculas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Matriculas' );
    }

    /**
     *  Informa quais são os Matriculas do Usuario
     *
     * @param Matricula[] $arrMatriculas
     * @return Usuario
     */
    public function setMatriculas( array $arrMatriculas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrMatriculas , 'Matriculas' );
    }

    /**
     * Adiciona uma nova Matricula o Usuario
     *
     * @param Matricula $objMatricula
     * @return Usuario
     */
    public function addMatricula( Matricula $objMatricula , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objMatricula , $booUseCache , 'Matriculas' );
    }

    /**
     * Remove um Matricula do Usuario
     * @param Matricula $objMatricula
     * @return Usuario
     */
    public function removeMatricula( Matricula $objMatricula )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objMatricula , $booUseCache , 'Matriculas' );
    }
}
?>