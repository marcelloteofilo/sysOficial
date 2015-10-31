<?php

require_once ("/../banco.php");
require_once ("rastreamento.php");

class RastreamentoSql {
    /*
      //Método responsável em adicionar um determinado rastreamento
      public static function adicionar(Rastreamento $rastreamento) {

      //Criando a conexão com o banco de dados
      $conexao = Conexao::getInstance()->getConexao();

      //Atributos da classe Rastreamento sendo definidas em uma variável, obtidas em um método para realização da
      //obtenção do valor e logo em seguida, realizando a chamada do banco

      $rota = mysql_real_escape_string($rastreamento->getCodRota(), $conexao);
      $longitude = mysql_real_escape_string($rastreamento->getLongitude(), $conexao);
      $latitude = mysql_real_escape_string($rastreamento->getLatitude(), $conexao);
      $localizacao = mysql_real_escape_string($rastreamento->getLocalizacao(), $conexao);
      $data = mysql_real_escape_string($rastreamento->getData(), $conexao);

      //Inserção na tabela de Rastreamento relacionada ao banco de dados systransporte
      $sql = "insert into rastreamentos (codRota, longitude, latitude, localizacao, data)
      values ('$rota','$localizacao', '$latitude', '$longitude', '$localizacao', '$data')";
      $resultado = mysql_query($sql, $conexao);
      return ($resultado === true);
      }

     */
    /*
      //Método responsável em alterar um determinado rastreamento
      public static function alterar(Rastreamento $rastreamento) {
      //Criando a conexão com o banco de dados
      $conexao = Conexao::getInstance()->getConexao();

      //Atributos da classe Rastreamento sendo definidas em uma variável, obtidas em um método para realização da
      //obtenção do valor e logo em seguida, realizando a chamada do banco
      $id = mysql_real_escape_string($rastreamento->getId(), $conexao);
      $rota = mysql_real_escape_string($rastreamento->getCodRota(), $conexao);
      $longitude = mysql_real_escape_string($rastreamento->getLongitude(), $conexao);
      $latitude = mysql_real_escape_string($rastreamento->getLatitude(), $conexao);
      $localizacao = mysql_real_escape_string($rastreamento->getLocalizacao(), $conexao);
      $data = mysql_real_escape_string($rastreamento->getData(), $conexao);


      ///Alteração na tabela de Rastreamento relacionada ao banco de dados systransporte
      $sql = "update rastreamentos set localizacao='$localizacao' where id = $id ";
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
      }
     */
    /*
      //Método responsável em remover um determinado rastreamento
      public static function remover(Rastreamento $rastreamento) {
      //Criando a conexão com o banco de dados
      $conexao = Conexao::getInstance()->getConexao();

      //Atributo da classe Rastreamento sendo definida em uma variável, obtida em um método para realização da
      //obtenção do valor e logo em seguida, realizando a chamada do banco de dados
      $id = mysql_real_escape_string($rastreamento->getId(), $conexao);

      //Remoção na tabela de Rastreamento relacionada ao banco de dados systransporte
      $sql = "delete from rastreamentos where id = '$id' ";
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
      }
     */

    public static function carregarLista(/* Rastreamento $rastreamento */) {
        //Conexão com o banco
        $conexao = Conexao::getInstance()->getConexao();

        //$codRasteamento = mysql_real_escape_string($rastreamento->getId(), $conexao);

        $sql = 'select * from rastreamentos';

        $rs = mysql_query($sql, $conexao);

        if ($rs) {
            $resultado = array();
            while ($row = mysql_fetch_array($rs)) {

                $objRastremento = new Rastreamento();

                $objRastremento->setId($row["codRastreamento"]);
                $objRastremento->setCodRota($row["codRota"]);
                $objRastremento->setLongitude($row["longitude"]);
                $objRastremento->setLatitude($row["latitude"]);
                $objRastremento->setLocalizacao($row["localizacao"]);
                $objRastremento->setData($row["data"]);

                $resultado[] = $objRastremento;
            }
            return $resultado;
        } else {
            return null;
        }
//        echo '<pre>';
//        var_dump($resultado);
//        echo '</pre>';
    }

}

?>