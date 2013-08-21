<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 4/8/2556 20:02 น..
 */ 
class Project_model extends CI_Model {
    public function get_list() {
        $rs = $this->db
            ->select(array('pro.*','prs.prs_name'))
            ->join('tb_project_status prs', 'pro.prs_id=prs.prs_id', 'left')
            ->order_by('pro.pro_id', 'desc')
            ->get('tb_project pro')
            ->result();

        return $rs;
    }

    public function get_project_status() {
        $rs = $this->db
            ->get('tb_project_status')
            ->result();

        return $rs;
    }

    public function get_project_type() {
        $rs = $this->db
            ->get('tb_project_type')
            ->result();

        return $rs;
    }

    public function get_group_list() {
        $rs = $this->db
            ->get('tb_project_group')
            ->result();

        return $rs;
    }

    public function set_project_group($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_project_group', array(
                    'prg_id'        => $d['id'],
                    'prg_name'      => $d['name'],
                    'prg_code'      => $d['short'],
                    'prg_detail'    => $d['detail']
                ));
        } else {
            $rs = $this->db
                ->where('prg_id', $d['id'])
                ->update('tb_project_group', array(
                    'prg_name'      => $d['name'],
                    'prg_code'      => $d['short'],
                    'prg_detail'    => $d['detail']
                ));
        }
        return $rs;
    }

    public function get_group_detail($id) {
        $rs = $this->db
            ->where('prg_id', $id)
            ->get('tb_project_group')
            ->result();
        return $rs;
    }

    public function set_group_remove($id) {
        $rs = $this->db
            ->where('prg_id', $id)
            ->delete('tb_project_group');
        return $rs;
    }

    public function get_project_code($id) {
        $rs = $this->db
            ->where('prg_id', $id)
            ->limit(1)
            ->get('tb_project_group')
            ->row();

        if($rs)
            return $rs->prg_code;
        else
            return null;
    }

    public function set_project($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db->insert('tb_project', array(
                'pro_id'        => $d['id'],
                'pro_name'      => $d['name'],
                'prt_id'        => $d['prt'],
                'prs_id'        => $d['prs'],
                'pro_local'     => $d['local'],
                'pro_jungwat'   => $d['jungwat'],
                'pro_price'     => $d['price'],
                'pro_vat'       => $d['vat'],
                'pro_begin'     => $d['begin'],
                'pro_finish'    => $d['finish'],
                'pro_days'      => $d['days'],
                'pro_cmt'       => $d['cmt'],
                'com_id'        => $d['compeny'],
                'prg_id'        => $d['group']
            ));
        } else {
            $rs = $this->db
                ->where('pro_id', $d['id'])
                ->update('tb_project', array(
                'pro_name'      => $d['name'],
                'prt_id'        => $d['prt'],
                'prs_id'        => $d['prs'],
                'pro_local'     => $d['local'],
                'pro_jungwat'   => $d['jungwat'],
                'pro_price'     => $d['price'],
                'pro_vat'       => $d['vat'],
                'pro_begin'     => $d['begin'],
                'pro_finish'    => $d['finish'],
                'pro_days'      => $d['days'],
                'pro_cmt'       => $d['cmt'],
                'com_id'        => $d['compeny'],
                'prg_id'        => $d['group']
            ));
        }
        return $rs;
    }

    public function get_project_detail($id) {
        $rs = $this->db
            ->where('pro_id', $id)
            ->get('tb_project')
            ->result();

        return $rs;
    }
}