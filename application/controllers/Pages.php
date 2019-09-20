<?php 
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH . 'views/pages/'. $page . '.php')){
                show_404();
                // echo "this works";
            }

            $data['products'] = $this->product_model->get_preporucujemo();

            $naslov['title'] = 'Protechnology Electronics';
            $this->load->view('templates/header', $naslov);
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/menu');
            $this->load->view('templates/recomended');
            $this->load->view('templates/about');
            $this->load->view('templates/footer');
        }
    }