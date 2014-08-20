<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Vehicle Model File
 * WJD : 08/12/2014
 */

class Vehicles_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    /* NOTE : WJD 
     * For sake of display I am limiting the number of returned rows to 100
     */
   
    /* Get all vehicle data */ 
    public function get_all_vehicles() {
        return $this->db->query("SELECT id, fid, stock_number, inventory_date, vehicle_type, invoice_price, msrp, lot_location, make, model, model_year FROM dealer_inventory limit 100;");
    } 
    
    /* Get vehicle data ordered by invoice price high-low */
    public function get_all_sort_desc() {
        return $this->db->query("SELECT id, fid, stock_number, inventory_date, vehicle_type, invoice_price, msrp, lot_location, make, model, model_year FROM dealer_inventory where vehicle_type='new' order by invoice_price desc limit 100;");
    } 
    
    /* Get vehicle data ordered by invoice price low-high*/
    public function get_all_sort_asc() {
        return $this->db->query("SELECT id, fid, stock_number, inventory_date, vehicle_type, invoice_price, msrp, lot_location, make, model, model_year FROM dealer_inventory where vehicle_type='new' order by invoice_price asc limit 100;");
    } 
    
    /* Get vehicle based on stock number */
    public function get_vehicle($vehicle) {
    
        return $this->db->query("SELECT id, fid, stock_number, inventory_date, vehicle_type, invoice_price, msrp, lot_location, make, model, model_year FROM dealer_inventory where stock_number='$vehicle'limit 1");
    } 
    
    /* Get vehicle based on make and model */
    public function get_vehicle_make_model($make, $model) {
    
        return $this->db->query("SELECT id, fid, stock_number, inventory_date, vehicle_type, invoice_price, msrp, lot_location, make, model, model_year FROM dealer_inventory where make='$make' and model='$model' limit 100");
    } 
}
