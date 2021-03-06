<?php
class Model_supplier extends CI_Model
{
	public function getAllsupplier($show=null, $start=null, $cari=null,$id_bu,$id_supplier_kategori)
	{
		$this->db->select("a.*,b.nm_supplier_kategori");
		$this->db->from("ref_supplier a");
		$this->db->join("ref_supplier_kategori b","a.id_supplier_kategori = b.id_supplier_kategori");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.nm_supplier  LIKE '%".$cari."%' ) ");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where('a.id_bu', $id_bu);
		if($id_supplier_kategori!=0){
			$this->db->where('a.id_supplier_kategori', $id_supplier_kategori);
		}

		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_supplier($search = null,$id_bu,$id_supplier_kategori)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_supplier) as recordsFiltered ");
		$this->db->from("ref_supplier");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$this->db->where('id_bu', $id_bu);
		if($id_supplier_kategori!=0){
			$this->db->where('id_supplier_kategori', $id_supplier_kategori);
		}
		$this->db->like("nm_supplier ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_supplier) as recordsTotal ");
		$this->db->from("ref_supplier");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$this->db->where('id_bu', $id_bu);
		if($id_supplier_kategori!=0){
			$this->db->where('id_supplier_kategori', $id_supplier_kategori);
		}
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_supplier($data)
	{
		$this->db->insert('ref_supplier', $data);
		return $this->db->insert_id();
	}

	public function delete_supplier($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_supplier', $data['id_supplier']);
		$this->db->delete('ref_supplier');
		return $data['id_supplier'];
	}

	public function update_supplier($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_supplier', $data['id_supplier']);
		$this->db->update('ref_supplier', $data);
		return $data['id_supplier'];
	}

	public function get_supplier_by_id($id_supplier)
	{
		if(empty($id_supplier))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_supplier a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_supplier', $id_supplier);
			return $this->db->get()->row_array();
		}
	}
	
	public function combobox_kategori()
	{
		$this->db->from("ref_supplier_kategori");
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('active', 1);
		return $this->db->get();
	}

	public function combobox_bu()
{
    $session = $this->session->userdata('login');
    $this->db->from("ref_bu_access b");
    $this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
    $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
    $this->db->where('b.id_user', $session['id_user']);
    $this->db->where('b.active', 1);

    return $this->db->get();
}

}
