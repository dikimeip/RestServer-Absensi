<?php 

/**
 * 
 */
class ModelMaster extends CI_Model
{
	
	public function get_user($id=null)
	{
		if ($id == null) {
			$this->db->select("*");
			$this->db->from("User");
			$this->db->order_by("idUser","DESC");
			return $this->db->get()->result_array();

		} else {
			$this->db->select("*");
			$this->db->from("User");
			$this->db->where("idUser",$id);
			$this->db->order_by("idUser","DESC");
			return $this->db->get()->result_array();
		}
	}

	public function post_user($data)
	{
		$this->db->insert('User',$data);
		return $this->db->affected_rows() ;
	}

	public function put_user($id,$data)
	{
		$this->db->update("User",$data,['idUser' => $id]);
		return $this->db->affected_rows();
	}

	public function delete_user($id)
	{
		$this->db->delete('User',['idUser' => $id]);
		return $this->db->affected_rows();
	}


	public function get_absen($id = null)
	{
		if ($id == null) {
			$this->db->select("*");
			$this->db->from("absensi");
			$this->db->order_by("idAbsen","DESC");
			return $this->db->get()->result_array();

		} else {
			$this->db->select("*");
			$this->db->from("absensi");
			$this->db->where("idAbsen",$id);
			$this->db->order_by("idAbsen","DESC");
			return $this->db->get()->result_array();
		}
	}

	public function post_absen($data)
	{
		$this->db->insert('absensi',$data);
		return $this->db->affected_rows();
	}

	public function put_absen($id,$data)
	{
		$this->db->update('absensi',$data,['idAbsen' => $id]);
		return $this->db->affected_rows(); 
	}

	public function delete_absen($id)
	{
		$this->db->delete('absensi',['idAbsen' => $id]);
		return $this->db->affected_rows();
	}

	public function get_izin($id = null)
	{
		if ($id == null) {
			$this->db->select("*");
			$this->db->from("izin");
			$this->db->order_by("idIzin","DESC");
			return $this->db->get()->result_array();

		} else {
			$this->db->select("*");
			$this->db->from("izin");
			$this->db->where("idIzin",$id);
			$this->db->order_by("idIzin","DESC");
			return $this->db->get()->result_array();
		}
	}

	public function post_izin($data)
	{
		$this->db->insert('izin',$data);
		return $this->db->affected_rows();
	}

	public function put_izin($id,$data)
	{
		$this->db->update('izin',$data,['idIzin' => $id]);
		return $this->db->affected_rows();
	}

	public function delete_izin($id)
	{
		$this->db->delete('izin',['idIzin' => $id]);
		return $this->db->affected_rows(); 
	}

	public function get_gaji($id = null)
	{
		if ($id == null) {
			$this->db->select("*");
			$this->db->from("gaji");
			$this->db->order_by("idGaji","DESC");
			return $this->db->get()->result_array();

		} else {
			$this->db->select("*");
			$this->db->from("gaji");
			$this->db->where("idGaji",$id);
			$this->db->order_by("idGaji","DESC");
			return $this->db->get()->result_array();
		}
	}

	public function post_gaji($data)
	{
		$this->db->insert('gaji',$data);
		return $this->db->affected_rows(); 
	}


	public function put_gaji($id,$data)
	{
		$this->db->update('gaji',$data,['idGaji' => $id]);
		return $this->db->affected_rows();
	}

	public function delete_Gaji($id)
	{
		$this->db->delete('gaji',['idGaji' => $id]);
		return $this->db->affected_rows();
	}

	public function get_admin($id = null)
	{
		if ($id == null) {
			$this->db->select("*");
			$this->db->from("admin");
			$this->db->order_by("idAdmin","DESC");
			return $this->db->get()->result_array();

		} else {
			$this->db->select("*");
			$this->db->from("admin");
			$this->db->where("idAdmin",$id);
			$this->db->order_by("idAdmin","DESC");
			return $this->db->get()->result_array();
		}
	}

	public function post_admin($data)
	{
		$this->db->insert('admin',$data);
		return $this->db->affected_rows();
	}

	public function put_admin($id,$data)
	{
		$this->db->update('admin',$data,['idAdmin' => $id]);
		return $this->db->affected_rows();
	}

	public function delete_admin($id)
	{
		$this->db->delete('admin',['idAdmin' => $id]);
		return $this->db->affected_rows();
	}
}


