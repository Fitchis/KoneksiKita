<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Menambahkan import Log

class SupabaseService
{
    protected $url;
    protected $apiKey;
    protected $bucket;

    public function __construct()
    {
        $this->url = rtrim(env('SUPABASE_URL'), '/');
        $this->apiKey = env('SUPABASE_API_KEY');
        $this->bucket = env('SUPABASE_BUCKET');
    }

    public function getUrl($path)
    {
        return "{$this->url}/storage/v1/object/public/{$path}";
    }

    public function uploadFile($file, $path)
    {
        try {
            $mimeType = $file->getMimeType();
            $response = Http::withHeaders([
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => $mimeType,
            ])->put("{$this->url}/storage/v1/object/{$path}", file_get_contents($file));

            if ($response->successful()) {
                return $this->getUrl($path);
            } else {
                Log::error('Supabase upload failed', ['status' => $response->status(), 'body' => $response->body()]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Error during Supabase upload', ['message' => $e->getMessage()]);
            return null;
        }
    }


    public function deleteFile($path)
    {
        $response = Http::withHeaders([
            'apikey' => $this->apiKey,
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->delete("{$this->url}/storage/v1/object/{$path}");

        return $response->successful();
    }
}
