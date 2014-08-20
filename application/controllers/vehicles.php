<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Vehicle Controller File
 * WJD : 08/12/2014
 */

class Vehicles extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        /* Load the needed helpers */
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('table');
        
        $this->load->model('Vehicles_model');
        
        /* Open the database */
	$this->load->database();
    }
    
    /* This function is called from the frameworks */
    public function index() {
        
        /* Get the DB data the load correct view and pass 
         * it the data
         */
        $tmpl = array (
            'table_open'          => '<table border="0" cellpadding="4" cellspacing="0" id="example">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr>',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
        );

        $this->table->set_template($tmpl);
	$this->table->set_heading(array('ID', 'FID', 'Stock Number', 'Inventory Date', 'Vehicle Type', 'Invoice Price', 'MSRP', 'Lot location', 'Make', 'Model', 'Model Year'));
        
        /* For DEBUG WJD
        print_r($_POST);
        */
        
        /* Handle the POST data coming in from the URL
         * result of form actions
         */
        
        /* Get the vehicle based on the stock number */
        if(!empty($_POST['vehicle']) )
        {
            /* Get the POST data */
            $vehicle = $_POST['vehicle'];
            
            /* Query the Database and get the results */
            $query = $this->Vehicles_model->get_vehicle($vehicle);
            $data['table'] = $this->table->generate($query);
            
            /* Load the required view */
            $data['header_title'] = 'Vehicle Inventory Based on Stock Number';
            $this->load->view('view_header', $data);
            $this->load->view('view_vehicles', $data);
            return;
        }
        
        /* Sort vehicles on inventory price high to low */
        if(!empty($_POST['highlow']) )
        {
            /* Query the Database and get the results */
           $query = $this->Vehicles_model->get_all_sort_desc();
           $data['table'] = $this->table->generate($query);
             
            /* Load the required view */
            $data['header_title'] = 'Vehicle Inventory Inventory Price (High-Low)';
            $this->load->view('view_header', $data);
            $this->load->view('view_vehicles', $data);
            return;
        }
        
        /* Sort vehicles on invoice price low to high */
        if(!empty($_POST['lowhigh']) )
        {
            /* Query the Database and get the results */
           $query = $this->Vehicles_model->get_all_sort_asc();
           $data['table'] = $this->table->generate($query);
             
            /* Load the required view */
            $data['header_title'] = 'Vehicle Inventory Inventory Price (Low-High)';
            $this->load->view('view_header', $data);
            $this->load->view('view_vehicles', $data);
            return;
        }
        
        /* Query for all of the vehicles */
        if(!empty($_POST['full']) )
        {
            /* Query the Database and get the results */
            $query = $this->Vehicles_model->get_all_vehicles();
            $data['table'] = $this->table->generate($query);
            
            /* Load the required view */
            $data['header_title'] = 'Dealer Vehicle Inventory Listings';
            $this->load->view('view_header', $data);
            $this->load->view('view_vehicles', $data);
            return;
        }
        
        /* Query vehicles for make and model */
        if(!empty($_POST['make']) and isset($_POST['model']))
        {
            /* Get the make and model */
            $make = $_POST['make'];
            $model = $_POST['model'];
            
            /* Query the Database and get the results */
            $query = $this->Vehicles_model->get_vehicle_make_model($make, $model);
            $data['table'] = $this->table->generate($query);
            
            /* Load the required view */
            $data['header_title'] = 'Vehicle Detail Based on Make and Model';
            $this->load->view('view_header', $data);
            $this->load->view('view_vehicles', $data);
            return;
        }
        
        /* This is called when the app is started */
        
        /* Query the Database and get the results */
        $query = $this->Vehicles_model->get_all_vehicles();
        $data['table'] = $this->table->generate($query);
        
        /* Load the required view */
        $data['header_title'] = 'Dealer Vehicle Inventory';
        $this->load->view('view_header', $data);
        $this->load->view('view_vehicles', $data);
    } 
}

