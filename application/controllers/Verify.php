 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
	/*  $this->load->helper('url');
      redirect('/'); */
    }
public function index()
	{
		
		
		    $data['loaded_classes'] = $this->load->get_loaded_classes();
			// same as before, a method from MY_Loader that retrieves helpers
			$data['loaded_helpers'] = $this->load->get_loaded_helpers();
			// same as before, a method from MY_Loader that retrieves the models loaded
			$data['loaded_models'] = $this->load->get_loaded_models();
			$data['config'] = $this->config->config;
			 $data['loaded_database'] = 'Database is not loaded';
    // if we find that the connection is established...
    if (isset($this->db) && $this->db->conn_id !== FALSE) {
      // ...we will modify the message
      $data['loaded_database'] = 'Database is loaded and connected';
      // ...and retrieve the database settings
      $data['db_settings'] = array(
        'dsn' => $this->db->dsn,
        'hostname' => $this->db->hostname,
        'port' => $this->db->port,
        
        // if you are sure that only the right eyes will see the controller, you can uncomment the three lines below
      'username' => $this->db->username,
       'password' => $this->db->password,
       'database' => $this->db->database,
        'driver' => $this->db->dbdriver,
        'dbprefix' => $this->db->dbprefix,
        'pconnect' => $this->db->pconnect,
        'db_debug' => $this->db->db_debug,
        'cache_on' => $this->db->cache_on,
        'cachedir' => $this->db->cachedir,
        'char_set' => $this->db->char_set,
        'dbcollat' => $this->db->dbcollat,
        'swap_pre' => $this->db->swap_pre,
        'autoinit' => $this->db->autoinit,
        'encrypt' => $this->db->encrypt,
        'compress' => $this->db->compress,
        'stricton' => $this->db->stricton,
        'failover' => $this->db->failover,
        'save_queries' => $this->db->save_queries
      );
    }
	
	 $cache_path = ($this->config->item('cache_path') === '') ? APPPATH.'cache/' : $this->config->item('cache_path');
    // and verify that it is writable
    if(is_really_writable($cache_path))
    {
      $data['writable_cache'] = TRUE;
    }
    // also look for the logs path
    $log_path = ($this->config->item('log_path') === '') ? APPPATH.'logs/' : $this->config->item('log_path');
    // and verify if is writable
    if(is_really_writable($log_path))
    {
       $data['writable_logs'] = TRUE;
    }
	
	$this->load->helper('url');
    $uploads_path = base_url().'uploads';
    if(is_really_writable($uploads_path))
    {
      $data['writable_uploads'] = $uploads_path.' is writable';
    }
    else
    {
      $data['writable_uploads'] = '<span class="red"><strong>'.$uploads_path.'</strong> is not writable</span>';
    }
	
	 $this->load->view('verify_view', $data);
  
	}
}
