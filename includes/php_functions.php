<?php
    function redirect($loc) {
        header("Location: {$loc}");
    }

    function generate_token() {
        return md5(microtime().mt_rand());
    }

    function count_field_val($pdo, $tbl, $fld, $val) {
         try {
              $sql="SELECT {$fld} FROM {$tbl} WHERE {$fld}=:value";
              $stmnt=$pdo->prepare($sql);
              $stmnt->execute([':value'=>$val]);
              return $stmnt->rowCount();
         } catch(PDOException $e) {
              return $e->getMessage();
         }
    }

?>