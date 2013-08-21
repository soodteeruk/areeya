<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 15/8/2556 20:30 น..
 */ 
class Depart_model extends CI_Model {

    public function get_list() {
        $rs = $this->db
            ->get('tb_department')
            ->result();

        return $rs;
    }

    public function set_depart($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_department', array(
                    'dep_name'  => $d['name']
                ));
        } else {
            $rs = $this->db
                ->where('dep_id', $d['id'])
                ->update('tb_department', array(
                    'dep_name'  => $d['name']
                ));
        }

        return $rs;
    }

    public function get_depart($id) {
        $rs = $this->db
            ->where('dep_id', $id)
            ->get('tb_department')
            ->result();
        return $rs;
    }

    public function set_remove($id) {
        $rs = $this->db
            ->where('dep_id', $id)
            ->delete('tb_department');
        return $rs;
    }
}