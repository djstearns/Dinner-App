<?php
/**
 * Application controller
 *
 * This file is the base controller of all other controllers
 *
 * PHP version 5
 *
 * @category Controllers
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AppController extends Controller {
/**
 * Components
 *
 * @var array
 * @access public
 */
    public $components = array(
        'Croogo',
        'Security',
        'Acl',
        'Auth',
        'Acl.AclFilter',
        'Session',
        'RequestHandler',
		'Cookie'
    );
/**
 * Helpers
 *
 * @var array
 * @access public
 */
    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Text',
        'Js',
        'Time',
        'Layout',
        'Custom',
    );
/**
 * Models
 *
 * @var array
 * @access public
 */
    public $uses = array(
        'Block',
        'Link',
        'Setting',
        'Node',
    );
    var $mobile = false;
	
/**
 * Cache pagination results
 *
 * @var boolean
 * @access public
 */
    public $usePaginationCache = true;
/**
 * View
 *
 * @var string
 * @access public
 */
    public $view = 'Theme';
/**
 * Theme
 *
 * @var string
 * @access public
 */
    public $theme;
/**
 * Constructor
 *
 * @access public
 */
    public function __construct() {
        Croogo::applyHookProperties('Hook.controller_properties');
        parent::__construct();
        if ($this->name == 'CakeError') {
            $this->_set(Router::getPaths());
            $this->params = Router::getParams();
            $this->constructClasses();
            $this->Component->initialize($this);
            $this->beforeFilter();
            $this->Component->triggerCallback('startup', $this);
        }
    }
/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
		/*
		$user = $this->Auth->User();
		
		if(empty($user)){
			if($this->RequestHandler->isMobile()){// && $this->request->data('token') && $this->request->data('hash')) {
				//$this->mobile = $this->User->authenticateMobile($this->request->data('hash'),$this->request->data('token'));
				$response = array(
					'logged' => true,
					'name' => 'derek',
					'email' => 'email'
				);
				echo json_encode($response);
				exit();
			}
			
		}
		*/

		if ($this->RequestHandler->ext == 'json' && $this->action !='login')
		{
			$this->RequestHandler->setContent('json', 'application/json');
			//Prevent debug output that'll corrupt your json data
			Configure::write('debug', 0);
			App::import('Model','User');
			$this->User = new User;
			$token = $_POST['token'];
			$mobileuser = $this->User->authenticateMobile($token);
			$this->Auth->login($mobileuser);
			
		}
		
		$this->Auth->authenticate = ClassRegistry::init('User');
        $this->AclFilter->auth();
        $this->RequestHandler->setContent('json', 'text/x-json');
        $this->Security->blackHoleCallback = '__securityError';

        if (isset($this->params['admin']) && $this->name != 'CakeError') {
            $this->layout = 'admin';
        }

        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
        }
		
		
	

        if (Configure::read('Site.theme') && !isset($this->params['admin'])) {
            $this->theme = Configure::read('Site.theme');
        } elseif (Configure::read('Site.admin_theme') && isset($this->params['admin'])) {
            $this->theme = Configure::read('Site.admin_theme');
        }

        if (!isset($this->params['admin']) && 
            Configure::read('Site.status') == 0) {
            $this->layout = 'maintenance';
            $this->set('title_for_layout', __('Site down for maintenance', true));
            $this->render('../elements/blank');
        }

        if (isset($this->params['locale'])) {
            Configure::write('Config.language', $this->params['locale']);
        }
		
	
		
		/*
		
		// This property will hold a value if the user is viewing the mobile version of our app.
			$this->mobile = !empty($this->params['mobile']) ? true : false;
			
			// Redirect if mobile a mobile device, not yet in the mobile site, and doesn't have the cookie yet.
			$visited = null;
			$visited = $this->Cookie->read('Info.Visited');
			
			// Not on the mobile site, is a mobile device, and a first-time visitor
			if (!$visited) {
				$this->Cookie->write('Info.Visited', 1);
				$this->params['mobile'] = true;
				if (!$this->mobile && $this->RequestHandler->isMobile()) {
					$this->redirect( array('controller' => 'items', 'action' => 'add', 'mobile'=>true));
				}
			}
			
			$this->set('mobile', $this->mobile);
			
			if ($this->mobile) {
				$this->layout = 'mobile';
			}
		*/

    }
/**
 * blackHoleCallback for SecurityComponent
 *
 * @return void
 */
    public function __securityError() {
        $this->cakeError('securityError');
    }

}
?>