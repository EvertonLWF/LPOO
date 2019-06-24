<?php

include_once "../model/Marca.php";

include_once "ConnectPDO.php";

/**
 * Description of MarcaPDO
 *
 * @author feijo
 */
class MarcaPDO extends ConnectPDO {

    private $conn;

    function __construct() {
        $this->conn = parent::getConnect();
    }

    function findAll() {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE situacao = true");
            if ($stmt->execute()) {
                $marcas = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($marcas, $this->resultSetToMarcas($rs));
                }
                return $marcas;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString() + ' Erro findAll Marca!!!';
        }
        return $marcas;
    }

    function findAllR() {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE situacao = false");
            if ($stmt->execute()) {
                $marcas = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($marcas, $this->resultSetToMarcas($rs));
                }
                return $marcas;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString() + ' Erro findAllR Marca!!!';
        }
        return $marcas;
    }

    function findByMarca($marca) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE descmarca = initcap(?) AND situacao = true");
            $stmt->bindValue(1, $marca);
            if ($stmt->execute()) {
                $marcas = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($marcas, $this->resultSetToMarcas($rs));
                }
                return $marcas;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString() + 'Erro findByMarca !!!';
            return null;
        }
    }
    function findMarcaById($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE id_marca = ? AND situacao = true");
            $stmt->bindValue(1, $id);
            if ($stmt->execute()) {
                $marcas = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($marcas, $this->resultSetToMarcas($rs));
                }
                return $marcas;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString() + 'Erro findByMarca !!!';
            return null;
        }
    }
    function findByMarcaR($marca) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE descmarca = initcap(?) AND situacao = false");
            $stmt->bindValue(1, $marca);
            if ($stmt->execute()) {
                $marcas = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($marcas, $this->resultSetToMarcas($rs));
                }
                return $marcas;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString() + 'Erro findByMarcaR !!!';
            return null;
        }
    }

    function findByModelos($id_marca) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE id_marca = ? AND situacao = true");
            $stmt->bindValue(1, $id_marca);
            if ($stmt->execute()) {
                $modelos = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($modelos, $this->resultSetToModelos($rs));
                }
                return $modelos;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString() + 'Erro findByModelos em Marca !!!';
            return null;
        }
    }
    function findByModeloR($id_marca) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE id_marca = ? AND situacao = false");
            $stmt->bindValue(1, $id_marca);
            if ($stmt->execute()) {
                $modelos = Array();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    array_push($modelos, $this->resultSetToModelos($rs));
                }
                return $modelos;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString() + 'Erro findByModelosR em Marca !!!';
            return null;
        }
    }

    function update(Marca $marca) {
        $stmt = $this->conn->prepare('UPDATE marca SET descmarca = initcap(?) WHERE id_marca = ?');
        $stmt->bindValue(1, $marca->getMarca());
        $stmt->bindValue(2, $marca->getId());

        return $stmt->execute();
    }

    function insert($marca) {
        $stmt = $this->conn->prepare('INSERT INTO marca (descmarca,situacao) VALUES(initcap(?),?)');
        $stmt->bindValue(1, $marca->getMarca());
        $stmt->bindValue(2, $marca->getSituacao());


        return $stmt->execute();
    }

    function deleteSoft($descricao) {
        $stmt = $this->conn->prepare('UPDATE marca SET situacao = ? WHERE descmarca = initcap(?)');
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $descricao);

        return $stmt->execute();
    }

    function reactivateMarca($descricao) {
        $stmt = $this->conn->prepare('UPDATE marca SET situacao = ? WHERE id_marca = ?');
        $stmt->bindValue(1, true);
        $stmt->bindValue(2, $descricao);

        return $stmt->execute();
    }

    private function resultSetToMarcas($rs) {
        $marca = new Marca();
        $marca->setMarca($rs->descmarca);
        $marca->setId($rs->id_marca);
        $marca->setSituacao($rs->situacao);
        return $marca;
    }

    private function resultSetToModelos($rs) {
        $modelo = new Modelo($rs->id_marca);
        $modelo->setDescricao($rs->descmodelo);
        $modelo->setSituacao($rs->situacao);

        return $modelo;
    }

}
