<?php

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_products($slug = false)
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        if ($slug === false) {
            $this->db->order_by('product.id', 'DESC');
            $this->db->join('categories', 'categories.id = product.categories_id');
            $query = $this->db->get('product');
            return $query->result_array();
        }
        $query = $this->db->get_where('product', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_preporucujemo($slug = false)
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        if ($slug === false) {
            $this->db->order_by('product.id', 'DESC');
            $this->db->where('preporucujemo', true);
            $this->db->join('categories', 'categories.id = product.categories_id');
            $query = $this->db->get('product');
            return $query->result_array();
        }
        $query = $this->db->get_where('product', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_product_by_category($category_id)
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        // if(isset($category_id)){
        $this->db->order_by('product.id', 'DESC');
        $this->db->where('categories_id', $category_id);
        $this->db->join('categories', 'categories.id = product.categories_id');
        $query = $this->db->get('product');
        return $query->result_array();
        // }
        // $query = $this->db->get_where('product', array('categories_id'=>$category_id));
        // return $query->row_array();
    }

    public function get_product_by_subcategory($subcategory)
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        $this->db->order_by('product.id', 'DESC');
        $this->db->where('subcategory', $subcategory);
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function create_product($product_image)
    {      
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        $slug = url_title($this->input->post('title'));
        str_replace(array("č", "ć", "đ", "ž", "š",), array("c", "c", "dj", "z", "s",), $slug);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'categories_id' => $this->input->post('category_id'),
            'proizvodjac' => $this->input->post('proizvodjac'),
            'karakteristike' => $this->input->post('karakteristike'),
            'opis' => $this->input->post('opis'),
            'subcategory' => $this->input->post('podkategorija'),
            'url' => $this->input->post('url'),
            'product_image' => $product_image,
            'preporucujemo' => !empty($this->input->post('preporucujemo')) ? 1 : 0,
        );
        return $this->db->insert('product', $data);
    }

    public function delete_product($id)
    {
        $this->db->query("SET sql_mode = ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        $this->db->where('id', $id);
        $this->db->delete('product');
        return true;
    }

    public function update_product($product_image)
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        $slug = url_title($this->input->post('title'));
        $slug = str_replace(array("č", "ć", "đ", "ž", "š",), array("c", "c", "dj", "z", "s",), $slug);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'categories_id' => $this->input->post('category_id'),
            'proizvodjac' => $this->input->post('proizvodjac'),
            'karakteristike' => $this->input->post('karakteristike'),
            'opis' => $this->input->post('opis'),
            'product_image' => $product_image,
            'subcategory' => $this->input->post('podkategorija'),
            'url' => $this->input->post('url'),
            'preporucujemo' => !empty($this->input->post('preporucujemo')) ? 1 : 0,
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('product', $data);
    }

    public function get_categories()
    {
        $this->db->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

}
