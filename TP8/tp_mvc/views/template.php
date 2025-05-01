<?php
class Template {
    // Direktori dasar untuk file template
    private $template_dir = 'views/';
    private $vars = array();
    
    public function __construct($template_dir = null) {
        // Jika direktori template ditentukan saat objek dibuat
        if ($template_dir !== null) {
            // Cek apakah direktori tersebut valid
            if (is_dir($template_dir)) {
                $this->template_dir = $template_dir;
            } else {
                throw new Exception('Direktori template tidak valid: ' . $template_dir);
            }
        }
    }

    // Fungsi untuk menetapkan variabel yang bisa digunakan di dalam template
    public function assign($key, $value) {
        $this->vars[$key] = $value;
    }

    // Fungsi untuk merender template yang ditentukan
    public function render($template_file) {
        // Periksa apakah file template ada
        if (file_exists($this->template_dir . $template_file)) {
            // Ekstrak variabel ke dalam scope lokal
            extract($this->vars);

            // Mulai penampungan output (output buffering)
            ob_start();

            // Sertakan file template
            include $this->template_dir . $template_file;

            // Ambil isi dari buffer dan hentikan buffering
            $output = ob_get_clean();
            return $output;
        } else {
            // Jika file tidak ditemukan, lempar exception
            throw new Exception('Template tidak ditemukan: ' . $template_file);
        }
    }
}
?>
