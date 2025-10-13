<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 * 
 * Automatically generated via CLI.
 */
class UsersModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_id($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function get_user_by_username($username)
    {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get();
    }

    public function update_password($user_id, $new_password) {
        return $this->db->table($this->table)
                        ->where('id', $user_id)
                        ->update([
                            'password' => password_hash($new_password, PASSWORD_DEFAULT)
                        ]);
    }

    public function get_all_users()
    {
        return $this->db->table($this->table)->get_all();
    }

    public function get_logged_in_user()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user']['id'])) {
            return $this->get_user_by_id($_SESSION['user']['id']);
        }

        return null;
    }

  public function page($q = '', $records_per_page = null, $page = null) {
    $query = $this->db->table('users');

    // If there's a search query, add LIKE conditions
    if (!empty($q)) {
        // Build a combined WHERE clause using raw SQL
        $query->where("
            id LIKE '%$q%' 
            OR username LIKE '%$q%' 
            OR email LIKE '%$q%' 
            OR role LIKE '%$q%'
        ");
    }

    // Clone before pagination for count
    $countQuery = clone $query;
    $total_rows = $countQuery->select_count('*', 'count')->get()['count'];

    // Pagination handling
    if ($records_per_page !== null && $page !== null) {
        $offset = ($page - 1) * $records_per_page;
        $query->limit($records_per_page, $offset);
    }

    // Execute query
    $results = $query->get_all();

    // Return results + pagination info
    return [
        'data' => $results,
        'total' => $total_rows
    ];
}
}