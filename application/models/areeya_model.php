<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 2/8/2556 22:26 น..
 */ 
 class Areeya_model extends CI_Model {
     public function get_jungwat() {
         $rs = $this->db
             ->like('code_id', '000000', 'before')
             ->get('tb_mooban')
             ->result();

         return $rs;
     }

     public function get_amphur($id) {
         $rs = $this->db
             ->where('code_id LIKE "'.substr($id, 0, 2).'__0000"', null, false)
             ->where('NOT (code_id LIKE "'.substr($id, 0, 2).'000000")', null, false)
             ->get('tb_mooban')
             ->result();

         return $rs;
     }

     public function get_tumbon($id) {
         $rs = $this->db
             ->where('code_id LIKE "'.substr($id, 0, 4).'__00"', null, false)
             ->where('NOT (code_id LIKE "'.substr($id, 0, 4).'0000")', null, false)
             ->get('tb_mooban')
             ->result();

         return $rs;
     }

     public function auto_gen_id($table) {
         $rs = $this->db
             ->where('at_name', $table)
             ->limit(1)
             ->get('sys_auto_gen_serial')
             ->result();

         return $rs;
     }

     public function update_serial($table, $id) {
         $rs1 = $this->auto_gen_id($table);
         if($rs1) {
             $rs = $this->db
                 ->where('at_name', $table)
                 ->update('sys_auto_gen_serial', array(
                     'at_value'  => $id
                 ));
         } else {
             $rs = $this->db
                 ->insert('sys_auto_gen_serial', array(
                     'at_name'   => $table,
                     'at_value'  => $id
                 ));
         }
         return $rs;
     }
 }