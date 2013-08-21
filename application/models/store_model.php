<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 23:37 น..
 */ 
class Store_model extends CI_Model {
    public $com_id;

    public function get_list() {
        $rs = $this->db
            ->where('com_id', $this->com_id)
            ->get('tb_store')
            ->result();

        return $rs;
    }

    public function set_store($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_store', array(
                    'str_name'  => $d['name'],
                    'str_addr'  => $d['addr'],
                    'com_id'    => $this->com_id
                ));
        } else {
            $rs = $this->db
                ->where('str_id', $d['id'])
                ->update('tb_store', array(
                    'str_name'  => $d['name'],
                    'str_addr'  => $d['addr']
                ));
        }
        return $rs;
    }

    public function get_store_detail($id) {
        $rs = $this->db
            ->where('str_id', $id)
            ->get('tb_store')
            ->result();
        return $rs;
    }

    public function set_store_remove($id) {
        $rs = $this->db
            ->where('str_id', $id)
            ->delete('tb_store');
        return $rs;
    }
}