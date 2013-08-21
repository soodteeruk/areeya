<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 16/8/2556 22:24 น..
 */ 
class Position_model extends CI_Model {
    public function get_list() {
        $rs = $this->db
            ->get('tb_position')
            ->result();

        return $rs;
    }

    public function set_depart($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_position', array(
                    'pos_name'  => $d['name']
                ));
        } else {
            $rs = $this->db
                ->where('pos_id', $d['id'])
                ->update('tb_position', array(
                    'pos_name'  => $d['name']
                ));
        }

        return $rs;
    }

    public function get_depart($id) {
        $rs = $this->db
            ->where('pos_id', $id)
            ->get('tb_position')
            ->result();
        return $rs;
    }

    public function set_remove($id) {
        $rs = $this->db
            ->where('pos_id', $id)
            ->delete('tb_position');
        return $rs;
    }
}