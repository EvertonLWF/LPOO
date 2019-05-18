<?php



/**
 * Description of ClientePDO
 *
 * @author feijo
 */
class ClientePDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE situacao = true");
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetProduto($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findAll cliente!!!!!';
            return null;
        }

        
    }
    function findByClient(Cliente $clientes){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE descricao like ?");
            $stmt->bindValue(1, $clientes->getNome_cli()+'%');
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetProduto($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findByClient!!!!!';
            return null;
        }

        
    }
    function update( $clientes){
        
        $stmt = $this->conn->prepare('UPDATE clientes SET cpf_cli = ?, nome_cli = ?, end_cli = ?, tel_cli = ?, email_cli = ?, situacao = ?');
        $stmt->bindValue(1, $clientes->getCpf_cli());
        $stmt->bindValue(2, $clientes->getNome_cli());
        $stmt->bindValue(3, $clientes->getEnd_cli());
        $stmt->bindValue(4, $clientes->getTel_cli());
        $stmt->bindValue(5, $clientes->getEmail_cli());
        $stmt->bindValue(6, $clientes->getSituacao());
        
      
        return $stmt->execute();
    }
    function insert( $clientes){
        $stmt = $this->conn->prepare('INSERT INTO clientes (cpf_cli,nome_cli,end_cli,tel_cli,email_cli,situacao) VALUES(?,?,?,?,?,?)');
        $stmt->bindValue(1, $clientes->getCpf_cli());
        $stmt->bindValue(2, $clientes->getNome_cli());
        $stmt->bindValue(3, $clientes->getEnd_cli());
        $stmt->bindValue(4, $clientes->getTel_cli());
        $stmt->bindValue(5, $clientes->getEmail_cli());
        $stmt->bindValue(6, $clientes->getSituacao_cli());
        
        return $stmt->execute();
        
    }
    function deleteSoft($clientes){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE cpf_cli = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2, $modelo->getCpf_cli());
        return $stmt->execute();
    }
}
