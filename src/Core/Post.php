<?php

namespace Core;

use Core\Database;
use http\Exception;
use Core\Router;


class Post
{
    public $post;

    public static function getAllPosts()
    {
        $db = new Database();
        $db->query("SELECT * FROM posts ORDER BY `created_at` DESC");
        $posts = $db->get();

        foreach ($posts as &$post) {
            // Get User Name
            $params = [ $post['author_id'] ];
            $db->query("SELECT user_name FROM users WHERE id = ?", $params);
            $user_name = $db->find();

            $post = Post::fillPost($post, $user_name);
        }
        unset($post);

        return $posts;
    }

    public static function getAuthorName($author_id)
    {
        $db = new Database();
        $params = [$author_id];

        return $db->query("SELECT user_name FROM users 
            WHERE id = ?", $params)->find();
    }

    public static function getPostTags($postId)
    {
        $params = [ $postId ];
        $db = new Database();
        $db->query("SELECT title FROM tags WHERE post_id = ?", $params);

        return $db->get();
    }

    public static function findPostBySlug($slug)
    {
        $params = [ $slug ];
        $db = new Database();
        $db->query("SELECT * FROM posts WHERE slug = ?", $params);

        $post = $db->find();

        if ($post) {
            return $post;
        }

        Router::abort(404);
    }

    public static function insertPost($authorId, $title, $content, $published)
    {
        $db = new Database();

        $slug = make_slug($title);
        $published_at = Post::nowDateHour();

        $params = [ $authorId, $title, $content, $slug, $published_at, $published_at ];

        // insert post to db
        $db->query("INSERT INTO posts (author_id, title, content, slug, published, published_at)
                    VALUES (?, ?, ?, ?, ?, ?)", $params);

        return Post::findPostBySlug($slug);
    }

    private static function nowDateHour(): string
    {
        return date_create('now')->format('Y-m-d H:i:s');
    }

    public static function insertTags($tags, $post_id)
    {
        $db = new Database();
        foreach ($tags as $tag) {
            if (!empty($tag)) {
                $params = [ $post_id, $tag ];
                $db->query("INSERT INTO tags (post_id, title) VALUES (?, ?)", $params);
            }
        }
    }

    public static function updatePost($title, $content, $post_id, $tags)
    {
        $db = new Database();
        $tags = explode(",", $tags);

        $params = [
            $title, $content, $post_id
        ];

        // update post
        $db->query("UPDATE posts SET title = ?, content = ? WHERE id = ?", $params);

        // delete old tags if post as tags
        Post::deleteAllTags($post_id);

        Post::insertTags($tags, $post_id);
    }

    public static function deleteAllTags($post_id)
    {
        $params = [ $post_id ];
        $db = new Database();
        $db->query("DELETE FROM tags WHERE post_id = ?", $params);
    }

    public static function findAllPostIdsByTag($tag)
    {
        $params = [ $tag ];
        $db = new Database();
        $db->query("SELECT post_id FROM tags WHERE title = ?", $params);

        return $db->get();
    }

    public static function getPostById($post_id)
    {
        $db = new Database();

        // Get Posts by ID
        $params = [ $post_id ];
        $db->query("SELECT * FROM posts WHERE id = ?", $params);
        $post = $db->find();

        // Get User Name
        $params = [ $post['author_id'] ];
        $db->query("SELECT user_name FROM users WHERE id = ?", $params);
        $user_name = $db->find();

        return Post::fillPost($post, $user_name);
    }

    public static function fillPost($post, $user_name) {
        $word_count = str_word_count($post['content']);
        $reading_time = ceil($word_count / 200);
        $data = date_format(date_create($post['created_at']), 'd F Y');
        $post['created_at'] = $data;
        $post['user_name'] = $user_name['user_name'];
        $post['reading_time'] = $reading_time;
        $post['tags'] = Post::getPostTags($post['id']);
        return $post;
    }

    public static function findPostByTag($tag)
    {
        $post_ids = Post::findAllPostIdsByTag($tag);

        // un-nest ids
        $new_post_ids = [];
        foreach ($post_ids as $post_id) {
            $new_post_ids[] = end($post_id);
        }

        $posts = [];
        foreach ($new_post_ids as $post_id) {
            $posts[] = Post::getPostById($post_id);
        }

        return $posts;
    }
}