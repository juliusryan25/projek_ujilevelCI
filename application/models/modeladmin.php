<?php
Class modeladmin extends CI_Model{

     ///Login///
     public function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    public function update_login($log_stat,$usernames){
        $this->db->set('status_login',$log_stat);
        $this->db->where('username',$usernames);
        $this->db->update('tb_user');
    }

    ////USER////
    public function simpan_user(){
        $config['upload_path'] = './assets/image';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file_name'] = url_title($this->input->post('gambar'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = $this->upload->data();

        $id = $this->input->post('id');
        $data = array(
            
            'id_user' => "$id",
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_user' => $this->input->post('nama'),
            'id_level' => $this->input->post('level'),
            'image' => $data['file_name']
        );

        $this->db->insert('tb_user', $data);
        header("Location:".base_url().'admin/indexadmin/cruduser');
    }

        public function get_user(){
            $data = $this->db->get('tb_user');
            return $data->result();
        }

        public function count_user(){
            $data = $this->db->get('tb_user');
            return $data->num_rows();
        }

        public function delete_user_db($id){
            $this->db->delete('tb_user',array('id_user'=> $id));   
        }

        public function get_db_level(){
			$data = $this->db->get("tb_level");
			return $data->result();
		}

        public function get_data_edit_user($id){
            $data = $this->db->query("SELECT * FROM tb_user where id_user='$id'");
            return $data->result();
        }
    
        public function edit_user_db(){
    
        $config['upload_path'] = './assets/image';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file_name'] = url_title($this->input->post('gambar'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = $this->upload->data();

        $id = $this->input->post('id_user');
        $data = array(
            
            'id_user' => "$id",
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_user' => $this->input->post('nama_user'),
            'id_level' => $this->input->post('id_level'),
            'image' => $data['file_name']
        );
    
            $this->db->where('id_user',$id);
            $this->db->update('tb_user',$data);
            header("Location:".base_url().'admin/indexadmin/cruduser');
    
        }

          ////MENU////
    public function simpan_menu(){
        $config['upload_path'] = './assets/image_menu';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file_name'] = url_title($this->input->post('gambar'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = $this->upload->data();

        $id = $this->input->post('id');
        $data = array(
            
            'id_menu' => "$id",
            'nama_menu' => $this->input->post('nama_menu'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'status_menu' => $this->input->post('status_menu'),
            'image' => $data['file_name']
        );

        $this->db->insert('tb_menu', $data);
        header("Location:".base_url().'admin/indexadmin/crudmenu');
    }

        public function get_menu(){
            $data = $this->db->get('tb_menu');
            return $data->result();
        }

        public function count_menu(){
            $data = $this->db->get('tb_menu');
            return $data->num_rows();
        }

        public function delete_menu_db($id){
            $this->db->delete('tb_menu',array('id_menu'=> $id));   
        }


        public function get_data_edit_menu($id){
            $data = $this->db->query("SELECT * FROM tb_menu where id_menu='$id'");
            return $data->result();
        }
    
        public function edit_menu_db(){
            $config['upload_path'] = './assets/image_menu';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '2048000';
            $config['file_name'] = url_title($this->input->post('gambar'));
            $filename = $this->upload->file_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
    
            $id = $this->input->post('id_menu');
            $data = array(
                
                'id_menu' => "$id",
                'nama_menu' => $this->input->post('nama_menu'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'status_menu' => $this->input->post('status_menu'),
                'image' => $data['file_name']
            );
    
            $this->db->where('id_menu',$id);
            $this->db->update('tb_menu',$data);
            header("Location:".base_url().'admin/indexadmin/crudmenu');
    
        }
        ////menu waiter////
        public function edit_menu_waiter_db(){
            $config['upload_path'] = './assets/image_menu';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '2048000';
            $config['file_name'] = url_title($this->input->post('gambar'));
            $filename = $this->upload->file_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
    
            $id = $this->input->post('id_menu');
            $data = array(
                
                'id_menu' => "$id",
                'nama_menu' => $this->input->post('nama_menu'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'status_menu' => $this->input->post('status_menu'),
                'image' => $data['file_name']
            );
    
            $this->db->where('id_menu',$id);
            $this->db->update('tb_menu',$data);
            header("Location:".base_url().'waiter/indexwaiter/crudmenu');
    
        }
        public function simpan_menu_waiter(){
            $config['upload_path'] = './assets/image_menu';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '2048000';
            $config['file_name'] = url_title($this->input->post('gambar'));
            $filename = $this->upload->file_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
    
            $id = $this->input->post('id');
            $data = array(
                
                'id_menu' => "$id",
                'nama_menu' => $this->input->post('nama_menu'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'status_menu' => $this->input->post('status_menu'),
                'image' => $data['file_name']
            );
    
            $this->db->insert('tb_menu', $data);
            header("Location:".base_url().'waiter/indexwaiter/crudmenu');
        }

        ////ORDER////
        public function order_db(){       
            $id_menu = $this->input->post('id_menu');
            $data = array(
                'id_order' => "",               
                'tanggal_order' => $this->input->post('tanggal'),
                'id_user' => $this->input->post('id_user'),
                'keterangan' => $this->input->post('keterangan'),
                'status_order' => $this->input->post('status_order'),
                'kategori' => $this->input->post('kategori'),
                'id_menu' => "$id_menu",
                'jumlah' => $this->input->post('jumlah'),
                'total_harga' => $this->input->post('total_harga'),
            );
    
            $this->db->insert('tb_order', $data);
            header("Location:".base_url().'waiter/indexwaiter/crudorder');
        }
        public function get_data_order_menu($id){
            $data = $this->db->query("SELECT * FROM tb_menu where id_menu='$id'");
            return $data->result();
        }

        public function count_order(){
            $data = $this->db->get('tb_order');
            return $data->num_rows();
        }
        public function get_data_order_print($id){
            $data = $this->db->query("SELECT * FROM tb_order where id_order='$id'");
            return $data->result();
        }

         //transaksi////
         public function transaksi_db(){       
            $id_order = $this->input->post('id_order');
            $id_user = $this->input->post('id_user');
            $data = array(
                'id_transaksi' => "",               
                'id_user' => "$id_user",        
                'id_order' => "$id_order",
                'tanggal' => $this->input->post('tanggal'),
                'total_bayar' => $this->input->post('bayar'),
                'kembalian' => $this->input->post('kembalian'),
            );
    
            $this->db->insert('tb_transaksi', $data);
            header("Location:".base_url().'kasir/indexkasir/crudtransaksi');
        }
       
        public function get_transaksi(){
            $data = $this->db->query("SELECT * FROM tb_order where status_order ='Diproses'");
            return $data->result();
        }

        public function count_transaksi(){
            $data = $this->db->query("SELECT * FROM tb_order where status_order ='Diproses'");
            return $data->num_rows();
        }
        public function get_data_transaksi($id){
            $data = $this->db->query("SELECT * FROM tb_order where id_order='$id'");
            return $data->result();
        }
        public function get_history(){
            $data = $this->db->get('tb_transaksi');
            return $data->result();
        }

        public function count_history(){
            $data = $this->db->get('tb_transaksi');
            return $data->num_rows();
        }
        public function get_data_print($id){
            $data = $this->db->query("SELECT * FROM tb_transaksi where id_transaksi='$id'");
            return $data->result();
        }

        //waiter//
        public function get_transaksi_waiter(){
            $data = $this->db->get('tb_order');
            return $data->result();
        }

        public function count_transaksi_waiter(){
            $data = $this->db->get('tb_order');
            return $data->num_rows();
        }


        ////Owner////
        public function get_totalorder(){
            $data = $this->db->query("SELECT * FROM tb_order WHERE tanggal_order=DATE(NOW())");
            return $data->num_rows();
        }
        public function get_transaksi_harian(){
            $data = $this->db->query("SELECT* FROM tb_transaksi WHERE tanggal=DATE(NOW())");
            return $data->num_rows();
        }
        public function count_transaksi_owner(){
            $data = $this->db->query("SELECT * FROM tb_transaksi WHERE tanggal=DATE(NOW())");
            return $data->num_rows();
        }
        public function get_transaksi_owner(){
            $data = $this->db->query("SELECT * FROM tb_transaksi WHERE tanggal=DATE(NOW())");
            return $data->result();
        }
        public function count_order_owner(){
            $data = $this->db->query("SELECT * FROM tb_order WHERE tanggal_order=DATE(NOW())");
            return $data->num_rows();
        }
        public function get_order_owner(){
            $data = $this->db->query("SELECT * FROM tb_order WHERE tanggal_order=DATE(NOW())");
            return $data->result();
        }
}

?>
