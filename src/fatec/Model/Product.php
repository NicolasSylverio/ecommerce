<?php

namespace Fatec\Model;

use \Fatec\DB\Sql;
use \Fatec\Model;
use \Fatec\Mailer;

    class Product extends Model{

        public static function listAll()
        {
            $sql = new Sql();

            return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");
        }

        public function save()
        {
            $sql = new Sql();

            $result = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllenght, :vlweight, :desurl)", array(
                    ":idproduct"=>$this->getidproduct(),
                    ":desproduct"=>$this->getdesproduct(),
                    ":vlprice"=>$this->getvlprice(),
                    ":vlwidth"=>$this->getvlwidth(),
                    ":vlheight"=>$this->getvlheight(),
                    ":vllenght"=>$this->getvllenght(),
                    ":vlweight"=>$this->getvlweight(),
                    ":desurl"=>$this->getdesurl()
                ));

            $this->setData($result[0]);
        }

        public function get($idproduct)
        {
            $sql = new Sql();

            $result = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", [
                ":idproduct"=>$idproduct
            ]);

            $this->setData($result[0]);
        }

        public function delete()
        {
            $sql = new Sql();

            $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", [
                ":idproduct"=>$this->getidproduct()
            ]);

        }
    }
?>