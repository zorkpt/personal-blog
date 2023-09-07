<?php

namespace Core;

use Core\Database;
use http\Exception;
use Core\Router;


class Post
{
    public $post;
    public $url;


    public static function getAllPosts()
    {
        $db = new Database();
        $db->query("SELECT * FROM posts ORDER BY `created_at` DESC");
        $posts = $db->get();

        foreach ($posts as &$post) {
            $word_count = str_word_count($post['content']);
            $reading_time = ceil($word_count / 200);
            $user_name = $db->query("SELECT user_name FROM users WHERE id = $post[author_id]")->find();
            $data = date_format(date_create($post['created_at']), 'd F Y');
            $post['created_at'] = $data;
            $post['user_name'] = $user_name['user_name'];
            $post['reading_time'] = $reading_time;
            $post['tags'] = Post::getPostTags($post['id']);
        }
        unset($post);

        return $posts;
    }

    public static function getPost()
    {

    }

    public static function getAuthorName($author_id)
    {
        $db = new Database();

        return $db->query("SELECT user_name FROM users 
            WHERE id = $author_id")->find();
    }

    public static function getPostId($slug)
    {
        $db = new Database();
        $db->query("SELECT id FROM posts WHERE `slug` = '$slug'");

        return $db->findOrFail()['id'];
    }

    public static function getPostTags($postId)
    {
        $db = new Database();
        $db->query("SELECT `title` FROM tags WHERE `post_id` = '$postId'");

        return $db->get();
    }

    public static function findPostBySlug($slug)
    {
        $db = new Database();
        $db->query("SELECT * FROM posts WHERE `slug` = '$slug'");
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
        $published_at = date_create('now')->format('Y-m-d H:i:s');

        // insert post to db
        $db->query("INSERT INTO `posts` (`author_id`, `title`, `content`, `slug`, `published`, `published_at`)
                    VALUES ('$authorId', '$title', '$content', '$slug', '$published', '$published_at')");

        return Post::findPostBySlug($slug);
    }

    public static function insertTags($tags, $post_id)
    {
        $db = new Database();
        foreach ($tags as $tag) {
            $db->query("INSERT INTO `tags` (`post_id`, `title`) VALUES ('$post_id', '$tag')");
        }
    }

    public static function updatePost($title, $content, $post_id, $tags)
    {
        $db = new Database();
        $tags = explode(",", $tags);

        // update post
        $db->query("UPDATE `posts` SET `title` = '$title', `content` = '$content' WHERE `id` = '$post_id'");

        // delete old tags
        Post::deleteAllTags($post_id);

        // insert new tags
        Post::insertTags($tags, $post_id);

    }

    public static function deleteAllTags($post_id)
    {
        $db = new Database();
        $db->query("DELETE FROM `tags` WHERE `post_id` = '$post_id'");
    }

    public static function findAllPostIdsByTag($tag)
    {
        $db = new Database();
        $db->query("SELECT `post_id` FROM `tags` WHERE `title` = '$tag'");

        return $db->get();
    }

    public static function getPostById($post_id)
    {
        $db = new Database();
        $db->query("SELECT * FROM `posts` WHERE `id` = '$post_id'");
        $post = $db->find();

        $word_count = str_word_count($post['content']);
        $reading_time = ceil($word_count / 200);
        $user_name = $db->query("SELECT user_name FROM users WHERE id = $post[author_id]")->find();
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