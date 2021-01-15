<?php
class Model_kategori extends CI_Model
{
	public function getAllkategori($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*");
		$this->db->from("ref_kategori a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.nm_kategori  LIKE '%".$cari."%' ) ");
		$this->db->where("a.active IN (0, 1) ");

		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_kategori($search = null)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_kategori) as recordsFiltered ");
		$this->db->from("ref_kategori");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$this->db->like("nm_kategori ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_kategori) as recordsTotal ");
		$this->db->from("ref_kategori");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllkategori_detail($show=null, $start=null, $cari=null, $id_kategori)
	{
		$this->db->select("a.*");
		$this->db->from("ref_kategori_sub a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_kategori', $id_kategori);
		$this->db->where("(a.nm_kategori_sub  LIKE '%".$cari."%') ");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->order_by("a.id_kategori_sub","ASC");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_kategori_detail($cari = null, $id_kategori)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_kategori_sub) as recordsFiltered ");
		$this->db->from("ref_kategori_sub a");
		$this->db->where('a.id_kategori', $id_kategori);
		$this->db->where("(a.nm_kategori_sub  LIKE '%".$cari."%') ");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_kategori_sub) as recordsTotal ");
		$this->db->from("ref_kategori_sub a");
		$this->db->where('a.id_kategori', $id_kategori);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_kategori($data)
	{
		$this->db->insert('ref_kategori', $data);
		return $this->db->insert_id();
	}

	public function insert_kategori_detail($data)
	{
		$this->db->insert('ref_kategori_sub', $data);
		return $this->db->insert_id();
	}

	public function delete_kategori($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('ref_kategori', array('active' => '2'));
		return $data['id_kategori'];
	}

	public function delete_kategori_detail($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_kategori_sub', $data['id_kategori_sub']);
		$this->db->delete('ref_kategori_sub');
		return $data['id_kategori_sub'];
	}

	public function update_kategori($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_kategori', $data);
		return $data['id_kategori'];
	}

	public function update_kategori_detail($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_kategori_sub', $data['id_kategori_sub']);
		$this->db->update('ref_kategori_sub', $data);
		return $data['id_kategori_sub'];
	}

	public function get_kategori_by_id($id_kategori)
	{
		if(empty($id_kategori))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_kategori a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_kategori', $id_kategori);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}

	public function get_kategori_by_id_detail($id_kategori_sub)
	{
		if(empty($id_kategori_sub))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->select("a.*");
			$this->db->from("ref_kategori_sub a");
			$this->db->where('a.id_kategori_sub', $id_kategori_sub);
			return $this->db->get()->row_array();
		}
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
