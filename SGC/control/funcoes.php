<?php

    // Classe Image
    class Image {
        #code
        
        private $width;
        private $height;
        private $mimeType;
        private $image;
        private $imageResized;
        
        /* Array com tipos de imagens suportadas */
        private $mimeTypesSupported = array
        (
            'image/gif',
            'image/jpeg',
            'image/png'
        );
        
        /* Redimensiona uma imagem. */
        public function resize($filename, $new_width, $new_height)
        {
            if (!$filename)
                throw new Exception('<pre><b>Error [resize]:<b> Filename is required!</pre><br>');
            
            $this->_getMimeType($filename);
            $this->_openImage($filename);
            $this->_getImageSize();
            
            /* Cria uma imagem com os tamanhos informados */
            $this->imageResized = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $new_width, $new_height, $this->width, $this->height);
            return $this->image;
        }
        
        /* Salva imagem que está na memória para arquivo */
        public function saveImage($filename, $tipo, $quality = '100')
        {
            //$ext = strtolower(strchr($filename, '.'));
            
            switch ($tipo)
            {
                case 1:
                    if (imagetypes() & IMG_PNG)
                    imagepng($this->imageResized, $filename);
                break;
                case 2:
                    if (imagetypes() & IMG_JPG)
                        imagejpeg($this->imageResized, $filename, $quality);
                break;
                case 3:
                    if (imagetypes() & IMG_GIF)
                        imagegif($this->imageResized, $filename);
                break;
                default:
                    throw new Exception('<pre><b>Error [saveImage]:</b> Extension not supported!</pre><br>');
                break;
            }
        
            imagedestroy($this->image);
        }
        
        /* Cria uma nova imagem e adiciona em $this->image o identificador da imagem */
        private function _openImage($filename)
        {
            $this->image = null;
            
            switch($this->mimeType)
            {
                case 'image/png':
                    $this->image = imagecreatefrompng($filename);
                break;
                case 'image/jpeg':
                    $this->image = imagecreatefromjpeg($filename);
                break;
                case 'image/gif':
                    $this->image = imagecreatefromgif($filename);
                break;
                default:
                break;
            }
            
            if (!$this->image)
                throw new Exception('<pre><b>Error [openImage]:<b> Failed to open '.$filename.'</pre><br>');
        }
        
        /* Obtém o mimetype da imagem e verifica se o tipo é suportado. */
        private function _getMimeType($filename)
        {
            $this->mimeType = null;
            $img = getimagesize($filename);
            
            if (isset($img['mime']))
                $this->mimeType = $img['mime'];
            else
                throw new Exception('<pre><b>Error [_getMimeType]:<b> Failed to get image type.<pre><br>');
            
            if (!in_array($this->mimeType, $this->mimeTypesSupported))
            {
                $this->mimeType = null;
                throw new Exception('<pre><b>Error [_getImageSize]:<b> This file not supported!</pre><br>');
            }
        }
        
        /*
        * Obtém a largura e altura da imagem e seta os valores nos atributos.
        * image é o identificador da imagem aberta pelo método $this->_openImage. 
        */
        private function _getImageSize()
        {
            $this->width    = imagesx($this->image);
            $this->height   = imagesy($this->image);
        }

    }

?>