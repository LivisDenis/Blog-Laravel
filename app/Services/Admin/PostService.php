<?php

namespace App\Services\Admin;

class PostService
{
    public function update($request, $data, $post)
    {
        try {
            if($request->has('thumbnail')) {
                $thumbnail = str_replace('public/posts', '/storage/posts', $request->file('thumbnail')->store('public/posts'));
                $data['thumbnail'] = $thumbnail;
            }
            $post->update($data);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
