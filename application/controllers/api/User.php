<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Api route
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_lib');
    }

    public function showAll()
    {
        $query = $this->user->showAll();
        if ($query) {
            $result['users'] = $this->user->showAll();
        }

        echo json_encode($result);
    }

    public function show($id)
    {
        $query = $this->user->show($id);
        if ($query) {
            $result['user'] = $this->user->show($id);
        }
        echo json_encode($result);
    }

    public function addUser()
    {
        $config = array(
            array('field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'trim'
            ),
            array('field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim'
            ),
            array('field' => 'gender',
                'label' => 'Gender',
                'rules' => ''
            ),
            array('field' => 'birthday',
                'label' => 'Birthday',
                'rules' => 'trim'
            ),
            array('field' => 'email',
                'label' => 'Email',
                'rules' => 'trim'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'firstname' => form_error('firstname'),
                'lastname' => form_error('lastname'),
                'gender' => form_error('gender'),
                'birthday' => form_error('birthday'),
                'email' => form_error('email'),
                'contact' => form_error('contact'),
                'address' => form_error('address')
            );

        } else {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'birthday' => $this->input->post('birthday'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address')

            );
            $config2['upload_path'] = './assets/upload/';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $config2['max_size'] = 2000;
            $config2['max_width'] = 2500;
            $config2['max_height'] = 1400;

            $this->load->library('upload', $config2);
            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $data['img_src'] = $file_name;
//                $this->resizeImage($file_name);
                // process resize image before upload
                $config3['image_library'] = 'gd2';
                $config3['source_image'] = $upload_data['full_path'];
                $config3['create_thumb'] = TRUE;
                $config3['maintain_ratio'] = TRUE;
                $config3['width'] = 75;
                $config3['height'] = 75;

                $this->image_lib->initialize($config3);

                $this->image_lib->resize();
                $fileName = substr($upload_data['file_name'], 0, -4);
                $data['img_src_thumb'] = $fileName . '_thumb.jpg';
            }
            if ($this->user->addUser($data)) {
                $result['error'] = false;
                $result['msg'] = 'User added successfully';
            }
        }
        echo json_encode($result);
    }

    public function updateUser()
    {
        $config = array(
            array('field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'trim|required'
            ),
            array('field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim|required'
            ),
            array('field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array('field' => 'birthday',
                'label' => 'Birthday',
                'rules' => 'trim|required'
            ),
            array('field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'firstname' => form_error('firstname'),
                'lastname' => form_error('lastname'),
                'gender' => form_error('gender'),
                'birthday' => form_error('birthday'),
                'email' => form_error('email'),
                'contact' => form_error('contact'),
                'address' => form_error('address')
            );

        } else {
            $id = $this->input->post('id');
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'birthday' => $this->input->post('birthday'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address')
            );
            if ($this->user->updateUser($id, $data)) {
                $result['error'] = false;
                $result['success'] = 'User updated successfully';
            }

        }
        echo json_encode($result);
    }

    public function deleteUser($id)
    {
        if ($this->user->deleteUser($id)) {
            $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        } else {
            $msg['error'] = true;
        }
        echo json_encode($msg);

    }

    public function searchUser()
    {
        $value = $this->input->get('filter');
        $query = $this->user->searchUser($value);
        if ($query) {
            $result['users'] = $query;
        }

        echo json_encode($result);

    }
}

