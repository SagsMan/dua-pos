<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dua Fashion Public API
 * Read-only JSON endpoints for the frontend website.
 * No authentication required.
 */
class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
        header('Content-Type: application/json; charset=UTF-8');
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
        $this->load->database();
    }

    /** GET /api/products?category=&search=&limit=&offset= */
    public function products() {
        $category = $this->input->get('category');
        $search   = $this->input->get('search');
        $limit    = max(1, min(200, (int)($this->input->get('limit') ?: 100)));
        $offset   = max(0, (int)($this->input->get('offset') ?: 0));

        $this->db->select('a.id, a.item_code AS code, a.item_name AS name,
                           a.item_image AS image,
                           a.final_price AS price, a.sales_price,
                           a.stock,
                           b.category_name AS category,
                           e.brand_name AS brand');
        $this->db->from('db_items AS a');
        $this->db->join('db_category AS b', 'b.id = a.category_id', 'left');
        $this->db->join('db_brands AS e',   'e.id = a.brand_id',    'left');
        $this->db->where('a.status', 1);

        if (!empty($category)) {
            $this->db->where('b.category_name', $category);
        }
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('a.item_name', $search);
            $this->db->or_like('a.item_code', $search);
            $this->db->group_end();
        }

        $this->db->order_by('a.id', 'DESC');
        $this->db->limit($limit, $offset);

        $rows = $this->db->get()->result();
        $base = rtrim(base_url(), '/');

        $products = array_map(function($r) use ($base) {
            return [
                'id'          => (int)$r->id,
                'code'        => (string)$r->code,
                'name'        => (string)$r->name,
                'image'       => !empty($r->image) ? $base . '/' . ltrim($r->image, '/') : null,
                'price'       => (float)$r->price,
                'sales_price' => (float)$r->sales_price,
                'stock'       => (int)$r->stock,
                'category'    => $r->category ? (string)$r->category : null,
                'brand'       => $r->brand    ? (string)$r->brand    : null,
            ];
        }, $rows);

        echo json_encode(['success' => true, 'data' => $products], JSON_UNESCAPED_UNICODE);
    }

    /** GET /api/categories */
    public function categories() {
        $this->db->select('id, category_code AS code, category_name AS name, description');
        $this->db->from('db_category');
        $this->db->where('status', 1);
        $this->db->order_by('category_name', 'ASC');
        $rows = $this->db->get()->result();

        $categories = array_map(function($r) {
            return [
                'id'          => (int)$r->id,
                'code'        => (string)$r->code,
                'name'        => (string)$r->name,
                'description' => $r->description ? (string)$r->description : null,
            ];
        }, $rows);

        echo json_encode(['success' => true, 'data' => $categories], JSON_UNESCAPED_UNICODE);
    }

    /** GET /api/brands */
    public function brands() {
        $this->db->select('id, brand_name AS name');
        $this->db->from('db_brands');
        $this->db->order_by('brand_name', 'ASC');
        $rows = $this->db->get()->result();

        $brands = array_map(function($r) {
            return [
                'id'   => (int)$r->id,
                'name' => (string)$r->name,
            ];
        }, $rows);

        echo json_encode(['success' => true, 'data' => $brands], JSON_UNESCAPED_UNICODE);
    }
}
