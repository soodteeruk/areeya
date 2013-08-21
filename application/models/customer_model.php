<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 13:22 น..
 */ 
class Customer_model extends CI_Model {
    public function get_list($id) {
        $rs = $this->db
            ->where('cus_id', $id)
            ->get('tb_customer')
            ->result();

        return $rs;
    }

    public function set_customer($d) {
        if($this->get_list($d['id'])) {
            $rs = $this->db
                ->where('cus_id', $d['id'])
                ->update('tb_customer', array(
                    'cus_name'      => $d['name'],
                    'cus_addr'      => $d['addr'],
                    'cus_tumbon'    => $d['tumbon'],
                    'cus_amphur'    => $d['amphur'],
                    'cus_jungwat'   => $d['jungwat'],
                    'cus_post'      => $d['post'],
                    'cus_phone'     => $d['phone'],
                    'cus_fax'       => $d['fax'],
                    'cus_email'     => $d['email'],
                    'cus_contact'   => $d['contact']
                ));
        } else {
            $rs = $this->db
                ->insert('tb_customer', array(
                    'cus_id'        => $d['id'],
                    'cus_name'      => $d['name'],
                    'cus_addr'      => $d['addr'],
                    'cus_tumbon'    => $d['tumbon'],
                    'cus_amphur'    => $d['amphur'],
                    'cus_jungwat'   => $d['jungwat'],
                    'cus_post'      => $d['post'],
                    'cus_phone'     => $d['phone'],
                    'cus_fax'       => $d['fax'],
                    'cus_email'     => $d['email'],
                    'cus_contact'   => $d['contact']
                ));
        }
        return $rs;
    }
}