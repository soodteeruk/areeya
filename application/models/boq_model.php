<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 18:29 น.
 */
class Boq_model extends CI_Model {

    public function get_boq_group() {
        $rs = $this->db
            ->get('tb_boq_group')
            ->result();

        return $rs;
    }

    public function set_boq_group($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_boq_group', array(
                    'bgp_id'    => $d['id'],
                    'bgp_name'  => $d['name']
                ));
        } else {
            $rs = $this->db
                ->where('bgp_id', $d['id'])
                ->update('tb_boq_group', array(
                    'bgp_name'  => $d['name']
                ));
        }

        return $rs;
    }

    public function get_edit_group($id) {
        $rs = $this->db
            ->where('bgp_id', $id)
            ->get('tb_boq_group')
            ->result();

        return $rs;
    }

    public function set_remove_group($id) {
        $rs = $this->db
            ->where('bgp_id', $id)
            ->delete('tb_boq_group');

        return $rs;
    }
}