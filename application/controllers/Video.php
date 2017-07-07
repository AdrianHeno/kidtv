<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
		$this->load->model('Category_model');
        $this->load->library('form_validation');
    }
	
	
	
	public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'video/index.html';
            $config['first_url'] = base_url() . 'video/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Video_model->total_rows($q);
        $video = $this->Video_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'video_data' => $video,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('video_list', $data);
    }
	
	public function watch($category_id = null){
		if(is_numeric($category_id)){//If a category ID is passed in, only get the videos for that category
			$data['videos'] = $this->Video_model->get_by_category($category_id);
			$current_category = $this->Category_model->get_by_id($category_id);
			$data['current_category'] = $current_category->title;
			$data['current_category_id'] = $current_category->id;
		}else{//Get all videos
			$data['videos'] = $this->Video_model->get_all();
			$data['current_category'] = 'All';
			$data['current_category_id'] = 0;
		}
		
		
		$data['categories'] = $this->Category_model->get_all();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('watch', $data);
	}
	
	public function download($id){
		ini_set('max_execution_time', 0);//Don't know how long the download is going to take, increase the time out
		$format = 'mp4'; //the MIME type of the video. e.g. video/mp4, video/webm, etc.
		$quality = 'medium';
		parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$id),$info); //decode the data
		$streams = $info['url_encoded_fmt_stream_map']; //the video's location info
		$streams = explode(',',$streams);
		
		foreach($streams as $stream){
			parse_str($stream,$data); //decode the stream
			//TODO: Need to figure out how to select lower quality videos for download
			if(stripos($data['type'],$format) !== false/* && stripos($data['quality'],$quality) !== false*/){ //We've found the right stream with the correct format
				$video = fopen($data['url'].'&amp;signature='.$data['sig'],'r'); //the video
				$file = fopen('videos/' . $id . '.' . $format,'w');
				stream_copy_to_stream($video,$file); //copy it to the file
				fclose($video);
				fclose($file);
				return true;
				break;
			}
		}
	}

    public function read($id) 
    {
        $row = $this->Video_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'url' => $row->url,
		'category_id' => $row->category_id,
	    );
            $this->load->view('video_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function create() 
    {
        $data = array(
		'button' => 'Create',
		'action' => site_url('video/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'url' => set_value('url'),
		'category_id' => set_value('category_id'),
	);
		$data['categories'] = $this->Category_model->get_all();
        $this->load->view('video_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'url' => $this->input->post('url',TRUE),
			);
			
			if(strpos($data['url'], 'http') == false && $this->download($data['url']) == true){
				$data['url'] = $this->config->item('base_url') . '/videos/' . $data['url'] . '.mp4';
			}

            $this->Video_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('video'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $data = array(
			'button' => 'Update',
			'action' => site_url('video/update_action'),
			'id' => set_value('id', $row->id),
			'title' => set_value('title', $row->title),
			'url' => set_value('url', $row->url),
			'category_id' => set_value('category_id', $row->category_id),
	    );
			$data['categories'] = $this->Category_model->get_all();
            $this->load->view('video_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'url' => $this->input->post('url',TRUE),
				'category_id' => $this->input->post('category_id',TRUE),
			);

            $this->Video_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('video'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $this->Video_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('video'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('category_id', 'category id', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
