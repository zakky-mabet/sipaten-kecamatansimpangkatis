<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();

        $this->ci->load->model('option');
	}

	public function view($content, $data = NULL)
	{
        if ( ! $content)
        {
            return NULL;
        }  else  {
            $this->template['header']          = $this->ci->load->view('template/header', $data, TRUE);
            $this->template['navbar']     = $this->ci->load->view('template/navbar', $data, TRUE);
            $this->template['left_sidebar']     = $this->ci->load->view('template/left_sidebar', $data, TRUE);
            $this->template['content']         = $this->ci->load->view($content, $data, TRUE);
            $this->template['right_sidebar']     = $this->ci->load->view('template/right_sidebar', $data, TRUE);
            $this->template['footer']          = $this->ci->load->view('template/footer', $data, TRUE);

            return $this->ci->load->view('template/template', $this->template);
        }
	}
	
    public function alert($message, $config)
    {
        $alert  = "<div class='alert alert-{$config['type']} animated fadeIn'>";
        $alert .= "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
        $alert .= "<small><strong><i class='ace-icon fa fa-{$config['icon']}'></i> </strong>{$message}</small>";
        $alert .= "</div>";
        $this->ci->session->set_flashdata('alert', $alert);
    }

    public function alert_no_close($message, $config)
    {
        $alert  = "<div class='alert alert-{$config['type']} animated fadeIn'>";
        $alert .= "";
        $alert .= "<small><strong><i class='ace-icon fa fa-{$config['icon']}'></i> </strong>{$message}</small>";
        $alert .= "</div>";
        $this->ci->session->set_flashdata('alert', $alert);
    }

    public function pagination_list()
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; ".lang('pagination_first_link');
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = lang('pagination_last_link')." &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = lang('pagination_next_link')." &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; ".lang('pagination_prev_link'); 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        return $config;
    }

    function theme_mail($data)
    {
        $code  = '<html><head/>'."\n";
        $code .= '<body itemscope="" itemtype="http://schema.org/EmailMessage" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%;line-height:1.6em;background-color:#f0f0e9">'."\n";
        $code .= '<table class="body-wrap" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;background-color:#f0f0e9;width:100%;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"/>'."\n";
        $code .= '<td class="container" width="600" style="margin:0 auto!important;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;display:block!important;max-width:600px!important;clear:both!important">'."\n";
        $code .= '<div class="content" style="margin:0 auto;text-align:center;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;max-width:600px;display:block;padding:20px">'."\n";
        $code .= '<img src="'.base_url("public/image/logo/{$this->ci->option->get('logo_login')}").'" alt="" class="logo" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;max-width:100%;padding:10px"/>'."\n";
        $code .= '<table class="main" width="100%" cellpadding="0" cellspacing="0" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;background-color:#fff;border-radius:3px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="content-wrap" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;padding:20px">'."\n";
        $code .= '<table width="100%" cellpadding="0" cellspacing="0" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"><p class="text" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:15px;margin-bottom:20px;font-weight:normal;margin-top:20px;letter-spacing:.2px">Hai <b>'.$data['nama'].'</b>,<br> Anda menerima email ini karena ada permintaan untuk memperbarui password Aplikasi Tempayan anda.</p></td>'."\n";
        $code .= '</tr>'."\n";      /**/
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"><p class="text alignleft" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:15px;margin-bottom:20px;font-weight:normal;margin-top:20px;letter-spacing:.2px;text-align:left">Silahkan ikuti link berikut untuk mengganti Password Baru :</p></td>'."\n";
        $code .= '</tr>'."\n";

        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="aligncenter" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;text-align:center">'."\n";
        $code .= '<a href="'.$data['link'].'" target="_blank" style="font-size:18px; background-color:#0088ff; padding:10px; color:white; text-decoration:none; font-weight:bold; text-transform:uppercase">Reset Password</a>';
        $code .= '</td>'."\n";
        $code .= '</tr>'."\n";

        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"><p class="text" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:15px;margin-bottom:20px;font-weight:normal;margin-top:20px;letter-spacing:.2px"> Link diata tidak dapat digunakan setelah 1x24 Jam terhitung sejak pesan ini masuk.</p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '<div class="footer" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;width:100%;clear:both;color:#808080;padding-top:20px">'."\n";
        $code .= '<table width="100%" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="aligncenter" style="border-bottom:2px solid #ccc;margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;color:#808080;text-align:center"><p class="text2" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;margin-bottom:10px;font-weight:normal;margin-top:10px;letter-spacing:.2px">Copyright &copy; 2017 Kecamatan '.$this->ci->option->get('kecamatan').'. All Rights Reserved<br style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px"/>'.$this->ci->option->get('alamat').'<br style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px"/>Mail Template by <a href="http://www.teitramega.co.id/" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;text-decoration:none;font-weight:600">Teitra Mega</a></p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="aligncenter" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;color:#808080;text-align:center"><p class="text2" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;margin-bottom:10px;font-weight:normal;margin-top:10px;letter-spacing:.2px">Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</div></div>'."\n";
        $code .= '</td>'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"/>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</body>'."\n";
        $code .= '</html>';

        return $code;
    }
    
    function mail_surat($data)
    {
        $code  = '<html><head/>'."\n";
        $code .= '<body itemscope="" itemtype="http://schema.org/EmailMessage" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%;line-height:1.6em;background-color:#f0f0e9">'."\n";
        $code .= '<table class="body-wrap" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;background-color:#f0f0e9;width:100%;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"/>'."\n";
        $code .= '<td class="container" width="600" style="margin:0 auto!important;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;display:block!important;max-width:600px!important;clear:both!important">'."\n";
        $code .= '<div class="content" style="margin:0 auto;text-align:center;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;max-width:600px;display:block;padding:20px">'."\n";
        $code .= '<img src="'.base_url("public/image/logo/{$this->ci->option->get('logo_login')}").'" alt="" class="logo" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;max-width:100%;padding:10px"/>'."\n";
        $code .= '<table class="main" width="100%" cellpadding="0" cellspacing="0" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;background-color:#fff;border-radius:3px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="content-wrap" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;padding:20px">'."\n";
        $code .= '<table width="100%" cellpadding="0" cellspacing="0" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"><p class="text" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:15px;font-weight:normal;letter-spacing:.2px;">Hai <b>'.$data['nama'].'</b>,<br><br> Anda menerima email ini karena ada permintaan pengajuan Surat pada Aplikasi Tempayan anda.</p></td></tr>'."\n";

        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"><p class="text" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:15px;margin-bottom:20px;font-weight:normal;margin-top:20px;letter-spacing:.2px"> Silahkan lakukan verifikasi terhadap surat tersebut.</p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '<div class="footer" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;width:100%;clear:both;color:#808080;padding-top:20px">'."\n";
        $code .= '<table width="100%" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;color:#808080">'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="aligncenter" style="border-bottom:2px solid #ccc;margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;color:#808080;text-align:center"><p class="text2" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;margin-bottom:10px;font-weight:normal;margin-top:10px;letter-spacing:.2px">Copyright &copy; 2017 Kecamatan '.$this->ci->option->get('kecamatan').'. All Rights Reserved<br style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px"/>'.$this->ci->option->get('alamat').'<br style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px"/>Mail Template by <a href="http://www.teitramega.co.id/" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;text-decoration:none;font-weight:600">Teitra Mega</a></p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '<tr style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px">'."\n";
        $code .= '<td class="aligncenter" style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;color:#808080;text-align:center"><p class="text2" style="margin:0;font-family:\'Roboto Condensed\',sans-serif;box-sizing:border-box;font-size:12px;color:#808080;margin-bottom:10px;font-weight:normal;margin-top:10px;letter-spacing:.2px">Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></td>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</div></div>'."\n";
        $code .= '</td>'."\n";
        $code .= '<td style="margin:0;font-family:\'Montserrat\',sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top"/>'."\n";
        $code .= '</tr>'."\n";
        $code .= '</table>'."\n";
        $code .= '</body>'."\n";
        $code .= '</html>';

        return $code;
    }
}

/* End of file Template.php */
/* Location: ./application/modules/administrator/libraries/Template.php */
