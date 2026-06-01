<?php

namespace App\Controllers\Trackwise;

use App\Controllers\BaseController;

class Uploads extends BaseController
{
    /**
     * Serve uploaded images securely from writable/uploads/.
     */
    public function image(string $filename)
    {
        if (! session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(403);
        }

        $filename = basename($filename);
        $path     = WRITEPATH . 'uploads/' . $filename;

        if (! is_file($path)) {
            return $this->response->setStatusCode(404);
        }

        $mime = mime_content_type($path) ?: 'application/octet-stream';

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setBody(file_get_contents($path));
    }
}
