<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Helper {
    /**
     * Upload a file to the specified folder with a given name.
     *
     * @param UploadedFile $file The file to be uploaded.
     * @param string $folder The folder where the file should be uploaded.
     * @param string $name The name to be given to the uploaded file.
     * @return string|null The path to the uploaded file or null if the upload fails.
     */
    public static function fileUpload($file, string $folder, string $name = null): ?string {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $imageName = ($name ? Str::slug($name) : Str::random(10)) . '.' . $file->extension();
        $path      = public_path('uploads/' . $folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file->move($path, $imageName);
        return 'uploads/' . $folder . '/' . $imageName;
    }

    /**
     * Delete a file or image at the specified path.
     *
     * @param string $path The path to the file to be deleted.
     * @return void
     */
    public static function fileDelete(string $path): void {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    /**
     * Generate a unique slug for a given model and title.
     *
     * @param Model $model The model to check for existing slugs.
     * @param string $title The title to generate the slug from.
     * @return string The unique slug.
     */
    public static function makeSlug($model, string $title): string {
        $slug = Str::slug($title);
        while ($model::where('slug', $slug)->exists()) {
            $randomString = Str::random(5);
            $slug         = Str::slug($title) . '-' . $randomString;
        }
        return $slug;
    }

    /**
     * Generate a JSON response.
     *
     * @param bool $status The status of the response (true for success, false for failure).
     * @param string $message The message to include in the response.
     * @param int $code The HTTP status code for the response.
     * @param mixed $data Optional additional data to include in the response.
     * @return JsonResponse The JSON response.
     */
    public static function jsonResponse(bool $status, string $message, int $code, $data = null): JsonResponse {
        $response = [
            'status'  => $status,
            'message' => $message,
            'code'    => $code,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }
        return response()->json($response, $code);
    }

    /**
     * Returns a standardized error response with the provided data, message, and HTTP status code.
     *
     * This method formats the response to indicate an error or failure in the operation. It includes
     * an error flag, an optional message, the error details or data, and an HTTP status code. The
     * response is structured as a JSON object, and the status code defaults to 500 (Internal Server Error),
     * but can be customized to reflect different types of errors.
     *
     * @param mixed $data The data to be included in the response, typically containing error details.
     * @param string|null $message An optional message providing additional context about the error.
     * @param int $code The HTTP status code for the response (default is 500).
     *
     * @return JsonResponse A JSON response containing the error status, message, data, and code.
     */
    public static function error($code = 500, $message = null, $error = null): JsonResponse {
        return response()->json([
            'status'    => (bool) false,
            'code'      => (int) $code,
            'message'   => $message,
            'error'     => $error,
            'timestamp' => now()->toIso8601String() . ' GMT' . now()->format('P'),
        ], $code);
    }
}
