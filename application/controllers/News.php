<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 function __construct()
		{
			
			parent:: __construct();

			
		}
	public function index()
	{
		 
       // $this->load->model("message_model");

        $total= $this->db->get_where('post', array('active'=>TRUE,'title_ar <>' =>''))->num_rows();
        $per_pg=3;
        $offset=$this->uri->segment(3);

        $this->load->library('pagination');
        $config['base_url'] = base_url() . "news/index";
        $config['total_rows'] = $total;
        $config['per_page'] = $per_pg;
		$config['num_links'] = 10;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="page" >';
		$config['num_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        
		$data=array(
			'title'=>'أخبار التكنولوجيا| شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تصميم مواقع الإنترنت دبي, عروض تصميم المواقع ,شركة تصميم مواقع في دبي,تطوير مواقع,تطوير المواقع الإلكترونية,شركات تطوير موقع في دبي, خدمات التسويق الالكترونى,التسويق الالكتروني عبر الانترنت,التسويق عبر وسائل الإعلام الاجتماعي,اعلانات الفيس بوك المدفوعة,تصميم وبرمجة تطبيقات الهواتف الذكية,شركات تطبيقات الهواتف الذكية دبي,استضافة مواقع, استضافة خادم,تسويق الكتروني,تجارة الكترونيه,تسويق واشهار مواقع',
			'description' =>'أخبار التكنولوجيا من لوروينج ننشر الأخبار والدروس والمقالات في شتى مجالات التقنية . نقدم بشكل يومي آخر أخبار وتقنيات التكنولوجيا في شتي المجالات.',
			'results' => $this->data_model->get_all_post_ar($per_pg,$offset),
			'links' => $this->pagination->create_links(),
		);
		
		$this->load->view('site/includes_ar/header',$data);
		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/news'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
	}
	
	
	
	public function news_detalis()
	{
			$post_id = $this->uri->segment(4,0);
			//urldecode to read the arabic text in url
			$urltitle = urldecode($this->uri->segment(3));
                        $main_title = $this->uri->segment(3);
                        
			$title = str_replace('-',' ',$urltitle);
			
			//update the count_view filed for statistics
			$this->db->set('count_view', 'count_view+1',FALSE);
			$this->db->where('post_id', $post_id); // '1' test value here ?
			$this->db->update('post');
			
			//$data['rows'] = $this->data_model->viewPost($post_id);
			$query = $this->db->get_where('post', array('post_id' => $post_id));
			
                        $image_name = $query->row('image_name');
			$desc_data = $query->row('desc_en');
			$desc_data = strip_tags($desc_data);
			$desc = word_limiter($desc_data, 25);
			
			$data=array(
			'title'=>$title,
			'keywords'=>'تصميم مواقع الإنترنت دبي, عروض تصميم المواقع ,شركة تصميم مواقع في دبي,تطوير مواقع,تطوير المواقع الإلكترونية,شركات تطوير موقع في دبي, خدمات التسويق الالكترونى,التسويق الالكتروني عبر الانترنت,التسويق عبر وسائل الإعلام الاجتماعي,اعلانات الفيس بوك المدفوعة,تصميم وبرمجة تطبيقات الهواتف الذكية,شركات تطبيقات الهواتف الذكية دبي,استضافة مواقع, استضافة خادم,تسويق الكتروني,تجارة الكترونيه,تسويق واشهار مواقع',
			'description' =>$desc,
			'rows' => $this->data_model->viewPost($post_id),
                        'image_name' =>  $image_name,
                        'main_title' =>  $main_title,
                        'post_id' => $post_id,
		);
		
		$this->load->view('site/includes_ar/header-news',$data);
		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/news_detalis_ar'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
	} // end news_detalis_ar
	
		public function tag()
	{
			$title = urldecode(str_replace('-',' ',$this->uri->segment(3)));
			$form_search = $this->input->post('q');

			
			//$data['rows'] = $this->data_model->viewPost($post_id);
			
			$data=array(
			'title'=>$title,
			'keywords'=>'تصميم مواقع الإنترنت دبي, عروض تصميم المواقع ,شركة تصميم مواقع في دبي,تطوير مواقع,تطوير المواقع الإلكترونية,شركات تطوير موقع في دبي, خدمات التسويق الالكترونى,التسويق الالكتروني عبر الانترنت,التسويق عبر وسائل الإعلام الاجتماعي,اعلانات الفيس بوك المدفوعة,تصميم وبرمجة تطبيقات الهواتف الذكية,شركات تطبيقات الهواتف الذكية دبي,استضافة مواقع, استضافة خادم,تسويق الكتروني,تجارة الكترونيه,تسويق واشهار مواقع',
			'description' =>'Latest Technology News | Tech Blog From Lorewing',
			'form_search'=>$form_search,
		);
		
		$this->load->view('site/includes_ar/header',$data);
		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/tag'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');

		
	} // end tag
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */